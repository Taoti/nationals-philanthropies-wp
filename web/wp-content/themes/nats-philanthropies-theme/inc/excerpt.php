<?php

### Makes sure that when get_the_excerpt() is used, the content in the page builder is used as a backup to generate the excerpt, since the default content editor is not used for pages.
function taoti_extend_excerpt( $excerpt, $post ) {

	$post_types_with_page_builder = taoti_get_post_types_with_page_builder();

    // Make sure this has a page builder, and also that the excerpt is blank.
	if( in_array( get_post_type($post), $post_types_with_page_builder ) && !$excerpt ){

		// Get the page builder contents and strip all the tags, excerpts aren't supposed to have HTML in them.
		$page_content = get_post_meta( $post->ID, 'taoti_page_builder_output', true );

		if( $page_content ){
			$stripped_content = trim( wp_strip_all_tags( $page_content, true ) );
			$excerpt = wp_trim_words( $stripped_content, jp_custom_excerpt_length() );
		}

	}

	return $excerpt;
}

// Use the page content as a fallback for the excerpt only on search and archive pages. (and the "page for posts" page which is_archive() won't pick up)
function taoti_set_excerpt_fallback($query){
	if( $query->is_search() || $query->is_archive() || (isset($query->queried_object_id) && intval($query->queried_object_id) === intval(get_option('page_for_posts')) ) ){

		add_filter( 'get_the_excerpt', 'taoti_extend_excerpt', 10, 2 );

	}
}
add_action( 'pre_get_posts', 'taoti_set_excerpt_fallback' );
