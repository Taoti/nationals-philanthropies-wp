<a class="archiveTable-fauxTableRow" href="<?php the_permalink(); ?>">

	<div class="archiveTable-fauxTableCol archiveTable-fauxTableCol-date">
		<?php the_date( 'm/d/Y' ); ?>
	</div>

	<div class="archiveTable-fauxTableCol archiveTable-fauxTableCol-title">
		<?php the_title(); ?>
	</div>

	<div class="archiveTable-fauxTableCol archiveTable-fauxTableCol-topic">
		<?php
		$primary_topic = taoti_get_primary_term( get_the_ID(), 'topic' );
		if( is_a($primary_topic, 'WP_Term') ):
			echo $primary_topic->name;
		endif;
		?>
	</div>

</a><!-- END .archiveTable-fauxTableRow -->
