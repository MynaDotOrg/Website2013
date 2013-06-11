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

add_action('admin_menu', 'SetupMynaEventPages');
add_filter('template_include', 'AddMynaEventPages' );

function SetupMynaEventPages(){
	add_theme_page('Myna Events', 'Events and Camps', 'read', 'MynaEventUniqueID', 'MynaEventsPage');
}

function AddMynaEventPages($template ){
	global $post; 
 
	if($post->guid == 'http://108.166.98.208/?page_id=11') 
	{
		return get_stylesheet_directory().'/Events.php';
	}
	return $template;
}

function MynaEventsPage(){
	echo '<span>blahblahblah</span>';
}

function MynaPluginOnActivation(){
	
}


?>