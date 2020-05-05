<?php
use Modules\Hero;
use JP\Get;


### Critical CSS for the search template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/search.min.css' );

get_header();
?>



<?php
// Use the hero background image from the "Posts Page".
$postPage = get_option( 'page_for_posts' );
$featured_image_array = Get::featured_image_array( $postPage );

$background_image_url = '';
if( isset($featured_image_array['sizes']['1080p']) ){
	$background_image_url = $featured_image_array['sizes']['1080p'];

} elseif( isset($featured_image_array['sizes']['720p']) ){
  $background_image_url = $featured_image_array['sizes']['720p'];
}

$args = [
  'heading_line_1' => 'Search',
	'heading_line_2' => '',
	'background_image_url' => $background_image_url,

];
$hero = new Hero($args);
$hero->render();
?>



<div class="archiveSearch">
	<div class="archiveSearch-inner">

		<form action="<?php echo home_url(); ?>" class="archiveSearch-form" method="get">

			<div class="archiveSearch-field">
				<label for="s" class="archiveSearch-label">Enter search terms</label>
				<input type="search" name="s" id="s" class="archiveSearch-input" value="<?php the_search_query(); ?>">
			</div>

			<div class="archiveSearch-field">
				<button type="submit" class="archiveSearch-submit">Search<i class="archiveSearch-submitIcon"><?php echo file_get_contents( get_template_directory().'/images/icon-search.svg' ); ?></i></button>
			</div>

		</form>

		<?php if( get_search_query() ): ?>
		<p class="archiveSearch-results">

			<?php global $wp_query; ?>

			<?php if( $wp_query->found_posts ): ?>
				There are <?php echo $wp_query->found_posts; ?> results for <em><?php echo get_search_query(); ?>&hellip;</em>

			<?php else: ?>
				Sorry, there are no results for <em><?php echo get_search_query(); ?></em>

			<?php endif; ?>

		</p>
		<?php endif; ?>


	</div>
</div>




<?php if( get_search_query() && have_posts() ): ?>
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
