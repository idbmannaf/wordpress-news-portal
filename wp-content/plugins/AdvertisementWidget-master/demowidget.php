<?php
/*
Plugin Name: Advertisement Widget
Plugin URI: https://github.com/idbnewsmannaf
Description: Advertisement Widget
Version: 1.0
Author: Mannaf
Author URI: https://github.com/idbnewsmannaf
License: GPLv2 or later
Text Domain: demowidget
Domain Path: /languages/
*/

require_once plugin_dir_path(__FILE__)."widgets/class.demowidget.php";
require_once plugin_dir_path(__FILE__)."widgets/class.demowidgetui.php";
require_once plugin_dir_path(__FILE__)."widgets/class.advertisementwidget.php";

function demowidget_load_textdomain() {
	load_plugin_textdomain( 'demowidget', false, plugin_dir_path( __FILE__ ) . "languages/" );
}

add_action( 'plugins_loaded', 'demowidget_load_textdomain' );


function demowidget_register(){
	register_widget('DemoWidget');
	register_widget('AdvertisementWidget');
	register_widget('DemoWidgetUI');
}
add_action('widgets_init','demowidget_register');

function demowidget_admin_enqueue_scripts($screen){
	if($screen=="widgets.php") {
		wp_enqueue_media();
		wp_enqueue_script("advertisement-widget-js", plugin_dir_url(__FILE__)."js/media-gallery.js", array("jquery"), "1.0", 1);
		wp_enqueue_style("demowidget-admin-ui-css",plugin_dir_url(__FILE__)."css/widget.css");
	}
}

add_action("admin_enqueue_scripts","demowidget_admin_enqueue_scripts");
