<?php
/**
 * Plugin Name: Show Post Categories
 * Plugin URI: http://willemso.com/
 * Description: Show all categories linked to a blog post; list them with hyperlinks or filter on specific parent category. More features incoming!
 * Version: 2.2.5
 * Author: Olivier Willems
 * Author URI: http://willemso.com/
 * Text Domain: Show-Post-Categories
**/

//	Security check
defined( 'ABSPATH' ) or die( 'DIRECT ACCESS BLOCKED!' );

//	Define & include; defaults + required files
define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'MY_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

require_once( MY_PLUGIN_PATH . 'includes/core.php');
if (is_admin()) require_once( MY_PLUGIN_PATH . 'includes/admin.php');

//	Do some action at the Activation or Deactivation of "Show Post Categories"-plugin
function spc_activation() {
	set_default_options();
}
register_activation_hook(__FILE__, 'spc_activation');

function spc_deactivation() {
}
register_deactivation_hook(__FILE__, 'spc_deactivation');

?>