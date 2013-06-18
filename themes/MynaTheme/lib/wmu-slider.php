<?php

	// slideshow
	add_action('init', 'create_wmu_slider');
	function create_wmu_slider() {
    	$wmu_sliderArgs = array(
        	'label' => __('wmu Slider'),
        	'singular_label' => __('Image'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => get_stylesheet_directory_uri().'/functions/images/screen.png'
        );
    	register_post_type('wmu_sldr',$wmu_sliderArgs);
	}	

?>