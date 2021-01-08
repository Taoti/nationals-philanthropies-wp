<?php

// Split the main navigation items into two arrays - one for the top level nav items and the other for the sub nav items. This allows us to loop through the arrays to output the navigation with the exact HTML we want, without the output from `wp_nav_menu()`.
$theme_location = 'main-navigation';

$menuLocations = get_nav_menu_locations();
// echo "<pre>"; print_r( $menuLocations ); echo "</pre>";
if( isset($menuLocations[$theme_location]) ):
	$main_nav = wp_get_nav_menu_items($menuLocations[$theme_location]);
	// echo "<pre>"; print_r($main_nav); echo "</pre>";

	if( !empty($main_nav) ):

		$top_level_nav = [];
		$sub_navs = [];

		foreach( $main_nav as $nav_item ){
			$parent_ID = $nav_item->menu_item_parent;

			if( $nav_item->menu_item_parent === '0' ){
				$top_level_nav[] = $nav_item;

			} else {
				$sub_navs[$parent_ID][] = $nav_item;
			}

		}
		// echo "<pre>"; print_r($sub_navs); echo "</pre>";

	?>

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

		<li class="menu-item menu-item-mobileMenu menu-item-bigButton">
			<a href="<?php echo home_url(); ?>/donate-now" class="menu-link menu-link-mobileMenu menu-link-bigButton">
				Donate
				<i class="menu-icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i>
			</a>
		</li>

	</ul>
</nav>

<nav class="navContainer navContainer-<?php echo $theme_location; ?>">
	<ul class="menu menu-mainMenu">

		<li class="menu-item menu-item-mainMenu menu-item-mobileOnly">
			<a href="<?php echo home_url(); ?>/?s=" class="menu-link menu-link-mainMenu">Search</a>
		</li>

		<?php $nav_item_counter = 1; ?>
		<?php foreach( $top_level_nav as $nav_item ): ?>
			<?php
			$nav_item_ID = $nav_item->ID;
			$title = $nav_item->title;
			$href = $nav_item->url;
			$submenu_description = get_field( 'submenu_description', $nav_item );
			$is_last_item = ( $nav_item_counter === count($top_level_nav) );
			$has_sub_menu = ( isset($sub_navs[$nav_item_ID]) && !empty($sub_navs[$nav_item_ID]) );
			?>

			<li class="menu-item menu-item-mainMenu<?php if( $is_last_item ): ?> menu-item-bigButton<?php endif; ?><?php if( $has_sub_menu ): ?> menu-item-hasSubMenu<?php endif; ?>">
				<a href="<?php echo $href; ?>" class="menu-link menu-link-mainMenu<?php if( $is_last_item ): ?> menu-link-bigButton<?php endif; ?>">
					<?php echo $title; ?>
					<?php if( $is_last_item ): ?>
					<i class="menu-icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i>
					<?php endif; ?>
				</a>

				<?php if( $has_sub_menu ): ?>
				<div class="subMenu">
					<div class="subMenu-inner">

						<div class="subMenu-titleArea">

							<a class="subMenu-menu-link submenu-titleAreaLink" href="<?php echo $href; ?>"><?php echo $title; ?></a>

					<?php if( $submenu_description ): ?>
							<p class="subMenu-titleAreaDescription"><?php echo $submenu_description; ?></p>
					<?php endif; ?>

						</div>

						<ul class="subMenu-menu">
					<?php foreach( $sub_navs[$nav_item_ID] as $sub_nav_item ): ?>
							<li class="subMenu-menu-item">
								<a class="subMenu-menu-link" href="<?php echo $sub_nav_item->url; ?>"><?php echo $sub_nav_item->title; ?></a>
							</li>
					<?php endforeach; ?>
						</ul>

					</div>
				</div>
				<?php endif; ?>

			</li>

			<?php $nav_item_counter++; ?>

		<?php endforeach; ?>
	</ul>
</nav>
	<?php
	endif;

endif;
