<?php
use JP\Get;
use Modules\Hero;
use Modules\ListingItem;

$postPage = get_option( 'page_for_posts' );

### Critical CSS for the main archive template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/home-critical.min.css' );

get_header();
?>



<?php
$common_fields = get_field('news_archive_hero', $postPage);
$heading_line_1 = $common_fields['primary_heading_line_1'];
$heading_line_2 = $common_fields['primary_heading_line_2'];
$featured_image_array = Get::featured_image_array( $postPage );

$background_image_url = '';
if( isset($featured_image_array['sizes']['1080p']) ){
	$background_image_url = $featured_image_array['sizes']['1080p'];

} elseif( isset($featured_image_array['sizes']['720p']) ){
  $background_image_url = $featured_image_array['sizes']['720p'];
}

$args = [
  'heading_line_1' => $heading_line_1,
	'heading_line_2' => $heading_line_2,
  'description' => get_the_excerpt($postPage),
	'background_image_url' => $background_image_url, // get featured image
];
$hero = new Hero($args);
$hero->render();
?>

<?php
$featured_item = get_field('featured_news_article', $postPage);

if($featured_item) {
  // Featured Listing Item
  $featured_item_args = [
    'primary_heading' => get_the_title( $featured_item ),
    'subtitle' => 'Featured News',
    'excerpt' => get_the_excerpt( $featured_item ),
    'permalink' => get_permalink( $featured_item ),
    'primary_button_url' => get_permalink($featured_item),
    'primary_button_label' => 'Read More',
    'image_array' => Get::featured_image_array( $featured_item->ID ),
    'classes' => [
      // 'listingItem-featured',
      'listingItem-smallFeature',
    ],
  ];
  $listingItem_featured = new ListingItem( $featured_item_args );
  $listingItem_featured->render();
}
?>


<?php if ( have_posts() ): ?>
  <div class="archiveTable">
    <div class="archiveTable-inner">

			<div class="archiveTable-fauxTable">

				<div class="archiveTable-fauxTableHeader">

					<div class="archiveTable-fauxTableCol">
						<?php
						// By default the archive will have order='DESC', so the link to change the order should start with 'ASC'.
						$order = 'ASC';
						if( isset($_GET['order']) && $_GET['order'] === 'ASC' ){
							$order = 'DESC';
						}

						$date_sort_href = add_query_arg( [
							'orderby' => 'date',
							'order' => $order,
							'paged' => 1,
						], get_permalink($postPage) );
						?>
						<a href="<?php echo $date_sort_href; ?>" class="archiveTable-sorting archiveTable-sorting-<?php echo $order; ?>">Publish Date</a>
					</div>

					<div class="archiveTable-fauxTableCol">Title</div>

					<div class="archiveTable-fauxTableCol">Topics</div>

				</div><!-- END .archiveTable-fauxTableHeader -->

				<?php while ( have_posts() ): the_post(); ?>
        	<?php get_template_part( 'parts/listingItem-tableRow' ); ?>
				<?php endwhile; ?>

			</div>

			<?php get_template_part( 'parts/pagination' ); ?>

		</div>
  </div>
<?php endif; ?>




<?php
get_footer();
