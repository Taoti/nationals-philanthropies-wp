<?php
use JP\Get;
use Modules\Hero;
use Modules\ListingItem;


### Critical CSS for the main archive template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/index-critical.min.css' );

get_header();
?>



<?php
$common_fields = get_field('events_archive_hero', 'options');
$heading_line_1 = $common_fields['primary_heading_line_1'];
$heading_line_2 = $common_fields['primary_heading_line_2'];
$description = $common_fields['description'];
$bg_image = get_field('events_archive_hero_background_image', 'options');
if($bg_image){
  $bg_image = $bg_image['sizes']['1080p'];
}

$args = [
  'heading_line_1' => $heading_line_1,
	'heading_line_2' => $heading_line_2,
  'description' => $description,
	'background_image_url' => $bg_image, // get featured image
];
$hero = new Hero($args);
$hero->render();
?>

<?php
// Featured Listing Item
$featured_item = get_field('featured_event', 'options');

if($featured_item) {
  $featured_item_args = [
    'primary_heading' => get_the_title( $featured_item ),
    'subtitle' => 'Featured Event',
    'excerpt' => get_the_excerpt( $featured_item ),
    'permalink' => false,
    'primary_button_url' => get_field( 'rsvp_url', $featured_item->ID ),
    'primary_button_label' => 'RSVP',
    'secondary_button_url' => get_field( 'sponsor_url', $featured_item->ID ),
    'secondary_button_label' => get_field( 'sponsor_name', $featured_item->ID ),
    'image_array' => Get::featured_image_array( $featured_item->ID ),
    'classes' => [
      'listingItem-featured',
    ],
  ];
  $listingItem_featured = new ListingItem( $featured_item_args );
  $listingItem_featured->render();
}

?>


<?php if ( have_posts() ): ?>
  <div class="archiveList">
    <div class="archiveList-inner">

      <?php while ( have_posts() ): the_post(); ?>
        <?php get_template_part( 'parts/listingItem', 'events' ); ?>
			<?php endwhile; ?>

			<?php get_template_part( 'parts/pagination' ); ?>

    </div>
  </div>
<?php endif; ?>




<?php
get_footer();
