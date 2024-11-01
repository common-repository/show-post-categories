<?php
/**
 *	File: Category.php
 *
 *	Supports the Core functionality of plugin "Show Post Categories"
 *	All Category based magic happens here!
**/

//	Security check
defined( 'ABSPATH' ) or die( 'DIRECT ACCESS BLOCKED!' );

function SPC_Category($TaxonomyType, $PostID, $ParentCategory, $URL, $Parent, $Separator, $URL_Target, $SPC_Option_URL_Text1){

	$spc_output = "";	//	Initializing variable to avoid lowlevel errors

	/*
	*	Check what kind of Taxonomy is used & return linked Categories
	*		Default WP Taxonomy == Category
	*		Custom Taxonomy == All the other ones
	*
	*	WP Documentation
	*		Default:	https://developer.wordpress.org/reference/functions/get_the_category/
	*		Custom:		https://developer.wordpress.org/reference/functions/get_the_terms/
	*/
	if ($TaxonomyType == "category"){
		$categories = get_the_category($PostID);
	}Else{
		$categories = get_the_terms($PostID, $TaxonomyType);
	}

	/*
	*	If user wants to do something with the ParentCategory we need its ID
	*		get_category_id == custom function based on get_term_by
	*/
	if ($ParentCategory != Null){
		$ParentCatID = get_category_id($ParentCategory, $TaxonomyType);
	}

	/*
	*	If there is one or more Category we will return data, otherwise we do nothing
	*
	*	We need to verify what user wants before returning data
	*		Null == user wants all data to be shown
	*		NOT Null == User wants filter on specific Category
	*/
	if (empty($categories)) {
			// There is nothing to return, bye!
	}else{
		switch ($ParentCategory){
			case Null:
			
			foreach( $categories as $category ) {	// If there is more than 1 category, loop through all and do the following..

				if ($URL == 'no' && $Parent != 'yes'){	// do not list Hyperlinks or Parents
					if ($category->parent != 0 && $category->term_id != $ParentCatID){
						$spc_output .= esc_html( $category->name ) . $Separator;
					}
					
				}elseif ($URL == 'no' && $Parent == 'yes'){	// do not list Hyperlinks but list Parents
					$spc_output .= esc_html( $category->name ) . $Separator;
					
				}elseif ($URL != 'no' && $Parent != 'yes'){	// do list Hyperlinks but no Parents
					if ($category->parent != 0 && $category->term_id != $ParentCatID){
						$spc_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), $category->name ) ) . '" target="'.$URL_Target.'">' . esc_html( $category->name ) . '</a>' . $Separator;
					}
					
				}elseif ($URL != 'no' && $Parent == 'yes'){	// list Hyperlinks and Parents
					$spc_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), $category->name ) ) . '" target="'.$URL_Target.'">' . esc_html( $category->name ) . '</a>' . $Separator;

				}else{
					// There are only four options!
				}
			}
			
			break;//	END OF CASE	
			
			default:
			
			foreach( $categories as $category ) {	// If there is more than 1 category, loop through all and do the following..
			
				if(term_is_ancestor_of( $ParentCatID, $category->term_id, $TaxonomyType ) || $category->term_id == $ParentCatID){
					if ($URL == 'no' && $Parent == 'no'){	// do not list Hyperlinks or Parents
						if ($category->parent != 0 && $category->term_id != $ParentCatID){
							$spc_output .= esc_html( $category->name ) . $Separator;
						}
						
					}elseif ($URL == 'no' && $Parent == 'yes'){	// do not list Hyperlinks but list Parents
						$spc_output .= esc_html( $category->name ) . $Separator;
						
					}elseif ($URL != 'no' && $Parent != 'yes'){	// do list Hyperlinks but no Parents
						if ($category->parent != 0 && $category->term_id != $ParentCatID){
							$spc_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), $category->name ) ) . '" target="'.$URL_Target.'">' . esc_html( $category->name ) . '</a>' . $Separator;
						}
						
					}elseif ($URL != 'no' && $Parent == 'yes'){	// list Hyperlinks and Parents
						$spc_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" title="' . esc_attr( sprintf( __( $SPC_Option_URL_Text1, 'Show-Post-Categories' ), $category->name ) ) . '" target="'.$URL_Target.'">' . esc_html( $category->name ) . '</a>' . $Separator;

					}else{
						// There are only four options!
					}
				}
			}
			
			break;//	END OF CASE

		}
	}

	return trim( $spc_output, $Separator );	//	Create output, add optional custom separator

}
?>