<?php
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

		<li class="menu-item menu-item-mobileMenu<?php if( $is_last_item ): ?> menu-item-bigButton<?php endif; ?>">
			<a href="https://www.mlb.com/nationals/forms/give" class="menu-link menu-link-mobileMenu menu-link-bigButton">
				Donate
				<i class="menu-icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i>
			</a>
		</li>

	</ul>
</nav>

<nav class="navContainer navContainer-<?php echo $theme_location; ?>">
	<ul class="menu menu-mainMenu">
		<?php $nav_item_counter = 1; ?>
		<?php foreach( $top_level_nav as $nav_item ): ?>
			<?php
			$nav_item_ID = $nav_item->ID;
			$title = $nav_item->title;
			$href = $nav_item->url;
			$is_last_item = ( $nav_item_counter === count($main_nav) );
			?>

			<li class="menu-item menu-item-mainMenu<?php if( $is_last_item ): ?> menu-item-bigButton<?php endif; ?>">
				<a href="<?php echo $href; ?>" class="menu-link menu-link-mainMenu<?php if( $is_last_item ): ?> menu-link-bigButton<?php endif; ?>">
					<?php echo $title; ?>
					<?php if( $is_last_item ): ?>
					<i class="menu-icon"><?php echo file_get_contents(get_stylesheet_directory() . '/images/icon-arrow.svg'); ?></i>
					<?php endif; ?>
				</a>

				<?php if( isset($sub_navs[$nav_item_ID]) && !empty($sub_navs[$nav_item_ID]) ): ?>
				<div class="subMenu">
					<div class="subMenu-inner">

						<div class="subMenu-titleArea">

							<a class="submenu-titleAreaLink" href="<?php echo $href; ?>"><?php echo $title; ?></a>

							<p class="subMenu-titleAreaDescription">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

						</div>

						<ul class="subMenu-menu">
					<?php foreach( $sub_navs[$nav_item_ID] as $sub_nav_item ): ?>
							<li class="subMenu-menu-item">
								<a class="subMenu-menu-link" href="<?php $sub_nav_item->href; ?>"><?php echo $sub_nav_item->title; ?></a>
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
