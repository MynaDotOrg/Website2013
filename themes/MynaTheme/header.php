<?php $wpcrown_theme_version = '1.0'; ?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US" <?php language_attributes(); ?>>

<head>

<meta charset="UTF-8" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="<?php echo get_option('wpcrown_seo_meta_key'); ?>" />
<meta name="description" content="<?php echo get_option('wpcrown_seo_meta_desc'); ?>" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<title><?php
/*
	* Print the <title> tag based on what is being viewed.
*/
global $page, $paged;

wp_title( '|', true, 'right' );

// Add the blog name.
bloginfo( 'name' );

// Add the blog description for the home/front page.
$site_description = get_bloginfo( 'description', 'display' );
if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

// Add a page number if necessary:
if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'agrg' ), max( $paged, $page ) );

?></title>


<?php if (get_option('wpcrown_favicon')) : ?>
<link rel="shortcut icon" href="<?php echo get_option('wpcrown_favicon'); ?>" type="image/x-icon" />
<?php endif; ?>

<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!-- mobile setting -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<!-- jquery -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.js'></script>

<?php wp_head(); ?>

<!-- fancy box -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

<!-- easing -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js'></script>

<!-- Tabs -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.tools.min.js"></script>

<!-- wmuSlider -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.min.js"></script>

<!-- custom script -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/scripts.js'></script>

<!-- quote rotator -->
<script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.quovolver.js'></script>

<!-- FlexSlider -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>

<!-- Twitter -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/twitter.js"></script>

<!-- isotope  -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.isotope.min.js"></script>

<!-- Google map -->
<script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
	
<!-- add css stylesheets -->	
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/grid.css" type="text/css" media="screen"/>

	<?php $skin = get_option('wpcrown_skin'); 
	
	if(empty($skin))

		{?>
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin.css" type="text/css" media="screen"/>
		<?php } ?>


			
		<?php if($skin == "Argyle") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-argyle.css" type="text/css" media="screen"/>
			
		<?php elseif($skin == "Brown") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-brown.css" type="text/css" media="screen"/>

		<?php elseif($skin == "Dark Denim") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-dark-denim.css" type="text/css" media="screen"/>

		<?php elseif($skin == "Green") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-green.css" type="text/css" media="screen"/>

		<?php elseif($skin == "Mosaic") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-mosaic.css" type="text/css" media="screen"/>

		<?php elseif($skin == "Orange") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-orange.css" type="text/css" media="screen"/>

		<?php elseif($skin == "Pink") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-pink.css" type="text/css" media="screen"/>

		<?php elseif($skin == "Pixelated") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-pixelated.css" type="text/css" media="screen"/>

		<?php elseif($skin == "Red") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-red.css" type="text/css" media="screen"/>
			
		<?php elseif($skin == "Woody") : ?>
		
			<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/skin-woody.css" type="text/css" media="screen"/>	

		<?php elseif($skin == "none") : ?>	
			
	<?php endif; ?>


<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/wmuslider.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

<!-- google webfont font replacement -->
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css' />

