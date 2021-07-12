<?php
/*
Plugin Name: A and Z Slider by Shortcode
Plgin URL: https://mannaf.me/plugin/slider/
Description: All the_content Word Count
Version: 1.0
Author: Mannaf
Author URL: https://mannaf.me/auth/slider
License: GPLv2 or Later
Text Domain: a-z-slider
Domain Path: /languages/
 */



function anzs_textdomain()
{
	load_plugin_textdomain('anzs', false, plugin_dir_url(__FILE__) . "/languages");
}
add_action('plugin_loaded', 'anzs_textdomain');

function anzs_assets()
{
	wp_enqueue_style('anzs-main-css', plugin_dir_url(__FILE__) . "/assets/css/style.css");
	wp_enqueue_style('anzs-cuys-css', plugin_dir_url(__FILE__) . "assets/css/owl.carousel.min.css");
	wp_enqueue_script('anzs-slider-js', plugin_dir_url(__FILE__) . "/assets/js/owl.carousel.min.js", null, "1.0", true);
	wp_enqueue_script('anzs-custom-js', plugin_dir_url(__FILE__) . "/assets/js/main.js", array('jquery'), "1.0", true);

	//	wp_enqueue_style('anzs-main-css',"//cdnjs.cloudflare.com/ajax/libs/anzs-slider/2.9.3/anzs-slider.css");
	//	wp_enqueue_script('anzs-slider-js',"//cdnjs.cloudflare.com/ajax/libs/anzs-slider/2.9.2/min/anzs-slider.js",null,"1.0");
	//	wp_enqueue_script('anzs-custom-js',plugin_dir_url(__FILE__)."/assets/js/anzs-custom.js",array('jquery'),"1.0",true);
}
add_action('wp_enqueue_scripts', 'anzs_assets');
function anzs_shorcode_tslider($attr, $content)
{
	$default = array(
		'width' => 800,
		'height' => 600,
		'id' => 'kkkk',
		'item'=>'1',
		'sm'=>'1',
		'md'=>'3',
		'lg'=>'4',
	);
	$attributes = shortcode_atts($default, $attr);
	$content = do_shortcode($content);
//	$item= $attributes['item']??1;
	$data = array(
		'item'=>$attributes['item'],
		'sm'=>$attributes['sm'],
		'md'=>$attributes['md'],
		'lg'=>$attributes['lg'],
	);
	wp_localize_script('anzs-custom-js','item',$data);
	$shorcode_output = <<<EOD
	<div class="my-slider" style="width: {$attributes['width']}; height: {$attributes['height']};" id="{$attributes['id']}">
	<div class="owl-carousel  owl-theme">{$content}</div>
	</div>
EOD;
	return $shorcode_output;
}
add_shortcode('slider', 'anzs_shorcode_tslider');

function anzs_shorcode_tslide($attr)
{
	$default = array(
		'caption' => 'Image Caption',
		'id' => '',
		'size' => 'large',
		'class' => 'img-fluid',
		'url'=>'#'
	);
	$attributes = shortcode_atts($default, $attr);
	$image_src = wp_get_attachment_image_src($attributes['id'], $attributes['size']);
	$shorcode_output = <<<EOD
<div class="slide">
<p><a href="{$attributes['url']}"><img class="{$attributes['class']}" src="{$image_src[0]}" alt="{$attributes['caption']}"></a></p>
<p>{$attributes['caption']}</p>
</div>
EOD;
	return $shorcode_output;
}
add_shortcode('slide', 'anzs_shorcode_tslide');


/**
 * NOTE: [slider item=1 ][slide caption="Slide 1 url="#" id=351][slide caption="Slide 2" id=352][slide caption="Slide 3" id=353][/slider]
 */