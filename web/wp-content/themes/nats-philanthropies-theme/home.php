<?php
use JP\Get;
use Modules\Hero;
use Modules\ListingItem;

$postPage = get_option( 'page_for_posts' );

### Critical CSS for the main archive template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/index-critical.min.css' );

get_header();
?>



<?php
$common_fields = get_field('news_archive_hero', $postPage);
$heading_line_1 = $common_fields['primary_heading_line_1'];
$heading_line_2 = $common_fields['primary_heading_line_2'];
$bg_image = Get::featured_image_array( $postPage );

$args = [
  'heading_line_1' => $heading_line_1,
	'heading_line_2' => $heading_line_2,
  'description' => get_the_excerpt($postPage),
	'background_image_url' => $bg_image, // get featured image
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
    'subtitle' => 'Featured Event',
    'excerpt' => get_the_excerpt( $featured_item ),
    'permalink' => get_permalink( $featured_item ),
    'primary_button_url' => get_permalink($featured_item),
    'primary_button_label' => 'Read More',
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
        <?php
        $post = get_the_id();
        setup_postdata( $post );

        $newsTypes = wp_get_post_terms( get_the_id(), $taxonomy = 'type', array('fields' => 'names'));
        
        // Featured Listing Item
        $listingItem_args = [
          'primary_heading' => get_the_title(),
          'subtitle' => implode(', ', $newsTypes),
          'excerpt' => get_the_excerpt(),
          'permalink' => get_permalink(),
          'primary_button_url' => get_permalink($featured_item),
          'primary_button_label' => 'Read More',
          'image_array' => Get::featured_image_array(get_the_id()),
        ];
        $listingItem = new ListingItem( $listingItem_args );
        $listingItem->render();

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
