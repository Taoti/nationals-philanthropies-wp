<?php
$theme_location = 'temporary-navigation';

$menuLocations = get_nav_menu_locations();
// echo "<pre>"; print_r( $menuLocations ); echo "</pre>";
if (isset($menuLocations[$theme_location])) :
	$main_nav = wp_get_nav_menu_items($menuLocations[$theme_location]);
	// echo "<pre>"; var_dump($main_nav); echo "</pre>";

	if (!empty($main_nav)) : ?>
<nav class="navContainer navContainer-<?php echo $theme_location; ?>">
	<ul class="tempMenu tempMenu-mainMenu">
		<?php foreach ($main_nav as $nav_item) : ?>
			<?php
			// echo "<pre>"; print_r($nav_item); echo "</pre>";
			$title = $nav_item->title;
			$href = $nav_item->url;
			?>

			<li class="tempMenu-item">
				<a href="<?php echo $href; ?>" class="tempMenu-link" <?php if ($title === 'Subscribe') : ?> data-modal="tempMenu-modal-subscribe" <?php endif; ?>><?php echo $title; ?><i class="tempMenu-icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i></a>

				<?php if ($title === 'Subscribe') : ?>
					<div class="modal tempMenu-modal tempMenu-modal-subscribe">
						<div class="tempMenu-modal-inner">
							<button class="modal-close">Close<i class="modal-closeX">&times;</i></button>
							<?php echo do_shortcode('[gravityform id="1" title="true" description="false" ajax="true"]'); ?>
						</div>
					<?php endif; ?>

			</li>

		<?php endforeach; ?>
	</ul>
</nav>
	<?php
	endif;

endif;
