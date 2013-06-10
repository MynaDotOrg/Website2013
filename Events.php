<?php
/**
 * The main template file.
*
* This is the most generic template file in a WordPress theme
* and one of the two required files for a theme (the other being style.css).
* It is used to display a page when nothing more specific matches a query.
* E.g., it puts together the home page when no home.php file exists.
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package WordPress
* @subpackage Twenty_Eleven
*/
$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/EventsController.php');

get_header();

$controller = new EventsController();
$controller->Actions();

?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>