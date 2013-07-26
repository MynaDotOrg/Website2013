<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Data/SqlDataLayer.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Data/UsersService.php');

abstract class BaseController{
	protected $sqldatalayer;
	protected $usrService;
	
	function __construct(){
		global $wpdb;
		$this->sqldatalayer = new SqlDataLayer($wpdb);
		$this->usrService = new UsersService($this->sqldatalayer);
	}
	
	function populateWithPost ($obj = NULL)
	{
		if(is_object($obj)) {
	
		} else {
			$obj = new StdClass ();
		}
	
		foreach ($_POST as $var => $value) {
			$obj->$var = trim($value);
		}
	
		return $obj;
	}
	
	function redirect($newpage){
		header("Location: ".$newpage);
		die();
	}
	
	function RequestIsPost(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			return true;
		}
		return false;
	}
	
	function ShowErrorMessage($message = ""){
		
	}
	
	function ShowPermissionsError($message = ""){
		$view = new PermissionsErrorView();
		$view->GetView($model);
	}
	
	public function ValidateModel($model){
		$requiredFields = $model->GetRequiredFields();
		foreach ($requiredFields as $field){
			if(false == isset($model->$field) || null == $model->$field || "" == $model->$field){
				return false;
			}
		}
		return true;
	}
	
	public function CreateModelFromPost($model){
		$map = $model->GetPostMap();
		$model = new stdclass();
		foreach($map as $p => $m){
			$model->$m = $eventInfoPost->$p;
		}
		
		return $model;
	}
}


?>
