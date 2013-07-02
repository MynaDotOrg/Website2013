<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Models/BaseModel.php');

class EventListModel extends BaseModel{
	public $LatestEvents;
}

class EventInfoModel extends BaseModel{
	public $Info;
}

?>