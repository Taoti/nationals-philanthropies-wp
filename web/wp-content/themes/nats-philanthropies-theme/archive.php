<?php
use Modules\Hero;


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
$args = [
  'heading_line_1' => get_the_archive_title(),
	'heading_line_2' => 'ohai',
	// 'background_image_url' => '', // get featured image
];
$hero = new Hero($args);
$hero->render();
?>
<?php
$featured_item = get_field('featured_event', 'options');

// Featured Listing Item
$listingItem_args = [
  'primary_heading' => get_the_title( $selected_event ),
  'subtitle' => get_sub_field( 'subtitle' ),
  'excerpt' => get_the_excerpt( $selected_event ),
  'permalink' => get_permalink( $selected_event ),
  'primary_button_url' => get_field( 'rsvp_url', $selected_event->ID ),
  'primary_button_label' => 'RSVP',
  'secondary_button_url' => get_field( 'sponsor_url', $selected_event->ID ),
  'secondary_button_label' => get_field( 'sponsor_name', $selected_event->ID ),
  'image_array' => Get::featured_image_array( $selected_event->ID ),
  'classes' => [
    'listingItem-featured',
  ],
];
$listingItem = new ListingItem( $listingItem_args );
$listingItem->render();
?>


<div class="archiveContent">
    <div class="l-container archiveContent-inner">

    <?php if( have_posts() ): ?>

        <?php while( have_posts() ): the_post(); ?>

    		<h2><?php the_title(); ?></h2>
    		<div><?php the_excerpt(); ?></div>

        <?php endwhile; ?>

    <?php else: ?>

        <?php echo 'Not Found.'; ?>

    <?php endif; ?>

    </div><!-- END .archiveContent-inner -->
</div><!-- END .archiveContent -->



<?php
get_footer();
