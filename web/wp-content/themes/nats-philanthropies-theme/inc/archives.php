<?php


// function taoti_use_news_archive( $template ) {

// 	if( get_the_id() == get_option( 'page_for_posts' ) ){
// 		$new_template = locate_template( array( 'archive-news.php' ) );

// 		if ( '' != $new_template ) {
// 			return $new_template;
// 		}

// 	}

// 	return $template;
// }
// add_filter( 'template_include', 'taoti_use_news_archive', 99 );





/*
* PURPOSE : Filter the various archive titles so they don't include the prefixes like "Category:", "Author:", "Archives: ", etc. This includes the "Page for Posts" option.
*  PARAMS :  $title: string - The given title string.
* RETURNS : $title: string - The modified title string.
*/
function my_theme_archive_title( $title ) {

	if ( is_category() ) {
		$title = single_cat_title( '', false );

	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );

	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';

	} elseif ( taoti_is_page_for_posts() ) {
		$title = 'News';

	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );

	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'my_theme_archive_title' );
