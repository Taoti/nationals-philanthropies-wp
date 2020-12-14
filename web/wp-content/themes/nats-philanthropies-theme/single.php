<?php
use Modules\Hero;


### Critical CSS for the default single template
taoti_enqueue_critical_css( get_template_directory().'/styles/css/critical/single-critical.min.css' );


get_header();

the_post();
?>


<?php
$args = [
	'description' => get_the_excerpt(),
];

// Check for the heading overrides. Line 1 should always be added to $args if it's available, since they might want to put the title all on the one line.
$heading_line_1 = get_field('hero_primary_heading_line_1');
$heading_line_2 = get_field('hero_primary_heading_line_2');
if( $heading_line_1 ){
	$args['heading_line_1'] = $heading_line_1;
}
// However line 2 should only be added if line 1 is also present.
if( $heading_line_2 && $heading_line_1 ){
	$args['heading_line_2'] = $heading_line_2;
}

$hero = new Hero($args);
$hero->render();
?>



<div class="l-content content-single">
	<div class="l-content-inner">

		<ul class="sharing">

			<li class="sharing-item sharing-item-facebook">
				<a href="https://www.facebook.com/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" class="sharing-link sharing-link-facebook" title="Share this page on Facebook" target="_blank" rel="noopener noreferrer">
					<i class="sharing-icon sharing-icon-facebook"><?php echo file_get_contents( get_template_directory().'/images/social-facebook.svg' ); ?></i>
				</a>
			</li>

			<li class="sharing-item sharing-item-twitter">
				<a href="https://twitter.com/share?url=<?php echo urlencode( get_permalink() ); ?>&text=<?php echo urlencode( 'Check out Washington Nationals Philanthropies! ' ); ?>" class="sharing-link sharing-link-twitter" title="Share this page on Twitter" target="_blank" rel="noopener noreferrer">
					<i class="sharing-icon sharing-icon-twitter"><?php echo file_get_contents( get_template_directory().'/images/social-twitter.svg' ); ?></i>
				</a>
			</li>

			<li class="sharing-item sharing-item-linkedin">
				<a href="https://www.linkedin.com/shareArticle?url=<?php echo urlencode( get_permalink() ); ?>&title=<?php echo urlencode( get_the_title() ); ?>" class="sharing-link sharing-link-linkedin" title="Share this page on LinkedIn" target="_blank" rel="noopener noreferrer">
					<i class="sharing-icon sharing-icon-linkedin"><?php echo file_get_contents( get_template_directory().'/images/social-linkedin.svg' ); ?></i>
				</a>
			</li>

			<li class="sharing-item sharing-item-email">
				<a href="mailto:+?subject=<?php echo urlencode( 'Sharing a link from Washington Nationals Philanthropies' ); ?>&body=<?php echo urlencode( 'Hi! I thought you would like to see this from Washington Nationals Philanthropies: "' . get_the_title() . '" (' . get_permalink() ) . ')'; ?>" class="sharing-link sharing-link-email" title="Share this page via email" target="_blank" rel="noopener noreferrer">
					<i class="sharing-icon sharing-icon-email"><?php echo file_get_contents( get_template_directory().'/images/icon-email.svg' ); ?></i>
				</a>
			</li>

		</ul>

		<?php the_page_builder(); ?>

	</div><!-- END .l-content-inner -->
</div><!-- END .l-content -->



<?php
get_footer();
