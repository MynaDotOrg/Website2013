<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Models/BaseModel.php');

class UserInfoModel extends BaseModel{
	public $Info;
	public $EventDates;
	public $ErrorSavingInfo = false;
}

?>