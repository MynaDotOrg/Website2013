<?php
	
	// blog sidebaar
	if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Blog Sidebar',
		'id' => 'blog',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
	
	// page sidebaar
	if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Pages Sidebar',
		'id' => 'pages',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
	
	// footer sidebar
	if ( function_exists('register_sidebar') )
    register_sidebar(array(
	    'name' => 'Footer Spot One',
		'id' => 'footer-one',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

    // footer sidebar
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Footer Spot Two',
        'id' => 'footer-two',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

    // footer sidebar
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Footer Spot Three',
        'id' => 'footer-three',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

    // footer sidebar
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Footer Spot Four',
        'id' => 'footer-four',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));

    // footer sidebar
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Forum Sidebar',
        'id' => 'forum',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>',
    ));
	
?>