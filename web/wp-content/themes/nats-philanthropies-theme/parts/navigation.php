<?php
$theme_location = 'main-navigation';

$menuLocations = get_nav_menu_locations();
// echo "<pre>"; print_r( $menuLocations ); echo "</pre>";
if( isset($menuLocations[$theme_location]) ):
	$main_nav = wp_get_nav_menu_items($menuLocations[$theme_location]);
	// echo "<pre>"; var_dump($main_nav); echo "</pre>";

	$nav_item_counter = 1;
	if( !empty($main_nav) ): ?>
<nav class="navContainer navContainer-<?php echo $theme_location; ?>">
	<ul class="menu menu-mainMenu">
		<?php foreach( $main_nav as $nav_item ): ?>
			<?php
			// echo "<pre>"; print_r($nav_item); echo "</pre>";
			$title = $nav_item->title;
			$href = $nav_item->url;
			?>

			<li class="menu-item">
				<a href="<?php echo $href; ?>" class="menu-link">
					<?php echo $title; ?>
					<?php if( $nav_item_counter === count($main_nav) ): ?>
					<i class="menu-icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i>
					<?php endif; ?>
				</a>
			</li>

			<?php $nav_item_counter++; ?>

		<?php endforeach; ?>
	</ul>
</nav>
	<?php
	endif;

endif;
