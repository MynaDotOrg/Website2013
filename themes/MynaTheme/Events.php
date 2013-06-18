<?php
/**
 * The main events template file.
*
* @package Myna
*/
$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/EventsController.php');

get_header();

$controller = new EventsController();
$controller->Actions();

?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>