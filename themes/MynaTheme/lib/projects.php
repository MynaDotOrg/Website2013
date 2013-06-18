<?php

	function post_type_portfolios() {
		$labels = array(
	    	'name' => _x('Projects', 'post type general name'),
	    	'singular_name' => _x('Portfolio', 'post type singular name'),
	    	'add_new' => _x('Add New Project', 'book'),
	    	'add_new_item' => __('Add New Project'),
	    	'edit_item' => __('Edit Project'),
	    	'new_item' => __('New Project'),
	    	'view_item' => __('View Project'),
	    	'search_items' => __('Search Projects'),
	    	'not_found' =>  __('No Project found'),
	    	'not_found_in_trash' => __('No Projects found in Trash'), 
	    	'parent_item_colon' => ''
		);		
		$args = array(
	    	'labels' => $labels,
	    	'public' => true,
	    	'publicly_queryable' => true,
	    	'show_ui' => true, 
	    	'query_var' => true,
	    	'rewrite' => true,
	    	'capability_type' => 'post',
	    	'hierarchical' => false,
	    	'menu_position' => null,
	    	'supports' => array('title','editor', 'thumbnail'),
	    	'menu_icon' => get_stylesheet_directory_uri().'/functions/images/sign.png'
		); 		

		register_post_type( 'project', $args );
		
	  	$labels = array(			  
	  	  'name' => _x( 'Sets', 'taxonomy general name' ),
	  	  'singular_name' => _x( 'Set', 'taxonomy singular name' ),
	  	  'search_items' =>  __( 'Search Sets' ),
	  	  'all_items' => __( 'All Sets' ),
	  	  'parent_item' => __( 'Parent Set' ),
	  	  'parent_item_colon' => __( 'Parent Set:' ),
	  	  'edit_item' => __( 'Edit Set' ), 
	  	  'update_item' => __( 'Update Set' ),
	  	  'add_new_item' => __( 'Add New Set' ),
	  	  'new_item_name' => __( 'New Set Name' ),
	  	); 							  
	  	
	  	register_taxonomy(
			'portfoliosets',
			'project',
			array(
				'public'=>true,
				'hierarchical' => true,
				'labels'=> $labels,
				'query_var' => 'portfoliosets',
				'show_ui' => true,
				'rewrite' => array( 'slug' => 'portfoliosets', 'with_front' => false ),
			)
		);					  
	} 
									  
	add_action('init', 'post_type_portfolios');

?>