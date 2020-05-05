<?php
use Modules\Hero;


### Critical CSS for the main archive template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/index-critical.min.css' );


// In Settings > Reading, if this is the "Page for Posts" page then store the ID of that page to pull ACF options with. Otherwise using stuff like get_the_title() without an ID/post parameter will return results from the last post in the query/listing.
if( taoti_is_page_for_posts() ){
  $posts_page_id = taoti_is_page_for_posts();
  // echo "<pre>"; var_dump($posts_page_id); echo "</pre>";
}

// echo "<pre>"; var_dump( is_post_type_archive('post') ); echo "</pre>";

get_header();
?>



<?php
$args = [
  'heading_line_1' => 'Search',
	'heading_line_2' => '',
];
$hero = new Hero($args);
$hero->render();
?>


<?php if( is_search() ): ?>
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
<?php endif; ?>



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
