<?php
/*
Plugin Name: Pop Up ads
Plugin URL: https://mannaf.me/plugin/popup/
Description: All the_content Word Count
Version: 1.0
Author: Mannaf
Author URL: https://mannaf.me/auth/popup
License: GPLv2 or Later
Text Domain: popup
Domain Path: /languages/
 */
function pop_load_textdomain()
{
	load_plugin_textdomain('popup', false, dirname(__FILE__) . '/languages');
}
add_action('plugin_loaded', 'pop_load_textdomain');

function popup_assets()
{
	wp_enqueue_style('popup-css', plugin_dir_url(__FILE__) . "/style.css");
	wp_enqueue_script('popup-js', plugin_dir_url(__FILE__) . "/popup.js", null, 1.0, true);
}
add_action('wp_enqueue_scripts', 'popup_assets');

//theme customizer start
/**
 * Add our Customizer content
 */
function popup_customize_register($wp_customize)
{
	// Add all your Customizer content (i.e. Panels, Sections, Settings & Controls) here...

	/**
	 * Add our Header & Navigation Panel
	 */
	$wp_customize->add_panel(
		'front_page_panel',
		array(
			'title' => __('Front Page Customization'),
			'description' => esc_html__('Adjust your Front Page.'), // Include html tags such as

			'priority' => 160, // Not typically needed. Default is 160
			'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
			'theme_supports' => '', // Rarely needed
			'active_callback' => '', // Rarely needed
		)
	);

	/**
	 * Add our Sample Section
	 */
	$wp_customize->add_section(
		'popup_section',
		array(
			'title' => __('Popup Section'),
			'description' => esc_html__('These are an example of Customizer Custom Controls.'),
			'panel' => 'front_page_panel', // Only needed if adding your Section to a Panel
			'priority' => 160, // Not typically needed. Default is 160
			'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
			'theme_supports' => '', // Rarely needed
			'active_callback' => '', // Rarely needed
			'description_hidden' => 'false', // Rarely needed. Default is False
		)
	);

	/**
	 * Add settings
	 */
	$wp_customize->add_setting(
		'popup_info',
		array(
			'default' => '456', // Optional.
			'transport' => 'refresh', // Optional. 'refresh' or 'postMessage'. Default: 'refresh'
			'type' => 'theme_mod', // Optional. 'theme_mod' or 'option'. Default: 'theme_mod'
			'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
			'theme_supports' => '', // Optional. Rarely needed
			'validate_callback' => '', // Optional. The name of the function that will be called to validate Customizer settings
			'sanitize_callback' => '', // Optional. The name of the function that will be called to sanitize the input data before saving it to the database
			'sanitize_js_callback' => '', // Optional. The name of the function that will be called to sanitize the data before outputting to javascript code. Basically to_json.
			'dirty' => false, // Optional. Rarely needed. Whether or not the setting is initially dirty when created. Default: False
		)
	);
	/**
	 * Add control
	 */
	$wp_customize->add_control(
		'popup_info',
		array(
			'label' => __('Default Text Control'),
			'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date'),
			'section' => 'popup_section',
			'priority' => 10, // Optional. Order priority to load the control. Default: 10
			'type' => 'text', // Can be either text, email, url, number, hidden, or date
			'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
			'input_attrs' => array( // Optional.
				'class' => 'my-custom-class',
				'style' => 'border: 1px solid rebeccapurple',
				'placeholder' => __('Enter name...'),
			),
		)
	);

	$wp_customize->add_control(new WP_Customize_Image_Control(
		$wp_customize,
		'popup_info',
		array(
			'label' => __('Pop Up Image'),
			'description' => esc_html__('This is the description for the Image Control'),
			'section' => 'popup_section',
			'button_labels' => array( // Optional.
				'select' => __('Select Image'),
				'change' => __('Change Image'),
				'remove' => __('Remove'),
				'default' => __('Default'),
				'placeholder' => __('No image selected'),
				'frame_title' => __('Select Image'),
				'frame_button' => __('Choose Image'),
			)
		)
	));
};


add_action('customize_register', 'popup_customize_register');
//theme customizer end
function my_added_page_content()
{
	echo '<h2 class="d-none">Only Displays On The Front Page</h2>';
?>
	<?php if (get_theme_mod('popup_info')) : ?>
		<?php if (is_home()) : ?>
			<div id="boxes">
				<div style="top: 50%; left: 50%; display: none;" id="dialog" class="window">
					<div id="san">
						<a href="#" class="close agree"><img src="https://i.ibb.co/ScPQ7Hv/close-icon.png" width="25" style="float:right; margin-right: -25px; margin-top: -20px; z-index: 9999"></a>

						<img src="<?php echo get_theme_mod('popup_info') ?>" width="800" class="add">
					</div>
				</div>
				<div style="width: 2478px; font-size: 32pt; color:white; height: 1202px; display: none; opacity: 0.4;" id="mask"></div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php
}
//add_filter( 'wp_title', 'my_added_page_content', 10, 2 );

add_filter('this_popup', 'my_added_page_content');
