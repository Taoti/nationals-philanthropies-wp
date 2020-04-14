<?php
use Modules\Hero;

$temporary_page_enabled = ( get_field( 'temporary_landing_page_is_enabled', 'option' ) );

if( $temporary_page_enabled ):
  get_template_part( 'template-temporary-front-page' );

else :


### Critical CSS for the front page template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/front-page-critical.min.css' );


get_header();
?>

<?php
$args = [
  'heading_line_1' => 'One Pursuit For',
  'heading_line_2' => 'A Better Washington',
  'description' => 'We are committed to holistically improving the lives of children and families across Washington, D.C. and beyond. Join our movement today.',
  'button_label' => 'make a donation',
  'button_link' => '#',
  'background_image_url' => wp_get_attachment_image_src( get_post_thumbnail_id( get_the_id()), 'large')
];
$hero = new Hero($args);
$hero->render();
?>

<div class="content">
  <div class="content-inner">



  </div><!-- END .content-inner -->
</div><!-- END .content -->



<?php
get_footer();

endif;
