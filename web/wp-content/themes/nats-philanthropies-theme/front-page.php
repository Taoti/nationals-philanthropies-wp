<?php
use Modules\Hero;
use Modules\ContentGroup;
use JP\Get;

$temporary_page_enabled = ( get_field( 'temporary_landing_page_is_enabled', 'option' ) );

if( $temporary_page_enabled ):
  get_template_part( 'template-temporary-front-page' );

else :


### Critical CSS for the front page template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/front-page-critical.min.css' );


get_header();
?>

<?php
// The total number of sections on the homepage is the hero plus the number of modules in the home page builder.
$modules_homePage = get_field('modules_homePage');

$total_sections = 1; // The 1 is the hero.
if( is_array($modules_homePage) && !empty($modules_homePage) ){
  $total_sections = $total_sections + count($modules_homePage);
}

// $total_sections = 5; // tmporary hardcode to 5

// Output the numbered page based on the total number of homepage sections. The number should be at least 2 digits with a leading zero if it's only one digit, like 01, 02, 03, etc.
?>
<nav class="sectionNavigation">
  <ul>
    <?php for( $i = 1; $i <= $total_sections; $i++ ): ?>
      <li class="scrollspy-navItem"><?php echo sprintf('%02d', $i); ?></li>
    <?php endfor; ?>

  </ul>
</nav>

<?php
$featured_image_url = Get::featured_image_url( '1080p', get_the_ID() );
if( !$featured_image_url ){
	$featured_image_url = Get::featured_image_url( '720p', get_the_ID() );
}

$args = [
  'heading_line_1' => get_field( 'home_hero_primary_heading_line_1' ),
  'heading_line_2' => get_field( 'home_hero_primary_heading_line_2' ),
  'description' => get_field( 'home_hero_description' ),
  'button_label' => get_field( 'home_hero_button_label' ),
  'button_link' => get_field( 'home_hero_button_url' ),
  'background_image_url' => $featured_image_url,
];
$hero = new Hero($args);
$hero->render();
?>

<?php the_page_builder( 'modules_homePage' ); ?>


<?php
get_footer();

endif;
