<?php
$theme_location = 'main-navigation';

$menuLocations = get_nav_menu_locations();
// echo "<pre>"; print_r( $menuLocations ); echo "</pre>";
if( isset($menuLocations[$theme_location]) ):
	$main_nav = wp_get_nav_menu_items($menuLocations[$theme_location]);
	// echo "<pre>"; var_dump($main_nav); echo "</pre>";

	$nav_item_counter = 1;
	if( !empty($main_nav) ): ?>

<nav class="navContainer navContainer-mobile">
	<ul class="menu menu-mobileMenu">

		<li class="menu-item menu-item-mobileMenu">

			<button class="menu-link menu-link-mobileMenu menu-link-mobileMenu-open js-openNav">
				Menu
				<i class="menu-icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i>
			</button>

			<button class="menu-link menu-link-mobileMenu menu-link-mobileMenu-close js-closeNav">
				Close
				<i class="menu-icon">&times;</i>
			</button>

		</li>

		<li class="menu-item menu-item-mobileMenu">
			<a href="https://www.mlb.com/nationals/forms/give" class="menu-link menu-link-mobileMenu">
				Donate
				<i class="menu-icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i>
			</a>
		</li>

	</ul>
</nav>

<nav class="navContainer navContainer-<?php echo $theme_location; ?>">
	<ul class="menu menu-mainMenu">
		<?php foreach( $main_nav as $nav_item ): ?>
			<?php
			// echo "<pre>"; print_r($nav_item); echo "</pre>";
			$title = $nav_item->title;
			$href = $nav_item->url;
			?>

			<li class="menu-item menu-item-mainMenu">
				<a href="<?php echo $href; ?>" class="menu-link menu-link-mainMenu">
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
