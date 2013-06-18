<?php

	// slideshow
	add_action('init', 'create_flex_slider');
	function create_flex_slider() {
    	$flex_sliderArgs = array(
        	'label' => __('Flex Slider'),
        	'singular_label' => __('Image'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => get_stylesheet_directory_uri().'/functions/images/screen.png'
        );
    	register_post_type('flex_sldr',$flex_sliderArgs);
	}	

?>