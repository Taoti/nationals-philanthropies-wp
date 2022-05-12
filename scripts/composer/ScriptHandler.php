<?php
/**
 * Script Handler
 *
 * Contains \WordPressProject\composer\ScriptHandler.
 *
 * @file
 * @package WordPressProject
 * @author TaotiCreative
 * @see https://github.com/ataylorme/ataylorme-wordpress/blob/master/scripts/composer/ScriptHandler.php for inspiration.
 */

namespace WordPressProject\composer;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

/**
 * Class: ScriptHandler
 *
 * Prepares and launches site up to Pantheon.
 */
class ScriptHandler {

	/**
	 * Get the WordPress Docroot
	 *
	 * Leverages Linux getwd() command.
	 */
	protected static function getWordPressRoot($project_root)
  {
    return $project_root .  '/web';
  }

	/**
	 * Prepare the Build for Pantheon
	 *
	 * This is called by the QuickSilver deploy hook to convert from a 'lean' repository to a 'fat' repository.
	 * This should only be called when using this repository as a custom upstream, and updating it with 'terminus composer <site>.<env> update'.
	 * This is not used in the GitHub PR workflow.
	 */
	public static function prepareForPantheon()
	{
		// Get rid of any .git directories that Composer may have added.
		// n.b. Ideally, there are none of these, as removing them may
		// impair Composer's ability to update them later. However, leaving
		// them in place prevents us from pushing to Pantheon.
		$dirsToDelete = [];
		$finder = new Finder();
		foreach (
			$finder
				->directories()
				->in(getcwd())
				->ignoreDotFiles(false)
				->ignoreVCS(false)
				->depth('> 0')
				->name('.git')
			as $dir) {
			$dirsToDelete[] = $dir;
		}
		$fs = new Filesystem();
		$fs->remove($dirsToDelete);

		// Fix up .gitignore: remove everything above the "::: cut :::" line
		$gitignoreFile = getcwd() . '/.gitignore';
		$gitignoreContents = file_get_contents($gitignoreFile);
		$gitignoreContents = preg_replace('/.*::: cut :::*/s', '', $gitignoreContents);
		file_put_contents($gitignoreFile, $gitignoreContents);
	}

	/**
	 * Deploy Slack QuickSilver Scripts
	 *
	 * This function will grab the Pantheon overrides from the Upstream and deploy them as part of the site-generation process.
	 */
	public static function setupSlack() {

		$pantheon_overrides = 'pantheon.yml.overrides';
		$pantheon_deploy = 'pantheon.yml';

		$fs = new Filesystem();

		$fs->copy($pantheon_overrides, $pantheon_deploy);
	}

	/**
	 * Generate the New Theme
	 *
	 * This generates a new theme as a unique clone of the 'Taoti Base Theme'.
	 *
	 * Eventually, will be retired in favor of child-themes, to have a bit more systemic stability.
	 */
	public static function setupTheme(Event $event)
	{

		// Generate pantheon.yml file.
		self::setupSlack();

		$io = $event->getIO();

		$theme_name = $io->ask('Provide new theme name: ');
		$theme_machine_name = preg_replace('/_+/', '_', preg_replace(
			'/[^a-z0-9_]+/',
			'_',
			strtolower($theme_name)
		));

		$web = getcwd() . '/web';
		$theme_dir = "{$web}/wp-content/themes/{$theme_machine_name}";
		$io->write('Creating new theme');

		$fs = new Filesystem();
		$fs->mirror("{$web}/wp-content/themes/taoti-wp-base", $theme_dir);
		$files = [
			'.circleci/config.yml',
			'.lando.base.yml',
			'composer.json',
		];

		/**
		 * @todo Also add code to update the root-level composer.json to replace /THEME_NAME with the generated theme-name.
		 */

		foreach ($files as $filename) {
			$file = file_get_contents($filename);
			file_put_contents($filename, preg_replace("/THEME_NAME/", $theme_machine_name, $file));
		}
		$filename = 'scripts/composer/ScriptHandler.php';
		$file = file_get_contents($filename);

		// Funny syntax is necessary since we don't want to replace this line itself.
		file_put_contents($filename, str_replace("/THEME_NAME/" . ".gitignore", "/{$theme_machine_name}/.gitignore", $file));

		// Need to update the theme info in style.css (yeah legacy reasons😉).
		$theme_info = "/*
Theme Name: {$theme_name} WordPress Theme
Theme URI: http://taoti.com
Description: Custom theme {$theme_name}.
Version:      1.0
*/
";
		file_put_contents("{$theme_dir}/style.css", $theme_info);
	}

	/**
	 * Generate the Site on Pantheon
	 *
	 * This executes the Terminus commands necessary to 'generate' the site, as far as Pantheon and GitHub go.
	 */
	public static function setupSite(Event $event)
	{
		$io = $event->getIO();
		$site = $io->ask('Provide new site name (for example: ifa-d8): ');
		self::setupTheme($event);
		$site = preg_replace('/-+/', '-', preg_replace(
			'/[^a-z0-9]+/',
			'-',
			strtolower($site)
		));

		exec('git remote remove origin 2>&1', $output);
		putenv("PATH=" . getenv('PATH'));
		exec('terminus build:project:create --pantheon-site="'. $site . '" --team="Taoti Creative" --org="Taoti" --admin-email="taotiadmin@taoti.com" --admin-password="Taoti1996" --ci=circleci --git=github ./ "'. $site . '" --preserve-local-repository --visibility=private');
		file_put_contents('.lando.yml', "
name: {$site}
config:
  site: {$site}
#  id: PANTHEONSITEID
    ");
	}

	/**
	 * Enables Git Hooks
	 */
	public static function enableGitHooks(Event $event)
	{
		if (!ScriptHandler::commandExists('sh')) {
			echo "sh MUST be in your path for these git hooks to work.";
			exit(1);
		}
		$args = $event->getArguments();
		copy('scripts/githooks/post-commit', '.git/hooks/post-commit');
		$pre = 'scripts/githooks/pre-commit';
		$msg = "Git hooks set up for this project to run automatic standards fixes. ";
		if ($args[0] === 'lando') {
			$pre .= '-lando';
			$msg .= "Running via Lando.";
		}
		else {
			$msg .= "Running in your local environment. See documentation if necessary to confirm requirements.";
		}
		copy ($pre, '.git/hooks/pre-commit');
		echo $msg;
	}

	/**
	 * Determines current operating system
	 */
	public static function commandExists($command) {
		$test = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? "where" : "which";
		return is_executable(trim(shell_exec("$test $command")));

	}
}
