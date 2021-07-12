<?php
/*
Plugin Name: Post To QR Code Generator
Plgin URL: https://mannaf.me/plugin/qr/
Description: All the_content Word Count
Version: 1.0
Author: Mannaf
Author URL: https://mannaf.me/auth/posttoqr
License: GPLv2 or Later
Text Domain: post-to-qr
Domain Path: /languages/
 */
function pqrc_load_textdomain(){
	load_plugin_textdomain('post-to-qr',false,dirname(__FILE__).'/languages');
}
add_action('plugin_loaded','pqrc_load_textdomain');

function pqrc_display_qr_code($content){
	$current_post_id = get_the_ID();
	$current_post_title= get_the_title($current_post_id);
	$current_post_link = urlencode(get_the_permalink($current_post_id)); // urlincode use for url pass


	//Current post type check and apply filter START
	$current_post_type = get_post_type($current_post_id);
	// $exclude_post_type= apply_filters('pqrc_exclude_post_type',array());  //Go to functions in themes->alpha 179 line
	// if (in_array($current_post_type,$exclude_post_type)){
	// 	return $content;
	// }
	$exclude_post_type= get_option('pqrc_post_type');
	if($current_post_type == $exclude_post_type){
		return $content;
	}
	//Current post type check and apply filter END

	$width= get_option('pqrc_width');
	$height= get_option('pqrc_height');
	$width = $width ? $width:180;
	$height = $height ? $height:180;
	$dimension = apply_filters('pqrc_chenge_dimension',"{$width}x{$height}"); //Go to functions in themes->alpha 179 line


	$qr_code_image= sprintf('https://api.qrserver.com/v1/create-qr-code/?size=%s&data=%s',$dimension,$current_post_link);
	$content .= sprintf('<div class="img-fluid qrcode"><img src="%s" alt="%s"/></div>',$qr_code_image,$current_post_title);
	return $content;
}
add_filter('the_content','pqrc_display_qr_code',);

function pqrc_setting_init(){
	add_settings_section( 'pqrc_section', __('QR Code Section','post-to-qr'), 'pqrc_popup_section', 'general' );
	add_settings_field('pqrc_width',__('QR Code Width','post-to-qr'),'pqrc_display_width','general','pqrc_section');
	add_settings_field('pqrc_height',__('QR Code height','post-to-qr'),'pqrc_display_height','general','pqrc_section');
	add_settings_field('pqrc_post_type',__('Except Post Type','post-to-qr'),'pqrc_except_post_type','general','pqrc_section');

	register_setting('general','pqrc_width',array('sanitize_callback'=>'esc_attr'));
	register_setting('general','pqrc_height',array('sanitize_callback'=>'esc_attr'));
	register_setting('general','pqrc_post_type',array('sanitize_callback'=>'esc_attr'));
}
function pqrc_popup_section(){
echo '<p>QR code settings </p>';
}
function pqrc_display_width(){
	$width= get_option('pqrc_width');
	printf('<input type="text", id="%s" name="%s" value="%s" />','pqrc_width','pqrc_width',$width);
}
function pqrc_display_height(){
	$height= get_option('pqrc_height');
	printf('<input type="text", id="%s" name="%s" value="%s" />','pqrc_height','pqrc_height',$height);
}
function pqrc_except_post_type(){
	$post_type= get_option('pqrc_post_type');
	$options = array(
		'post',
		'page'
	);
	printf('<select name="%s" id="%s">','pqrc_post_type','pqrc_post_type');
	foreach ($options as $option) {
		$selected = '';
		if($option == $post_type){
			$selected = 'selected';
		}
		printf('<option value="%s" %s >%s</option>',$option,$selected,$option);
	}
	echo '</select>';
	}

add_action('admin_init','pqrc_setting_init');