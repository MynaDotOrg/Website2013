<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Utility/Utility.php');

class Router{
	public static function GetController($post){
		$root = $_SERVER["DOCUMENT_ROOT"];
		if(true == Utility::endswith($post->guid,'/?page_id=EventPage')){
			require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/EventsController.php');
			return new EventsController();
		}
		else if(true == Utility::endswith($post->guid,'/?page_id=AjaxPage')){
			require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/AjaxController.php');
			return new AjaxController();
		}
		else if(Utility::endswith($post->guid,'/?page_id=MediaPage')){
			require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/MediaController.php');
			return new MediaController();
		}
		else if(Utility::endswith($post->guid,'/?page_id=AdminPage')){
			require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/AdminControllers.php');
			return new AdminController();
		}
		else if(Utility::endswith($post->guid,'/?page_id=RegistrationPage')){
			require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/RegistrationController.php');
			return new RegistrationController();
		}
	}
	
	public static function UseMynaTemplate($post){
		if(true == Utility::endswith($post->guid,'/?page_id=EventPage')){
			return true;
		}
		else if(Utility::endswith($post->guid,'/?page_id=MediaPage')){
			return true;
		}
		else if(Utility::endswith($post->guid,'/?page_id=RegistrationPage')){
			return true;
		}
		return false;
	}
	
	public static function UseMynaAjaxTemplate($post){
		if(true == Utility::endswith($post->guid,'/?page_id=AjaxPage'))
		{
			return true;
		}
		return false;
	}
}

?>