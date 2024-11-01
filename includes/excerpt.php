<?php
/**
 *      File: excerpt.php
 *
 *      Supports the Core functionality of plugin "Show Post Categories"
 *      "Excerpt"-based magic happens here!
**/

// Security Check
defined( 'ABSPATH' ) or die( 'DIRECT ACCESS BLOCKED!' );

function spc_get_excerpt($post_id, $excerpt_length){

	if ( $excerpt_length == NULL ) {
		$excerpt_length = 55;
	} //Sets excerpt length by word count, Wp default is 55 words

	if ( has_excerpt( $post_id ) ) {
		$the_excerpt = get_the_excerpt($post_id); //Get excerpt if defined in post
	} else {
		$the_post = get_post($post_id); //Get array w data of post ID
		$the_excerpt = $the_post->post_content; //Get post_content to be used as a basis for the excerpt
	}

    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '…');
        $the_excerpt = implode(' ', $words);
    endif;

	return trim( $the_excerpt ); // Create output

}
?>