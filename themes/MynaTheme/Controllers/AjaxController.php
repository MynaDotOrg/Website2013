<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/BaseController.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Models/AjaxModels.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Views/AjaxViews.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Utility/Utility.php');

class AjaxController extends BaseController{

	public function Actions(){

	}
	
}
?>