<?php 
			
	$wpcrown_custom_template = get_option('wpcrown_custom_template');
			
	if(!empty($wpcrown_custom_template))
		{
				
?>
<style type="text/css">
	<?php
		$wpcrown_bg_color = get_option('wpcrown_bg');
			
		if(!empty($wpcrown_bg_color))
		{
		?>
		body { background-color: <?php echo $wpcrown_bg_color; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_bg_pattern = get_option('wpcrown_bg_pattern');
			
		if($wpcrown_bg_pattern =! "none")
		{
		?>
		body { background: url(<?php echo get_template_directory_uri(); ?>/images/patterns/<?php echo $wpcrown_bg_pattern; ?>.png); }
		<?php
		} 		
	?>

	<?php
		$wpcrown_own_pattern = get_option('wpcrown_own_pattern');
			
		if(!empty($wpcrown_own_pattern))
		{
		?>
		body { background: url(<?php echo get_template_directory_uri(); ?>/cache/<?php echo get_option('wpcrown_own_pattern'); ?>); }
		<?php
		} 		
	?>

	<?php
		$wpcrown_top_border = get_option('wpcrown_top_border');
			
		if(!empty($wpcrown_top_border))
		{
		?>
		#content { border-top: solid 3px <?php echo $wpcrown_top_border; ?>; }
		<?php
		} 		
	?>

	<?php $wpcrown_main_header_bg_opac = get_option('wpcrown_main_header_bg_opac');
			
	if(!empty($wpcrown_main_header_bg_opac))
		{ ?>

			#main-header { background: transparent url(<?php echo get_template_directory_uri(); ?>/images/patterns/bg-header.png); }
			#header {	background: none; }
			#slideshow_big { background: none; }

		<?php
		} else {	
	?>

		<?php
			$wpcrown_main_header_bg = get_option('wpcrown_main_header_bg');
				
			if(!empty($wpcrown_main_header_bg))
			{
			?>
			#main-header { background: <?php echo $wpcrown_main_header_bg; ?>; }
			#header {	background: none; }
			#slideshow_big { background: none; }
			<?php
			} 		
		?>

		<?php
		} 	
	?>

	<?php
		$page_title_bg = get_option('wpcrown_page_tbg');
			
		if(!empty($page_title_bg))
		{
		?>
		#page-title { background: <?php echo $page_title_bg; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_page_title = get_option('wpcrown_page_title');
			
		if(!empty($wpcrown_page_title))
		{
		?>
		#page-title .container .full h2, #page-title h1, #page-title h2, #page-title h3, #page-title h4, #page-title h5, #page-title h6, #page-title hp { color: <?php echo $wpcrown_page_title; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_main_content_bg = get_option('wpcrown_main_content_bg');
			
		if(!empty($wpcrown_main_content_bg))
		{
		?>
		#main  { background-color: <?php echo $wpcrown_main_content_bg; ?>; }
		.entry-title span { background: <?php echo $wpcrown_main_content_bg; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_footer_bg = get_option('wpcrown_footer_bg');
			
		if(!empty($wpcrown_footer_bg))
		{
		?>
		#footer, #socket, .comment-body, .comment_input .input-textarea, .input-textarea, .contactform textarea, .input-textarea, .bbp-form input, .bbp-form textarea, .bbp-form #bbp_stick_topic, #main h4.trigger, tr th.bbp-topic-title, tr th.bbp-topic-voice-count, tr th.bbp-topic-reply-count, tr th.bbp-topic-freshness, tr th.bbp-reply-author, tr th.bbp-reply-content, tr th.bbp-forum-info, tr th.bbp-forum-topic-count, tr th.bbp-forum-reply-count, tr th.bbp-forum-freshness, tr th.bbp-topic-action { background-color: <?php echo $wpcrown_footer_bg; ?>; }

		div.product #tabs .panel {
			background: <?php echo $wpcrown_footer_bg; ?>;
		}

		div.product #tabs ul.tabs li.active a {
			background: <?php echo $wpcrown_footer_bg; ?>;
		}

		<?php
		} 		
	?>

	<?php
		$wpcrown_text_color = get_option('wpcrown_text_color');
			
		if(!empty($wpcrown_text_color))
		{
		?>

		body, #main p, #socket p, #footer p, .news-headline, .twitter-headline, .copyright, .pagination span, .error404, .sidebar .widget a, .sidebar .news-headline, #search_field_block, #search_field_block:focus, .comment_input .input-textarea, .input-textarea, .bbp-form input, .bbp-form textarea, .bbp-form #bbp_stick_topic, .contactform textarea, ul.lists, .required, ul.tabs li a:hover, ul.tabs li.active a, #filters a, #forum th, #forum td, tr th.bbp-topic-title, tr th.bbp-topic-voice-count, tr th.bbp-topic-reply-count, tr th.bbp-topic-freshness, tr th.bbp-reply-author, tr th.bbp-reply-content, tr th.bbp-forum-info, tr th.bbp-forum-topic-count, tr th.bbp-forum-reply-count, tr th.bbp-forum-freshness, tr th.bbp-topic-action, tr th.bbp-topic-title .odd span, tr th.bbp-topic-voice-count .odd span, tr th.bbp-topic-reply-count .odd span, tr th.bbp-topic-freshness .odd span, tr th.bbp-reply-author .odd span, tr th.bbp-reply-content .odd span, tr th.bbp-forum-info .odd span, tr th.bbp-forum-topic-count .odd span, tr th.bbp-forum-reply-count .odd span, tr th.bbp-forum-freshness .odd span, tr th.bbp-topic-action .odd span, tr td.odd span.bbp-topic-started-by, .content p.bbp-topic-meta span, .content fieldset.bbp-form, #container fieldset.bbp-form, #wrapper fieldset.bbp-form, .sidebar .widget .bbp-logged-in h4 a, .bbp-form input, .bbp-form textarea, .bbp-form #bbp_stick_topic, .news-author, .news-time, .comment_input .input-textarea, .input-textarea, .bbp-form input, .bbp-form textarea, .bbp-form #bbp_stick_topic, .contactform textarea, .team-position, #price-table .pack li.even, #filters a, #forum th, #forum td { color: <?php echo $wpcrown_text_color; ?>; }

		.widget li, .widget .archive li { border-bottom: dotted 1px <?php echo $wpcrown_text_color; ?>; }

		.widget li:first-child { border-top: dotted 1px <?php echo $wpcrown_text_color; ?>; }

		<?php
		} 		
	?>

	<?php
		$wpcrown_headings_color = get_option('wpcrown_headings_color');
			
		if(!empty($wpcrown_headings_color))
		{
		?>
		h1, h2, h3, h4, h5, h6, .column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, #main h1, #main h2, #main h3, #main h4, #main h5, #main h6, #socket h1, #socket h2, #socket h3, #socket h4, #socket h5, #socket h6, #footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6 { color: <?php echo $wpcrown_headings_color; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_entry_title_color = get_option('wpcrown_entry_title_color');
			
		if(!empty($wpcrown_entry_title_color))
		{
		?>
		.entry-title span { color: <?php echo $wpcrown_entry_title_color; ?>; }
		.entry-title { border-bottom: dotted 1px <?php echo $wpcrown_entry_title_color; ?>; }
		.products li strong { color: <?php echo $wpcrown_entry_title_color; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_link_color = get_option('wpcrown_link_color');
			
		if(!empty($wpcrown_link_color))
		{
		?>
		a, .sidebar .widget .tagcloud a, #main a:hover h1, #main a:hover h2, #main a:hover h3, #main a:hover h4, #main a:hover h5, #main a:hover h6, #main h1 a:hover, #main h2 a:hover, #main h3 a:hover, #main h4 a:hover, #main h5 a:hover, #main h6 a:hover, #footer a:hover h1, #footer a:hover h2, #footer a:hover h3, #footer a:hover h4, #footer a:hover h5, #footer a:hover h6, #footer h1 a:hover, #footer h2 a:hover, #footer h3 a:hover, #footer h4 a:hover, #footer h5 a:hover, #footer h6 a:hover, .sidebar .news-link:hover>.news-headline, .sidebar .widget a:hover, .comment-reply-link, #main h4.trigger.active, #main h4.trigger:hover, #main h4.trigger.active:hover, #main h4.trigger.active, #filters a.active_sort, #filters a:hover, .sidebar .widget .bbp-logged-in h4 a:hover, #top .main_menu li ul.sub-menu a:hover, .main_menu li ul.sub-menu li.current_page_item > a, #top .main_menu .menu li ul a:hover, #top .main_menu .menu li ul li.current_page_item > a, .news-author a, .products li .price, .products li, div.product p.price, .stock, .products li strong:hover { color: <?php echo $wpcrown_link_color; ?>; }

		.more a:hover, .button {
			background-color: <?php echo $wpcrown_link_color; ?>;
		}

		.products li a:hover img{ 
			border: 5px solid <?php echo $wpcrown_link_color; ?>; 
		}

		div.product #tabs ul.tabs li.active a {
			color: <?php echo $wpcrown_link_color; ?>;
		}

		.quantity input.minus:hover, .quantity input.plus:hover {
			background: <?php echo $wpcrown_link_color; ?>;
		}

		div.product div.images img:hover {
			border: 1px solid <?php echo $wpcrown_link_color; ?>;
			background-color: <?php echo $wpcrown_link_color; ?>;
		}


		<?php
		} 		
	?>

	<?php
		$wpcrown_link_hover_color = get_option('wpcrown_link_hover_color');
			
		if(!empty($wpcrown_link_hover_color))
		{
		?>
		a:hover, a h1:hover, a h2:hover, a h3:hover, a h4:hover, a h5:hover, a h6:hover, .news-link:hover>.news-headline, #top .main_menu li ul.sub-menu a:hover, .main_menu li ul.sub-menu li.current_page_item > a, #top .main_menu .menu li ul a:hover, #top .main_menu .menu li ul li.current_page_item > a, .comment-reply-link:hover, .news-author a:hover, ul.tabs li a:hover, ul.tabs li.active a, #main h4.trigger.active, #main h4.trigger:hover, #main h4.trigger.active:hover, #filters a.active_sort, #filters a:hover { color: <?php echo $wpcrown_link_hover_color; ?>; }

		.post-image img:hover { border: 5px solid <?php echo $wpcrown_link_hover_color; ?>; }

		.blog-image img:hover { border: 5px solid <?php echo $wpcrown_link_hover_color; ?>; }

		.button:hover, #footer .widget .flickr_images:hover { background-color: <?php echo $wpcrown_link_hover_color; ?>; }

		.input-textarea:focus, .contactform textarea:focus, .input-textarea:focus, .contactform textarea:focus, .bbp-form input:focus, .bbp-form textarea:focus, .input-textarea:focus {	border: 1px solid <?php echo $wpcrown_link_hover_color; ?>; }

		<?php
		} 		
	?>

	<?php
		$wpcrown_main_menu_link_color = get_option('wpcrown_main_menu_link_color');
			
		if(!empty($wpcrown_main_menu_link_color))
		{
		?>
		.main_menu ul li a { color: <?php echo $wpcrown_main_menu_link_color; ?>; }

		<?php
		} 		
	?>

	<?php
		$wpcrown_main_menu_background_color = get_option('wpcrown_main_menu_background_color');
			
		if(!empty($wpcrown_main_menu_background_color))
		{
		?>
		.main_menu .menu li.current_page_item > a, .main_menu .menu li a:hover { 
			background: <?php echo $wpcrown_main_menu_background_color; ?>; url(<?php echo get_template_directory_uri(); ?>/images/patterns/pattern-bg.png); 
			color: #fff; 
		}

		#search_submit_block { background-color: <?php echo $wpcrown_main_menu_background_color; ?>; }

		.input-submit { background-color: <?php echo $wpcrown_main_menu_background_color; ?>; }

		.input-submit:hover { background-color: <?php echo $wpcrown_main_menu_background_color; ?>; }

		<?php
		} 		
	?>

	<?php
		$wpcrown_main_button_background_color = get_option('wpcrown_main_button_background_color');
			
		if(!empty($wpcrown_main_button_background_color))
		{
		?>
		.input-submit { background-color: <?php echo $wpcrown_main_button_background_color; ?>; }

		a.button, .button-alt, button.button, .cart .button, #review_form #submit, a.checkout-button, input.button, .price_slider_amount .button, span.onsale {
			background-color: <?php echo $wpcrown_main_button_background_color; ?>; 
			background-image: url(<?php echo get_template_directory_uri(); ?>/images/patterns/pattern-bg.png);
		}

		<?php
		} 		
	?>

	<?php
		$wpcrown_main_button_hover_background_color = get_option('wpcrown_main_button_hover_background_color');
			
		if(!empty($wpcrown_main_button_hover_background_color))
		{
		?>

		a.button:hover, .button-alt:hover, button.button:hover, input.button:hover, #review_form #submit:hover, a.checkout-button:hover {
			background-color: <?php echo $wpcrown_main_button_hover_background_color; ?> 
			background-image: url(<?php echo get_template_directory_uri(); ?>/images/patterns/pattern-bg.png);
		}

		<?php
		} 		
	?>

	<?php
		$wpcrown_img_bg_color = get_option('wpcrown_img_bg_color');
			
		if(!empty($wpcrown_img_bg_color))
		{
		?>
		.post-image img, .blog-image img, #footer .widget .flickr_images, .portfolio-image img, .portfolio-image, .team-image img { background-color: <?php echo $wpcrown_img_bg_color; ?>; border-color: <?php echo $wpcrown_img_bg_color; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_widget_title_color = get_option('wpcrown_widget_title_color');
			
		if(!empty($wpcrown_widget_title_color))
		{
		?>
		.widget-title { color: <?php echo $wpcrown_widget_title_color; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_widget_title_bg_color = get_option('wpcrown_widget_title_bg_color');
			
		if(!empty($wpcrown_widget_title_bg_color))
		{
		?>
		.widget-title, #search_block, ul.tabs { background-color: <?php echo $wpcrown_widget_title_bg_color; ?>; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_widget_content_bg_color = get_option('wpcrown_widget_content_bg_color');
			
		if(!empty($wpcrown_widget_content_bg_color))
		{
		?>
		.widget-content, .widget ul, .widget-quote, .textwidget, .tagcloud, .panes, .widget div.price_slider_wrapper { background-color: <?php echo $wpcrown_widget_content_bg_color; ?>; }
		<?php
		} 		
	?>


	<?php $partners_bg = get_option('wpcrown_partners_bg'); 
	
	if(empty($partners_bg))

		{ ?>

			.partner-arrow { background: url(<?php echo get_template_directory_uri(); ?>/images/partners.png) no-repeat top right; }

		<?php } ?>
			
		<?php if($partners_bg == "Blue") : ?>
		
			.partner-arrow { background: url(<?php echo get_template_directory_uri(); ?>/images/partners.png) no-repeat top right; }
			
		<?php elseif($partners_bg == "Brown") : ?>
		
			.partner-arrow { background: url(<?php echo get_template_directory_uri(); ?>/images/partners-brown.png) no-repeat top right; }

		<?php elseif($partners_bg == "Green") : ?>
		
			.partner-arrow { background: url(<?php echo get_template_directory_uri(); ?>/images/partners-green.png) no-repeat top right; }

		<?php elseif($partners_bg == "Red") : ?>
		
			.partner-arrow { background: url(<?php echo get_template_directory_uri(); ?>/images/partners-red.png) no-repeat top right; }
			
	<?php endif; ?>


	.sidebar .widget .bbp-logged-in a {
		color: #eee;
	} 

	.sidebar .widget .bbp-logged-in a:hover {
		color: #fff;
	} 

	#main .partner-arrow h3 {
		color: #eee;
	}

</style>

<?php }	?>

<style type="text/css">
	<?php
		$wpcrown_body_font_size = get_option('wpcrown_body_font_size');
			
		if(!empty($wpcrown_body_font_size))
		{
		?>
		html, body, div, span, applet, object, iframe, .news-author, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video { font-size: <?php echo $wpcrown_body_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_entry_title_font_size = get_option('wpcrown_entry_title_font_size');
			
		if(!empty($wpcrown_entry_title_font_size))
		{
		?>
		.entry-title span { font-size: <?php echo $wpcrown_entry_title_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h1_font_size = get_option('wpcrown_h1_font_size');
			
		if(!empty($wpcrown_h1_font_size))
		{
		?>
		h1 { font-size: <?php echo $wpcrown_h1_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h2_font_size = get_option('wpcrown_h2_font_size');
			
		if(!empty($wpcrown_h2_font_size))
		{
		?>
		h2 { font-size: <?php echo $wpcrown_h2_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h3_font_size = get_option('wpcrown_h3_font_size');
			
		if(!empty($wpcrown_h3_font_size))
		{
		?>
		h3 { font-size: <?php echo $wpcrown_h3_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h14_font_size = get_option('wpcrown_h4_font_size');
			
		if(!empty($wpcrown_h4_font_size))
		{
		?>
		h4 { font-size: <?php echo $wpcrown_h4_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h5_font_size = get_option('wpcrown_h5_font_size');
			
		if(!empty($wpcrown_h5_font_size))
		{
		?>
		h5 { font-size: <?php echo $wpcrown_h5_font_size; ?>px; }
		<?php
		} 		
	?>

	<?php
		$wpcrown_h6_font_size = get_option('wpcrown_h6_font_size');
			
		if(!empty($wpcrown_h6_font_size))
		{
		?>
		h6 { font-size: <?php echo $wpcrown_h6_font_size; ?>px; }
		<?php
		} 		
	?>
</style>

<?php $header_font = get_option('wpcrown_header_font'); 
	
if(empty($header_font))

{ ?>

	<style type="text/css">
	
		h1, h2, h3, h4, h5, h6 { font-family: 'PT Sans', sans-serif; }
			
	</style>

	<?php } ?>
			
	<?php if($header_font == "Prosto One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Prosto+One&subset=latin,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a,h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Prosto One', cursive; }
				
		</style>
			
	<?php elseif($header_font == "PT Sans") : ?>
		
		<style type="text/css">
	
			h1, h2, h3, h4, h5, h6 { font-family: 'PT Sans', sans-serif; }
				
		</style>

	<?php elseif($header_font == "Economica") : ?>

		<link href='http://fonts.googleapis.com/css?family=Economica:400,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Economica', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Seaweed Script") : ?>

		<link href='http://fonts.googleapis.com/css?family=Seaweed+Script&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Seaweed Script', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Poiret One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Poiret+One&subset=latin,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Poiret One', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Cantata One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Cantata+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Cantata One', serif; }
				
		</style>
		
	<?php elseif($header_font == "Cutive") : ?>

		<link href='http://fonts.googleapis.com/css?family=Cutive&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Cutive', serif; }
				
		</style>
		
	<?php elseif($header_font == "Simonetta") : ?>

		<link href='http://fonts.googleapis.com/css?family=Simonetta:400,400italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Simonetta', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Advent Pro") : ?>

		<link href='http://fonts.googleapis.com/css?family=Advent+Pro&subset=latin,greek,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Advent Pro', sans-serif; }
				
		</style>	
		
	<?php elseif($header_font == "Glass Antiqua") : ?>

		<link href='http://fonts.googleapis.com/css?family=Glass+Antiqua&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Glass Antiqua', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Voces") : ?>

		<link href='http://fonts.googleapis.com/css?family=Voces&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Voces', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Krona One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Krona+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Krona One', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Doppio One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Doppio+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Doppio One', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Sevillana") : ?>

		<link href='http://fonts.googleapis.com/css?family=Sevillana&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Sevillana', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Share") : ?>

		<link href='http://fonts.googleapis.com/css?family=Share:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Share', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Fascinate") : ?>

		<link href='http://fonts.googleapis.com/css?family=Fascinate' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Fascinate', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Righteous") : ?>

		<link href='http://fonts.googleapis.com/css?family=Righteous&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Righteous', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Ruthie") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ruthie&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Ruthie', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Ceviche One") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ceviche+One' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Ceviche One', cursive; }
				
		</style>	
		
	<?php elseif($header_font == "Almendra SC") : ?>

		<link href='http://fonts.googleapis.com/css?family=Almendra+SC' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Almendra SC', serif; }
				
		</style>		
		
	<?php elseif($header_font == "Fresca") : ?>

		<link href='http://fonts.googleapis.com/css?family=Fresca&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Fresca', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Voltaire") : ?>

		<link href='http://fonts.googleapis.com/css?family=Voltaire' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Voltaire', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Ewert") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ewert&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Ewert', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Exo") : ?>

		<link href='http://fonts.googleapis.com/css?family=Exo&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Exo', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Allura") : ?>

		<link href='http://fonts.googleapis.com/css?family=Allura&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Allura', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Norican") : ?>

		<link href='http://fonts.googleapis.com/css?family=Norican&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Norican', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Armata") : ?>

		<link href='http://fonts.googleapis.com/css?family=Armata&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Armata', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Shojumaru") : ?>

		<link href='http://fonts.googleapis.com/css?family=Shojumaru&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Shojumaru', cursive; }
				
		</style>		
		
	<?php elseif($header_font == "Metamorphous") : ?>

		<link href='http://fonts.googleapis.com/css?family=Metamorphous&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Metamorphous', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Noticia Text") : ?>

		<link href='http://fonts.googleapis.com/css?family=Noticia+Text:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Noticia Text', serif; }
				
		</style>
		
	<?php elseif($header_font == "Creepster") : ?>

		<link href='http://fonts.googleapis.com/css?family=Creepster' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Creepster', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Glegoo") : ?>

		<link href='http://fonts.googleapis.com/css?family=Glegoo&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Glegoo', serif; }
				
		</style>	
		
	<?php elseif($header_font == "Iceberg") : ?>

		<link href='http://fonts.googleapis.com/css?family=Iceberg' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Iceberg', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Gudea") : ?>

		<link href='http://fonts.googleapis.com/css?family=Gudea:400,700,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Gudea', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Port Lligat Slab") : ?>

		<link href='http://fonts.googleapis.com/css?family=Port+Lligat+Slab' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Port Lligat Slab', serif; }
				
		</style>
		
	<?php elseif($header_font == "Galdeano") : ?>

		<link href='http://fonts.googleapis.com/css?family=Galdeano' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Galdeano', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Galdeano") : ?>

		<link href='http://fonts.googleapis.com/css?family=Galdeano' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Galdeano', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Overlock SC") : ?>

		<link href='http://fonts.googleapis.com/css?family=Overlock+SC&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Overlock SC', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Italianno") : ?>

		<link href='http://fonts.googleapis.com/css?family=Italianno&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Italianno', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Inika") : ?>

		<link href='http://fonts.googleapis.com/css?family=Inika:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Inika', serif; }
				
		</style>
		
	<?php elseif($header_font == "Felipa") : ?>

		<link href='http://fonts.googleapis.com/css?family=Felipa&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Felipa', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Ropa Sans") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans:400,400italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Ropa Sans', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Geo") : ?>

		<link href='http://fonts.googleapis.com/css?family=Geo' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Geo', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Open Sans Condensed") : ?>

		<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700,300italic&subset=latin,greek,cyrillic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Open Sans Condensed', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Convergence") : ?>

		<link href='http://fonts.googleapis.com/css?family=Convergence' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Convergence', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Montserrat") : ?>

		<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Montserrat', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Amatic SC") : ?>

		<link href='http://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Amatic SC', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Maven Pro") : ?>

		<link href='http://fonts.googleapis.com/css?family=Maven+Pro' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Maven Pro', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Lato") : ?>

		<link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Lato', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Ubuntu Condensed") : ?>

		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed&subset=latin,greek,cyrillic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Ubuntu Condensed', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Nova Mono") : ?>

		<link href='http://fonts.googleapis.com/css?family=Nova+Mono&subset=latin,greek' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Nova Mono', cursive; }
				
		</style>
		
	<?php elseif($header_font == "Droid Sans") : ?>

		<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Droid Sans', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Droid Sans Mono") : ?>

		<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Droid Sans Mono', sans-serif; }
				
		</style>
		
	<?php elseif($header_font == "Droid Serif") : ?>

		<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
		
		<style type="text/css">
	
			.column_container h1, .column_container h1 a, .column_container h2, .column_container h2 a, .column_container h3, .column_container h3 a, .column_container h4, .column_container h4 a, .column_container h5, .column_container h5 a, .column_container h6, .column_container h6 a, h1, h2, h3, h4, h5, h6, .entry-title span { font-family: 'Droid Serif', serif; }
				
		</style>																																															
	
<?php endif; ?>

<?php
	/*
    	Setup Google Analytic Code
    	*/
    	include (TEMPLATEPATH . "/google-analytic.php");
?>

<style type="text/css">
	
	<?php
		$wpcrown_custom_css = get_option('wpcrown_custom_css');
				
		if(!empty($wpcrown_custom_css))
		{
			echo $wpcrown_custom_css;
		} 		
	?>
</style>

</head>

<?php $wpcrown_theme_layout = get_option('wpcrown_theme_layout'); ?>

<body id="top" class="<?php echo $wpcrown_theme_layout ?>" <?php body_class( $class ); ?> >

	<div id="content">
	
		<!-- Main Header -->
		<div id="main-header">
		
			<!-- Tob Bar Container -->
			<div class="container_wrap" id="top-bar">
				<div class="container">
					<div class="five columns alignleft">
						<ul class="social_bookmarks">
							<?php
								$wpcrown_sm_facebook = get_option('wpcrown_sm_facebook');
														
								if(!empty($wpcrown_sm_facebook))
								{
								?>
								<li class="facebook"><a href="<?php echo $wpcrown_sm_facebook; ?>">Join our Facebook Group</a></li>
								<?php
								} 		
							?>
							<?php
								$wpcrown_sm_twitter = get_option('wpcrown_sm_twitter');
														
								if(!empty($wpcrown_sm_twitter))
								{
								?>
								<li class="twitter"><a href="<?php echo $wpcrown_sm_twitter; ?>">Follow us on Twitter</a></li>
								<?php
								} 		
							?>
							<?php
								$wpcrown_sm_dribbble = get_option('wpcrown_sm_dribbble');
														
								if(!empty($wpcrown_sm_dribbble))
								{
								?>
								<li class="dribbble"><a href="<?php echo $wpcrown_sm_dribbble; ?>">Follow us on dribbble</a></li>
								<?php
								} 		
							?>
							<?php
								$wpcrown_sm_forrst = get_option('wpcrown_sm_forrst');
														
								if(!empty($wpcrown_sm_forrst))
								{
								?>
								<li class="forrst"><a href="<?php echo $wpcrown_sm_forrst; ?>">Follow us on Forrst</a></li>
								<?php
								} 		
							?>
							<?php
								$wpcrown_sm_flickr = get_option('wpcrown_sm_flickr');
														
								if(!empty($wpcrown_sm_flickr))
								{
								?>
								<li class="flickr"><a href="<?php echo $wpcrown_sm_flickr; ?>">Flickr</a></li>
								<?php
								} 		
							?>
							<?php
								$wpcrown_sm_vimeo = get_option('wpcrown_sm_vimeo');
														
								if(!empty($wpcrown_sm_vimeo))
								{
								?>
								<li class="vimeo"><a href="<?php echo $wpcrown_sm_vimeo; ?>">Follow us on Vimeo</a></li>
								<?php
								} 		
							?>
							<?php
								$wpcrown_sm_diig = get_option('wpcrown_sm_diig');
														
								if(!empty($wpcrown_sm_diig))
								{
								?>
								<li class="diig"><a href="<?php echo $wpcrown_sm_diig; ?>">Follow us on Diig</a></li>
								<?php
								} 		
							?>
							<?php
								$wpcrown_sm_tumblr = get_option('wpcrown_sm_tumblr');
														
								if(!empty($wpcrown_sm_tumblr))
								{
								?>
								<li class="tumblr"><a href="<?php echo $wpcrown_sm_tumblr; ?>">Follow us on Tumblr</a></li>
								<?php
								} 		
							?>
						</ul>
					</div>
					<div class="seven columns alignright">
						<div class="top-info">
							<?php
								$wpcrown_sm_phone_number = get_option('wpcrown_sm_phone_number');
														
								if(!empty($wpcrown_sm_phone_number))
								{
								?>
								<span class="tel"><?php echo $wpcrown_sm_phone_number; ?></span>
								<?php
								} 		
							?>
							<?php
								$wpcrown_sm_email_address = get_option('wpcrown_sm_email_address');
														
								if(!empty($wpcrown_sm_email_address))
								{
								?>
								<span class="email"><?php echo $wpcrown_sm_email_address; ?></span>
								<?php
								} 		
							?>
						</div>
					</div>
				</div>
			</div>
			<!-- End Tob Bar Container -->
			
			<!-- Head Container -->
			<div class="container_wrap" id="header">
				<div class="container">
					<h1 class="logo bg-logo">
						<a href="<?php echo home_url(); ?>">
							<?php if (get_option('wpcrown_logo')) { ?>
								<img src="<?php echo get_template_directory_uri(); ?>/cache/<?php echo get_option('wpcrown_logo'); ?>" alt="Logo" />
							<?php } else { ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Logo" />
							<?php } ?>
						</a>
					</h1>
					<div class="main_menu">
						<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'menu_class' => 'menu')); ?>
					</div>
				</div>
			</div>
			<!-- End Head Container -->