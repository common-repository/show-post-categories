<?php
/**
 *	File: author.php
 *
 *	Supports the Core functionality of plugin "Show Post Categories"
 *	"Author"-based magic happens here!
**/

// Security Check
defined( 'ABSPATH' ) or die( 'DIRECT ACCESS BLOCKED!' );

function SPC_Author($PostID, $Attribute, $URL, $URL_Target, $SPC_Option_URL_Text1){

	$spc_output = "";	// Initializing variable to avoid lowlevel errors
	
	/*
	*	Find ID of author so we can use this in our lookup
	*
	*	WP Documentation:
	*		https://codex.wordpress.org/Function_Reference/get_post_field
	*		https://codex.wordpress.org/Database_Description#Table:_wp_posts
	*/
	$AuthorID = get_post_field( 'post_author', $PostID );

	/*
	*	Loop through attributes and show what user needs
	*/
	switch($Attribute){
		
		case "email": // User wants email from author
		
			if($URL == "no"){	// User does not need a hyperlink
			
				/*
				*	NOTE:
				*		We use [get_] because we want to do something with returned data
				*		the_author_meta( 'user_email' ,$PostID) <===> get_the_author_meta( 'user_email', $AuthorID)
				*
				*	WP Documentation:
				*		Use get_the_author_meta() if you need to return (and do something with) the field, rather than just display it.
				*		https://codex.wordpress.org/Function_Reference/the_author_meta
				*/
				$spc_output = get_the_author_meta( 'user_email', $AuthorID); 
				
			}else{	// User needs a hyperlink, because it´s a mailbox we use [Mailto:]
				$spc_output = '<A HREF="mailto:' . get_the_author_meta( 'user_email', $AuthorID) . '">' . get_the_author_meta( 'user_email', $AuthorID) . '</A>';
			}	
			
		break;// END OF CASE
		
		/*
		*	NOTE; there are two sorts of "URL"
		*	- user_url	=> URL defined in the author´s profile, can be anything on the internal site or the whole world wide web..
		*	- get_author_posts_url	=> The page on this site that show author related data
		*
		*	Because it makes sense, attribute "URL" will show the defined URL in authors page.
		*
		*	Documentation:
		*		https://developer.wordpress.org/reference/functions/get_the_author_meta/
		*		https://codex.wordpress.org/Function_Reference/get_author_posts_url
		*/		
		case "url":	//	User wants url from author
		
			$spc_output = get_the_author_meta( 'user_url' ,$AuthorID); 
			
			if($URL == "no"){	// User does not need a hyperlink
				$spc_output = get_the_author_meta( 'user_url' ,$AuthorID);
				
			}else{	// User needs a hyperlink
				$spc_output = '<a href="' . esc_url( get_the_author_meta( 'user_url' ,$AuthorID) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), get_the_author_meta( 'user_url' ,$AuthorID) ) ) . '" target="'.$URL_Target.'">' . esc_html( get_the_author_meta( 'user_url' ,$AuthorID) ) . '</a>';
			}
				
		break;// END OF CASE

		case "authorpage":	// User wants author url

			if($URL == "no"){	// User does not need a hyperlink
				$spc_output = get_author_posts_url( $AuthorID );
				
			}else{	// User needs a hyperlink
				$spc_output = '<a href="' . esc_url( get_author_posts_url( $AuthorID ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), get_author_posts_url( $AuthorID ) ) ) . '" target="'.$URL_Target.'">' . esc_html( get_author_posts_url( $AuthorID ) ) . '</a>';
			}
			
		break;// END OF CASE

		case "nicename":	//	User wants nicename from author
			 
			if($URL == "no"){	// User does not need a hyperlink
				$spc_output = get_the_author_meta( 'user_nicename' ,$AuthorID);
				
			}else{	// User needs a hyperlink
				$spc_output = '<a href="' . esc_url( get_author_posts_url( $AuthorID ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), get_author_posts_url( $AuthorID ) ) ) . '" target="'.$URL_Target.'">' . esc_html( get_the_author_meta( 'user_nicename' ,$AuthorID) ) . '</a>';
			}
				
		break;// END OF CASE
				
		case "nickname":	//	User wants nickname from author

			if($URL == "no"){	// User does not need a hyperlink
				$spc_output = get_the_author_meta( 'nickname' ,$AuthorID);
				
			}else{	// User needs a hyperlink
				$spc_output = '<a href="' . esc_url( get_author_posts_url( $AuthorID ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), get_author_posts_url( $AuthorID ) ) ) . '" target="'.$URL_Target.'">' . esc_html( get_the_author_meta( 'nickname' ,$AuthorID) ) . '</a>';
			}
			
		break;// END OF CASE
				
		case "firstname":	//	User wants first_name from author

			if($URL == "no"){	// User does not need a hyperlink
				$spc_output = get_the_author_meta( 'first_name' ,$AuthorID);
				
			}else{	// User needs a hyperlink
				$spc_output = '<a href="' . esc_url( get_author_posts_url( $AuthorID ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), get_author_posts_url( $AuthorID ) ) ) . '" target="'.$URL_Target.'">' . esc_html( get_the_author_meta( 'first_name' ,$AuthorID) ) . '</a>';
			}
			
		break;// END OF CASE
				
		case "lastname":	//	User wants last_name from author

			if($URL == "no"){	// User does not need a hyperlink
				$spc_output = get_the_author_meta( 'last_name' ,$AuthorID);
				
			}else{	// User needs a hyperlink
				$spc_output = '<a href="' . esc_url( get_author_posts_url( $AuthorID ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), get_author_posts_url( $AuthorID ) ) ) . '" target="'.$URL_Target.'">' . esc_html( get_the_author_meta( 'last_name' ,$AuthorID) ) . '</a>';
			}
			
		break;// END OF CASE
				
		case "id":	//	User wants id from author

			if($URL == "no"){	// User does not need a hyperlink
				$spc_output = get_the_author_meta( 'id' ,$AuthorID);
				
			}else{	// User needs a hyperlink
				$spc_output = '<a href="' . esc_url( get_author_posts_url( $AuthorID ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), get_author_posts_url( $AuthorID ) ) ) . '" target="'.$URL_Target.'">' . esc_html( get_the_author_meta( 'id' ,$AuthorID) ) . '</a>';
			}
			
		break;// END OF CASE
		
		case "biography":	//	User wants biography from author

			$spc_output = nl2br(get_the_author_meta( 'description' ,$AuthorID));
			
		break;// END OF CASE

		default:	//	By default user just wants a display name

			if($URL == "no"){	// User does not need a hyperlink
				$spc_output = get_the_author_meta( 'display_name' ,$AuthorID);
				
			}else{	// User needs a hyperlink
				$spc_output = '<a href="' . esc_url( get_author_posts_url( $AuthorID ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), get_author_posts_url( $AuthorID ) ) ) . '" target="'.$URL_Target.'">' . esc_html( get_the_author_meta( 'display_name' ,$AuthorID) ) . '</a>';
			}
			
		break;// END OF CASE
	}

	return trim( $spc_output); // Create output

}
?>