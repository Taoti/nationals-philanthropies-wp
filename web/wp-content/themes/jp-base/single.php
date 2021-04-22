<?php
use Modules\Hero;


### Critical CSS for the default single template
// taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/single-critical.min.css' );


get_header();

the_post();
?>



<?php
$hero_args = [
	// add as needed
];
$hero = new Hero($hero_args);
$hero->render();
?>



<?php the_page_builder(); ?>



<?php
get_footer();
