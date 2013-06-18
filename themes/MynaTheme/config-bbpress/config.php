<?php


function bbpress_enabled()
{
	if (class_exists( 'bbPress' )) { return true; }
	return false;
}

//check if the plugin is enabled, otherwise stop the script
if(!bbpress_enabled()) { return false; }


global $config;


//register my own styles
if(!is_admin()){ add_action('bbp_enqueue_scripts', 'bbpress_register_assets',15); }


function bbpress_register_assets()
{
	//bbp_theme_compat_enqueue_css	
	wp_enqueue_style( 'bbpress', get_bloginfo('template_url') . '/css/bbpress.css');
	wp_dequeue_style( 'bbpress-style' );
	
}




//remove forum and single topic summaries at the top of the page
add_filter('bbp_get_single_forum_description', 'bbpress_filter_form_message',10,2 );
add_filter('bbp_get_single_topic_description', 'bbpress_filter_form_message',10,2 );


function bbpress_filter_form_message( $retstr, $args )
{
	return false;
}