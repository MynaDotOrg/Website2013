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

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Utility/Utility.php');

add_action('admin_menu', 'SetupMynaAdminPages');
add_filter('template_include', 'AddMynaPages' );

function SetupMynaAdminPages(){
	add_menu_page('Myna Configuration', 'Myna Configuration', 'read', 'MynaUniqueID', 'MynaAdminPage');
}

function AddMynaPages($template ){
	global $post; 
 
	if(true == Utility::endswith($post->guid,'/?page_id=EventPage')) 
	{
		return get_stylesheet_directory().'/Events.php';
	}
	else if(true == Utility::endswith($post->guid,'/?page_id=AjaxPage'))
	{
		return get_stylesheet_directory().'/Ajax.php';
	}
	else if(Utility::endswith($post->guid,'/?page_id=MediaPage'))
	{
		return get_stylesheet_directory().'/Media.php';
	}
	return $template;
}

function MynaAdminPage(){
	echo '<span>Configure the Myna Plugin</span>';
}




?>