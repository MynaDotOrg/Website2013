<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Data/SqlDataLayer.php');

abstract class BaseController{
	protected $sqldatalayer;
	
	function __construct(){
		global $wpdb;
		$this->sqldatalayer = new SqlDataLayer($wpdb);
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
}


?>
