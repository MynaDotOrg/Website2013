<?php
/**
 * The main media template file.
*
* @package Myna
*/
$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/MediaController.php');

get_header();

$controller = new MediaController();
$controller->Actions();

?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>