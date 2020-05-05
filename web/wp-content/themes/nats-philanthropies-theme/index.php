<?php
use Modules\Hero;


### Critical CSS for the main archive template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/index-critical.min.css' );

get_header();
?>



<?php
$heading_line_1 = get_the_archive_title();

$args = [
  'heading_line_1' => $heading_line_1,
	'heading_line_2' => '',
	'description' => '',
];
$hero = new Hero($args);
$hero->render();
?>



<?php if ( have_posts() ): ?>
<div class="archiveList">
	<div class="archiveList-inner">
		<?php while ( have_posts() ): the_post(); ?>
			<?php
			$post_type = get_post_type();
			get_template_part( 'parts/listingItem', $post_type );
			?>
		<?php endwhile; ?>

		<?php get_template_part( 'parts/pagination' ); ?>

	</div>
</div>
<?php endif; ?>



<?php
get_footer();
