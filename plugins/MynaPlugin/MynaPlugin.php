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
add_filter('template_include', 'AddMynaPages' );

function SetupMynaAdminPages(){
	add_menu_page('Myna Configuration', 'Myna Configuration', 'read', 'MynaUniqueID', 'MynaAdminPage');
}

function AddMynaPages($template ){
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

function MynaAdminPage(){
	echo '<span>Configure the Myna Plugin</span>';
}




?>