<?php
/*
	Begin creating admin options
*/

$themename = THEMENAME;
$shortname = SHORTNAME;


$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array(
	0		=> "Choose a category"
);
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

$pages = get_pages(array('parent' => -1));
$wp_pages = array(
	0		=> "Choose a page"
);
foreach ($pages as $page_list ) {
	$template_name = get_post_meta( $page_list->ID, '_wp_page_template', true );
	
	//exclude contact template
	if($template_name != 'contact.php')
	{
       $wp_pages[$page_list->ID] = $page_list->post_title;
    }
}


$api_url = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


$options = array (
 
//Begin admin header
array( 
		"name" => $themename." Options",
		"type" => "title"
),
//End admin header


//Begin first tab "General"
array( 
		"name" => "General",
		"type" => "section",
		"icon" => "gear.png",
)
,

array( "type" => "open"),

array( "name" => "Logo",
	"desc" => "Upload your logo. It will be shown on header. Logo Size: Height 60px; Width auto",
	"id" => $shortname."_logo",
	"type" => "image",
	"std" => "",
),

array( "name" => "Favicon",
	"desc" => "Upload your favicon.",
	"id" => $shortname."_favicon",
	"type" => "image",
	"std" => "",
),

array( "name" => "Google Analytics Domain ID ",
	"desc" => "Get analytics on your site. Enter Google Analytics Domain ID (ex: UA-123456-1)",
	"id" => $shortname."_ga_id",
	"type" => "text",
	"std" => ""

),

array( "name" => "Custom CSS",
	"desc" => "You can add your custom CSS here",
	"id" => $shortname."_custom_css",
	"type" => "textarea",
	"std" => ""

),
	
array( "type" => "close"),
//End first tab "General"

//Begin first tab "Skins"
array( 
		"name" => "Skin-and-Colors",
		"type" => "section",
		"icon" => "color.png",
)
,

array( "type" => "open"),

array( "name" => "Layout",
	"desc" => "Select layout",
	"id" => $shortname."_theme_layout",
	"type" => "select",
	"options" => array(
		'full' => 'Stretched',
		'boxed' => 'Boxed',
	),
	"std" => 'full'
),

array( "name" => "Pre-Made Color Scheme",
	"desc" => "Select color scheme",
	"id" => $shortname."_skin",
	"type" => "select",
	"options" => array(
		'none' => 'none',
		'Argyle' => 'Argyle',
		'Brown' => 'Brown',
		'Dark Denim' => 'Dark Denim',
		'Green' => 'Green',
		'Mosaic' => 'Mosaic',
		'Orange' => 'Orange',
		'Pink' => 'Pink',
		'Pixelated' => 'Pixelated',
		'Red' => 'Red',
		'Woody' => 'Woody',
	),
	"std" => 'none'
),

array( "name" => "Custom Skin and Colors",
	"desc" => "Select if you want to create your custom skin with custom colors",
	"id" => $shortname."_custom_template",
	"type" => "iphone_checkboxes",
	"std" => 1
),

array( "name" => "Background Color",
	"desc" => "Select color for the background (default #ffffff)",
	"id" => $shortname."_bg",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#ffffff"

),

array( "name" => "Background Patterns",
	"desc" => "Select background pattern",
	"id" => $shortname."_bg_pattern",
	"type" => "select",
	"options" => array(
		'none' => 'none',
		'argyle' => 'argyle',
		'beige_paper' => 'beige_paper',
		'bgnoise_lg' => 'bgnoise_lg',
		'black_linen_v2' => 'black_linen_v2',
		'bright_squares' => 'bright_squares',
		'classy_fabric' => 'classy_fabric',
		'crossed_stripes' => 'crossed_stripes',
		'crosses' => 'crosses',
		'dark_mosaic' => 'dark_mosaic',
		'dark_wood' => 'dark_wood',
		'darkdenim3' => 'darkdenim3',
		'fabric_plaid' => 'fabric_plaid',
		'fake_brick' => 'fake_brick',
		'farmer' => 'farmer',
		'groovepaper' => 'groovepaper',
		'little_pluses' => 'little_pluses',
		'plaid' => 'plaid',
		'project_papper' => 'project_papper',
		'px_by_Gre3g' => 'px_by_Gre3g',
		'random_grey_variations' => 'random_grey_variations',
		'roughcloth' => 'roughcloth',
		'soft_kill' => 'soft_kill',
		'subtle_freckles' => 'subtle_freckles',
		'tactile_noise' => 'tactile_noise',
		'texturetastic_gray' => 'texturetastic_gray',
		'white_paperboard' => 'white_paperboard',
		'white_plaster' => 'white_plaster',
		'xv' => 'xv',
		'zigzag' => 'zigzag',
	),
	"std" => 'none'
),

array( "name" => "Upload Your Own Pattern",
	"desc" => "Upload your own puttern.",
	"id" => $shortname."_own_pattern",
	"type" => "image",
	"std" => "",
),

array( "name" => "Top Border Color",
	"desc" => "Select color for top border (default #db3d93)",
	"id" => $shortname."_top_border",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#db3d93"

),

array( "name" => "Main Header Transparent Background",
	"desc" => "Select if you want to have main header background transparent",
	"id" => $shortname."_main_header_bg_opac",
	"type" => "iphone_checkboxes",
	"std" => 1
),

array( "name" => "Main Header Background Color",
	"desc" => "Select color for main header background (default ffffff)",
	"id" => $shortname."_main_header_bg",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#ffffff"

),

array( "name" => "Main Content Background Color",
	"desc" => "Select color for main content (default #ffffff)",
	"id" => $shortname."_main_content_bg",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#ffffff"

),

array( "name" => "Footer Background Color",
	"desc" => "Select color for footer (default #eeeeee)",
	"id" => $shortname."_footer_bg",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#eeeeee"

),

array( "name" => "Page Title Color",
	"desc" => "Select color for page title (default 9e9e9e)",
	"id" => $shortname."_page_title",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#9e9e9e"

),

array( "name" => "Page Title Background Color",
	"desc" => "Select color for page title background (default #eeeeee)",
	"id" => $shortname."_page_tbg",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#eeeeee"

),

array( "name" => "Text Color",
	"desc" => "Select color for text (default #484848)",
	"id" => $shortname."_text_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#484848"

),

array( "name" => "Headings Text Color",
	"desc" => "Select color for headings (default #484848)",
	"id" => $shortname."_headings_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#484848"

),

array( "name" => "Entry Title Color",
	"desc" => "Select color for entry title (default #484848)",
	"id" => $shortname."_entry_title_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#484848"

),

array( "name" => "Link Color",
	"desc" => "Select color for link (default db3d93)",
	"id" => $shortname."_link_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#db3d93"

),

array( "name" => "Link Hover Color",
	"desc" => "Select color for link hover state (default ed50a6)",
	"id" => $shortname."_link_hover_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#ed50a6"

),

array( "name" => "Main Menu Link Color",
	"desc" => "Select color for main menu link (default 484848)",
	"id" => $shortname."_main_menu_link_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#484848"

),

array( "name" => "Main Menu Background Color",
	"desc" => "Select color for main menu background (default 12a4b3)",
	"id" => $shortname."_main_menu_background_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#12a4b3"

),

array( "name" => "Partners Background Pattern",
	"desc" => "Select partners background pattern",
	"id" => $shortname."_partners_bg",
	"type" => "select",
	"options" => array(
		'Blue' => 'Blue',
		'Brown' => 'Brown',
		'Red' => 'Red',
		'Green' => 'Green',
	),
	"std" => 'Blue'
),

array( "name" => "Images Background Color",
	"desc" => "Select color for images roll over background (default eeeeee)",
	"id" => $shortname."_img_bg_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#eeeeee"

),

array( "name" => "Widget Title Color",
	"desc" => "Select color for widget title (default 484848)",
	"id" => $shortname."_widget_title_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#484848"

),

array( "name" => "Widget Title Background Color",
	"desc" => "Select color for widget title background (default e1e1e1)",
	"id" => $shortname."_widget_title_bg_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#e1e1e1"

),

array( "name" => "Widget Content Background Color",
	"desc" => "Select color for widget content background (default eeeeee)",
	"id" => $shortname."_widget_content_bg_color",
	"type" => "colorpicker",
	"size" => "60px",
	"std" => "#eeeeee"

),

array( "type" => "close"),
//End first tab "Skins"

//Begin first tab "Font"
array( 
		"name" => "Font",
		"type" => "section",
		"icon" => "font.png",
)
,

array( "type" => "open"),

array( "name" => "Body Font Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_body_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "14",
	"from" => 14,
	"to" => 24,
	"step" => 1,
),

array( "name" => "Header Font (using Google Webfonts API)",
	"desc" => "Select header fonts (You can view preview of all fonts from <a href='http://www.google.com/webfonts'>Google web fonts</a>)",
	"id" => $shortname."_header_font",
	"type" => "select",
	"options" => array(
		'PT Sans' => 'PT Sans',
		'Prosto One' => 'Prosto One',
		'Economica' => 'Economica',
		'Seaweed Script' => 'Seaweed Script',
		'Poiret One' => 'Poiret One',
		'Cantata One' => 'Cantata One',
		'Cutive' => 'Cutive',
		'Simonetta' => 'Simonetta',
		'Advent Pro' => 'Advent Pro',
		'Glass Antiqua' => 'Glass Antiqua',
		'Voces' => 'Voces',
		'Krona One' => 'Krona One',
		'Doppio One' => 'Doppio One',
		'Sevillana' => 'Sevillana',
		'Share' => 'Share',
		'Fascinate' => 'Fascinate',
		'Righteous' => 'Righteous',
		'Ruthie' => 'Ruthie',
		'Ceviche One' => 'Ceviche One',
		'Almendra SC' => 'Almendra SC',
		'Fresca' => 'Fresca',
		'Voltaire' => 'Voltaire',
		'Ewert' => 'Ewert',
		'Exo' => 'Exo',
		'Allura' => 'Allura',
		'Norican' => 'Norican',
		'Armata' => 'Armata',
		'Shojumaru' => 'Shojumaru',
		'Metamorphous' => 'Metamorphous',
		'Noticia Text' => 'Noticia Text',
		'Creepster' => 'Creepster',
		'Glegoo' => 'Glegoo',
		'Iceberg' => 'Iceberg',
		'Gudea' => 'Gudea',
		'Port Lligat Slab' => 'Port Lligat Slab',
		'Galdeano' => 'Galdeano',
		'Overlock SC' => 'Overlock SC',
		'Italianno' => 'Italianno',
		'Inika' => 'Inika',
		'Felipa' => 'Felipa',
		'Ropa Sans' => 'Ropa Sans',
		'Geo' => 'Geo',
		'Open Sans Condensed' => 'Open Sans Condensed',
		'Convergence' => 'Convergence',
		'Montserrat' => 'Montserrat',
		'Amatic SC' => 'Amatic SC',
		'Maven Pro' => 'Maven Pro',
		'Lato' => 'Lato',
		'Ubuntu Condensed' => 'Ubuntu Condensed',
		'Nova Mono' => 'Nova Mono',
		'Droid Sans' => 'Droid Sans',
		'Droid Sans Mono' => 'Droid Sans Mono',
		'Droid Serif' => 'Droid Serif',
	),
	"std" => 'PT Sans'
),

array( "name" => "Entry Title Font Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_entry_title_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "16",
	"from" => 16,
	"to" => 24,
	"step" => 1,
),

array( "name" => "H1 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h1_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "46",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H2 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h2_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "32",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H3 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h3_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "28",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H4 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h4_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "20",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H5 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h5_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "16",
	"from" => 16,
	"to" => 60,
	"step" => 1,
),

array( "name" => "H6 Size (in pixels)",
	"desc" => "",
	"id" => $shortname."_h6_font_size",
	"type" => "jslider",
	"size" => "40px",
	"std" => "14",
	"from" => 14,
	"to" => 60,
	"step" => 1,
),
	
array( "type" => "close"),
//End first tab "Font"

//Begin first tab "Header Contact Info
array( 
		"name" => "Header",
		"type" => "section",
		"icon" => "bar.png",
)
,

array( "type" => "open"),

array( "name" => "Phone number",
	"desc" => "Enter Phone Number for top header",
	"id" => $shortname."_sm_phone_number",
	"type" => "text",
	"std" => ""

),

array( "name" => "Email address",
	"desc" => "Enter Email address for top header",
	"id" => $shortname."_sm_email_address",
	"type" => "text",
	"std" => ""

),

array( "type" => "close"),
//End first tab "Hello Bar"

//Begin first tab "Social Media"
array( 
		"name" => "Social-Icons",
		"type" => "section",
		"icon" => "social.png",
)
,

array( "type" => "open"),

array( "name" => "Facebook Link",
	"desc" => "Enter Facebook Page link for header social media buttons",
	"id" => $shortname."_sm_facebook",
	"type" => "text",
	"std" => ""

),

array( "name" => "Twitter Link",
	"desc" => "Enter Twitter link for header social media buttons",
	"id" => $shortname."_sm_twitter",
	"type" => "text",
	"std" => ""

),

array( "name" => "Diig Link",
	"desc" => "Enter Diig link for header social media buttons",
	"id" => $shortname."_sm_diig",
	"type" => "text",
	"std" => ""

),

array( "name" => "Dribbble Link",
	"desc" => "Enter Dribbble link for header social media buttons",
	"id" => $shortname."_sm_dribbble",
	"type" => "text",
	"std" => ""

),

array( "name" => "Flickr Link",
	"desc" => "Enter Flickr link for header social media buttons",
	"id" => $shortname."_sm_flickr",
	"type" => "text",
	"std" => ""

),

array( "name" => "Forrst Link",
	"desc" => "Enter Forrst link for header social media buttons",
	"id" => $shortname."_sm_forrst",
	"type" => "text",
	"std" => ""

),

array( "name" => "Tumblr Link",
	"desc" => "Enter Tumblr link for header social media buttons",
	"id" => $shortname."_sm_tumblr",
	"type" => "text",
	"std" => ""

),

array( "name" => "Vimeo Link",
	"desc" => "Enter Vimeo link for header social media buttons",
	"id" => $shortname."_sm_vimeo",
	"type" => "text",
	"std" => ""

),

	
array( "type" => "close"),
//End first tab "Social Media"

//Begin first tab "Contact"
array( 
		"name" => "Contact",
		"type" => "section",
		"icon" => "mail-receive.png",
)
,

array( "type" => "open"),

array( "name" => "Your email address",
	"desc" => "Enter which email address will be sent from contact form",
	"id" => $shortname."_contact_email",
	"type" => "text",
	"std" => ""
),

array( "name" => "Email error message",
	"desc" => "Enter message display whene email introduced is incorect",
	"id" => $shortname."_contact_email_error",
	"type" => "text",
	"std" => "You entered an invalid email."
),

array( "name" => "Name error message",
	"desc" => "Enter message display whene name is not introduced",
	"id" => $shortname."_contact_name_error",
	"type" => "text",
	"std" => "You forgot to enter your name."
),

array( "name" => "Message error",
	"desc" => "Enter message display whene message is not introduced",
	"id" => $shortname."_contact_message_error",
	"type" => "text",
	"std" => "You forgot to enter your message."
),

array( "name" => "Thank you message",
	"desc" => "Enter message display once form submitted",
	"id" => $shortname."_contact_thankyou",
	"type" => "text",
	"std" => "Thank you! We will get back to you as soon as possible"
),

array( "name" => "Your location name",
	"desc" => "Enter your loction name",
	"id" => $shortname."_contact_locTitle",
	"type" => "text",
	"std" => "Chisinau"
),

array( "name" => "Latitude",
	"desc" => "Enter map latitude (to find coordinates visit: http://itouchmap.com/latlong.html",
	"id" => $shortname."_contact_latitude",
	"type" => "text",
	"std" => "47.02"
),

array( "name" => "Longitude",
	"desc" => "Enter map longitude (to find coordinates visit: http://itouchmap.com/latlong.html",
	"id" => $shortname."_contact_longitude",
	"type" => "text",
	"std" => "28.83"
),

array( "name" => "Zoom level",
	"desc" => "Enter zoom level. (Range: 1-16) ",
	"id" => $shortname."_contact_zoomLevel",
	"type" => "text",
	"std" => "10"
),
	
array( "type" => "close"),
//End first tab "Contact"


//Begin second tab "Footer"
array( "name" => "Footer",
	"type" => "section",
	"icon" => "footer.png",
),

array( "type" => "open"),

array( "name" => "Footer Copyright Text",
	"desc" => "You can add text and HTML in here",
	"id" => $shortname."_footer_copyright",
	"type" => "textarea",
	"std" => ""

),

array( "type" => "close"),
//End second tab "Footer"


//Begin second tab "SEO"
array( "name" => "SEO",
	"type" => "section",
	"icon" => "zoom.png",
),

array( "type" => "open"),

array( "name" => "Meta Keywords",
	"desc" => "Enter your site keywords (separate by comma ,)",
	"id" => $shortname."_seo_meta_key",
	"type" => "textarea",
	"std" => ""

),

array( "name" => "Meta Description",
	"desc" => "Enter your site description",
	"id" => $shortname."_seo_meta_desc",
	"type" => "textarea",
	"std" => ""

),

array( "type" => "close"),
//End second tab "SEO"
 
array( "type" => "close")
 
);
?>