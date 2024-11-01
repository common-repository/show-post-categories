<?php
/**
 * File: uninstall.php
 * Runs on uninstall of Show Post Categories
 *
 * @package   Show Post Categories
 * @author    Olivier Willems
 * @license   GPL-2.0+
 * @link      http://willemso.com
**/

//	Security check
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

//	Delete all plugin options from the WP database
$options = array(
	'spc_options'	//	Main plugin options are in found in just 1 array
);
foreach ( $options as $option ) {
	if ( get_option( $option ) ) {
		delete_option( $option );
	}
}

/**
 * Thank you for using "Show Post Categories". We are sorry you are leaving! 
 * Because you came this far I would love to receive your feedback about this plugin.
 * Visit my site and leave a message with your input and/or suggestions. Bye!
**/
?>