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



<?php
/*
 * NOTE
 * Use the page builder (an ACF flex content field)
 * 						- OR -
 * the standard the_content() field.
 * (Delete this comment)
 */
?>
<?php the_page_builder(); ?>

<div class="content">
	<div class="content-inner">

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="entry-content">
			<?php the_content(); ?>
		</div>

	</div><!-- END .content-inner -->
</div><!-- END .content -->



<?php
get_footer();
