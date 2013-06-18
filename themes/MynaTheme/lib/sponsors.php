<?php

	// slideshow
	add_action('init', 'create_partner');
	function create_partner() {
    	$partnerArgs = array(
        	'label' => __('Partners'),
        	'singular_label' => __('Image'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => get_stylesheet_directory_uri().'/functions/images/screen.png'
        );
    	register_post_type('spns',$partnerArgs);
	}
	
	
	add_action("admin_init", "add_partner");
	add_action('save_post', 'update_partner_url');
	function add_partner(){
		add_meta_box("partner_details", "Partners Options", "partner_options", "spns", "normal", "low");
	}
	function partner_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$partnerUrl = $custom["partnerUrl"][0];
?>		

	<div id="slide-options">
	<label>URL:</label><input name="partnerUrl" value="<?php echo $partnerUrl; ?>" />		
	</div><!--end slide-options-->
	
<?php		
		}
	function update_partner_url(){
		global $post;
		if(isset($_POST["partnerUrl"]))
		update_post_meta($post->ID, "partnerUrl", $_POST["partnerUrl"]);
	}	

?>