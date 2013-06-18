<?php
/**
 * @package MynaPlugin
 */
/*
Plugin Name: MynaPlugin
Plugin URI: http://Myna.org
Description: A event system that manages the events and camps for Myna.
Version: 0.1
Author: Myna DWG
Author URI: http://Myna.org
License: TDB
*/

add_action('admin_menu', 'SetupMynaAdminPages');
add_filter('template_include', 'AddMynaEventPages' );

function SetupMynaEventPages(){
	add_theme_page('Myna Events', 'Events and Camps', 'read', 'MynaEventUniqueID', 'MynaEventsPage');
}

function AddMynaEventPages($template ){
	global $post; 
 
	if($post->guid == 'http://108.166.98.208/?page_id=EventPage') 
	{
		return get_stylesheet_directory().'/Events.php';
	}
	else if($post->guid == 'http://108.166.98.208/?page_id=AjaxPage') 
	{
		return get_stylesheet_directory().'/Ajax.php';
	}
	else if($post->guid == 'http://108.166.98.208/?page_id=MediaPage')
	{
		return get_stylesheet_directory().'/Media.php';
	}
	return $template;
}

function SetupMynaAdminPages(){
	echo '<span>Configure the Myna Plugin</span>';
}




?>