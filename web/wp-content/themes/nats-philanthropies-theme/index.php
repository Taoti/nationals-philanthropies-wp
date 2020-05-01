<?php
use Modules\Hero;
use JP\Get;


### Critical CSS for the main archive template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/index-critical.min.css' );


// In Settings > Reading, if this is the "Page for Posts" page then store the ID of that page to pull ACF options with. Otherwise using stuff like get_the_title() without an ID/post parameter will return results from the last post in the query/listing.
if( taoti_is_page_for_posts() ){
  $posts_page_id = taoti_is_page_for_posts();
  echo "<pre>"; var_dump($posts_page_id); echo "</pre>";
}

echo "<pre>"; var_dump( is_post_type_archive('post') ); echo "</pre>";

get_header();
?>



<?php
$heading_line_1 = get_the_archive_title();
$description = '';

if( is_search() ){
	global $wp_query;
	$heading_line_1 = 'Search';

	if( get_search_query() ){
		$description = 'Showing '. $wp_query->found_posts . ' results for <em>' . get_search_query() . '</em>';
	}

}

$args = [
  'heading_line_1' => $heading_line_1,
	'heading_line_2' => '',
	'description' => $description,
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
	</div>
		<div class="paginationWrap l-container">
			<?php
			the_posts_pagination( array(
					'mid_size'  => 2,
					'prev_text' => '<i class="pagination-arrow pagination-arrow-left"></i>',
					'next_text' => '<i class="pagination-arrow pagination-arrow-right"></i>',
					'screen_reader_text' => null
			));
			?>
		</div>
</div>
<?php endif; ?>



<?php
get_footer();
