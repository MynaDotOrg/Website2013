<?php
$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/AjaxController.php');

$controller = new AjaxController();
$controller->Actions();

?>