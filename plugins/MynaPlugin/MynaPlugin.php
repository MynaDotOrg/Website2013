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
require_once($root.'/wp-content/plugins/MynaPlugin/Services/Router.php');

add_action('admin_menu', 'SetupMynaAdminPages');
add_filter('template_include', 'AddMynaPages' );

function SetupMynaAdminPages(){
	add_menu_page('Myna Configuration', 'Myna Configuration', 'read', 'MynaUniqueID', 'MynaAdminPage');
}

function AddMynaPages($template ){
	global $post; 
 
	if(true == Router::UseMynaTemplate($post)) 
	{
		return get_stylesheet_directory().'/MynaTemplate.php';
	}
	else if(true == Router::UseMynaTemplate($post))
	{
		return get_stylesheet_directory().'/MynaAjaxTemplate.php';
	}
	return $template;
}

function MynaAdminPage(){
	echo '<span>Configure the Myna Plugin</span>';
}




?>