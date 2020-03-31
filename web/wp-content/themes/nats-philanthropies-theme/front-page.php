<?php
// use Modules\CTA;

$temporary_page_enabled = ( is_front_page() && get_field( 'temporary_landing_page_is_enabled', 'option' ) );

if( $temporary_page_enabled ):
  get_template_part( 'template-temporary-front-page' );

else :


### Critical CSS for the front page template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/front-page-critical.min.css' );


get_header();
?>



<div class="content">
  <div class="content-inner l-container">



  </div><!-- END .content-inner -->
</div><!-- END .content -->



<?php
get_footer();

endif;
