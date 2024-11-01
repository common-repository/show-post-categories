<?php
/**
 * File: admin.php
 * All related coding for the admin/settings page
**/

//	Security check
defined( 'ABSPATH' ) or die( 'DIRECT ACCESS BLOCKED!' );


// To-do; add Global for key and value, so options can be set on central place instead of retyping..

//	Add "settings" hyperlink at the Plugin overview
function my_plugin_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=show-post-categories') ) .'">Settings</a>';// Need to work on a translation option
   $links[] = '<a href="https://willemso.com" target="_blank">About</a>';
   return $links;
}
add_filter( 'plugin_action_links_' . MY_PLUGIN_BASENAME, 'my_plugin_action_links' );

//	Add new settings page at the default Settings/Options menu
add_action('admin_menu', function() {
    add_options_page( 'Show Post Categories settings', 'Show Post Categories', 'manage_options', 'show-post-categories', 'show_post_categories_options_page' );
});

/**
 * Set default options on activation or reset
 *	1) we register
 *	2) we update our options, we do not add them because the user could have defined his own custom settings
 *
 * Small token of appreciation, couldn´t have found it without this tutorial:
 *	https://kovshenin.com/2012/the-wordpress-settings-api/
 *	& http://qnimate.com/wordpress-settings-api-validation-and-sanitization/
 *	& http://stackoverflow.com/questions/35532617/add-a-button-to-reset-wordpress-theme-options
**/
function set_default_options() {
	add_action( 'admin_init', function() {
		register_setting( 'show-post-categories-settings', 'spc_options' ); // all options are pushed in single array - still need to sanitize?
	});
	
	$array_of_options = array(							//	How to use array data:
		'separator_1' => ', ',							//	$array_of_options = get_option( 'spc_options' );
		'hyperlink_text_1' => 'View all posts in %s',	//	$separator = $array_of_options[ 'separator_1' ];
		'hyperlink_text_2' => 'View %s',
		'hyperlink_text_3' => 'View %s',
		'hyperlink_text_4' => 'View %s',
		'hyperlink_target_1' => '_self'
	);
	update_option( 'spc_options', $array_of_options );
}

function reset_to_default_options($input) {// make 1 classe of set_default_options & reset_to_default_options
    if (isset($_POST['reset'])) {
        add_settings_error('show-post-categories', 'show-post-categories', __('Your settings have been reset to default.', 'show-post-categories'), 'updated');
        return array(									//	How to use array data:
		'separator_1' => ', ',							//	$array_of_options = get_option( 'spc_options' );
		'hyperlink_text_1' => 'View all posts in %s',	//	$separator = $array_of_options[ 'separator_1' ];
		'hyperlink_text_2' => 'View %s',
		'hyperlink_text_3' => 'View %s',
		'hyperlink_text_4' => 'View %s',
		'hyperlink_target_1' => '_self'
	);
    }
    return $input;
}


/**
 * Start building the options page using WP Settings API
**/
function spc_admin_init() {
	register_setting( 'show-post-categories-settingsgroup', 'spc_options' ); // all options are pushed in single array - still need to sanitize?
	register_setting('show-post-categories-settingsgroup', 'spc_options', 'reset_to_default_options'); // Call to reset option..

	//	1th section: Text Settings
    add_settings_section( 'section-one', 'Text settings', 'section_one_callback', 'show-post-categories' );
    add_settings_field( 'field-one', 'Separator', 'field_one_callback', 'show-post-categories', 'section-one' );
	
	//	2nd section: Hyperlink Settings
    add_settings_section( 'section-2', 'Hyperlink settings', 'section_2_callback', 'show-post-categories' );
    add_settings_field( 'field-2', 'Category  text', 'field_2_callback', 'show-post-categories', 'section-2' );
	add_settings_field( 'field-3', 'Title  text', 'field_3_callback', 'show-post-categories', 'section-2' );
	add_settings_field( 'field-4', 'ID  text', 'field_4_callback', 'show-post-categories', 'section-2' );
	add_settings_field( 'field-6', 'Tag  text', 'field_6_callback', 'show-post-categories', 'section-2' );
	add_settings_field( 'field-5', 'Hyperlink target', 'field_5_callback', 'show-post-categories', 'section-2' );
	
}
add_action( 'admin_init', 'spc_admin_init' );

//	add some help text concerning settings found in the section
function section_one_callback() {
    //echo 'Options should be self explanatory..';
}

//	The settings menu itself..
function field_one_callback() {
	$settings = (array) get_option( 'spc_options' );
    $separator_1 = esc_attr( $settings['separator_1'] );
    echo "<input type='text' name='spc_options[separator_1]' value='$separator_1' size='10' />";
}

//	add some help text concerning settings found in the section
function section_2_callback() {
    echo 'We are still working on <a href="https://codex.wordpress.org/I18n_for_WordPress_Developers" Title="What is Il8n?" Target="_blank">I18n</a>, so for now you can manually override the "hyperlink title" text.';
}

//	The settings menu itself..
function field_2_callback() {
	$settings = (array) get_option( 'spc_options' );
    $hyperlink_text_1 = esc_attr( $settings['hyperlink_text_1'] );
    echo "<textarea name='spc_options[hyperlink_text_1]'  rows='2' cols='50' />$hyperlink_text_1</textarea>";
}

//	The settings menu itself..
function field_3_callback() {
	$settings = (array) get_option( 'spc_options' );
    $hyperlink_text_2 = esc_attr( $settings['hyperlink_text_2'] );
    echo "<textarea name='spc_options[hyperlink_text_2]'  rows='2' cols='50' />$hyperlink_text_2</textarea>";
}

//	The settings menu itself..
function field_4_callback() {
	$settings = (array) get_option( 'spc_options' );
    $hyperlink_text_3 = esc_attr( $settings['hyperlink_text_3'] );
    echo "<textarea name='spc_options[hyperlink_text_3]'  rows='2' cols='50' />$hyperlink_text_3</textarea>";
}

//	The settings menu itself..
function field_5_callback() {
	$settings = (array) get_option( 'spc_options' );
    $hyperlink_target_1 = esc_attr( $settings['hyperlink_target_1'] );
    echo '<select name="spc_options[hyperlink_target_1]">
			<option value="">&mdash; select &mdash;</option>
			<option value="_self"';
					echo $hyperlink_target_1 == '_self' ? 'selected="selected"' : '';
					echo'>_self</option>
			<option value="_blank"';echo $hyperlink_target_1 == '_blank' ? 'selected="selected"' : ''; echo'>_blank</option>
			</select>';
}

//	The settings menu itself..
function field_6_callback() {
	$settings = (array) get_option( 'spc_options' );
    $hyperlink_text_4 = esc_attr( $settings['hyperlink_text_4'] );
    echo "<textarea name='spc_options[hyperlink_text_4]'  rows='2' cols='50' />$hyperlink_text_4</textarea>";
}

//	Now, we build the settings page!
function show_post_categories_options_page() {
    ?>
    <div class="wrap">
        <h2>Show Post Categories Settings</h2>
		<p>We offer you the ability to customize default options. If needed some settings can still be overruled on an individual basis (<a href="https://wordpress.org/plugins/show-post-categories/faq/">FAQ</a>).</p>
        <form action="options.php" method="POST">
            <?php settings_fields( 'show-post-categories-settingsgroup' ); ?>
            <?php do_settings_sections( 'show-post-categories' ); ?>
            <?php submit_button(); 
			submit_button(__('Reset'), 'secondary', 'reset', false);?>
        </form>
    </div>
    <?php
}
?>