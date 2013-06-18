<?php

	// slideshow
	add_action('init', 'create_member');
	function create_member() {
    	$memberArgs = array(
        	'label' => __('Member'),
        	'singular_label' => __('Image'),
        	'public' => true,
        	'show_ui' => true,
        	'capability_type' => 'post',
        	'hierarchical' => false,
        	'rewrite' => true,
        	'supports' => array('title', 'editor', 'thumbnail'),
			'menu_icon' => get_stylesheet_directory_uri().'/functions/images/screen.png'
        );
    	register_post_type('team',$memberArgs);
	}
	
	
	add_action("admin_init", "add_member");
	add_action('save_post', 'update_member_url');
	function add_member(){
		add_meta_box("member_details", "Member Options", "member_options", "team", "normal", "low");
	}
	function member_options(){
		global $post;
		$custom = get_post_custom($post->ID);
		$memberPosition = $custom["memberPosition"][0];
		$memberTwitter = $custom["memberTwitter"][0];
		$memberFacebook = $custom["memberFacebook"][0];
		$memberDiig = $custom["memberDiig"][0];
		$memberDribbble = $custom["memberDribbble"][0];
		$memberFlickr = $custom["memberFlickr"][0];
		$memberForrst = $custom["memberForrst"][0];
		$memberTumblr = $custom["memberTumblr"][0];
		$memberVimeo = $custom["memberVimeo"][0];
?>		

	<div id="slide-options">
		<label>Position: </label><input name="memberPosition" value="<?php echo $memberPosition; ?>" /> <br /><br />
		<label>Twitter URL: </label><input name="memberTwitter" value="<?php echo $memberTwitter; ?>" /> <br /><br />
		<label>Facebook URL: </label><input name="memberFacebook" value="<?php echo $memberFacebook; ?>" />	<br /><br />
		<label>Diig URL: </label><input name="memberDiig" value="<?php echo $memberDiig; ?>" />	<br /><br />
		<label>Dribbble URL: </label><input name="memberDribbble" value="<?php echo $memberDribbble; ?>" />	<br /><br />
		<label>Flickr URL: </label><input name="memberFlickr" value="<?php echo $memberFlickr; ?>" /> <br /><br />
		<label>Forrst URL: </label><input name="memberForrst" value="<?php echo $memberForrst; ?>" /> <br /><br />
		<label>Tumblr URL: </label><input name="memberTumblr" value="<?php echo $memberTumblr; ?>" /> <br /><br />
		<label>Vimeo URL: </label><input name="memberVimeo" value="<?php echo $memberVimeo; ?>" /> <br /><br />
	</div><!--end slide-options-->
	
<?php		
		}
	function update_member_url(){
		
		global $post;

		if(isset($_POST["memberPosition"]))
		update_post_meta($post->ID, "memberPosition", $_POST["memberPosition"]);

		if(isset($_POST["memberTwitter"]))
		update_post_meta($post->ID, "memberTwitter", $_POST["memberTwitter"]);

		if(isset($_POST["memberFacebook"]))
		update_post_meta($post->ID, "memberFacebook", $_POST["memberFacebook"]);

		if(isset($_POST["memberDiig"]))
		update_post_meta($post->ID, "memberDiig", $_POST["memberDiig"]);

		if(isset($_POST["memberDribbble"]))
		update_post_meta($post->ID, "memberDribbble", $_POST["memberDribbble"]);

		if(isset($_POST["memberFlickr"]))
		update_post_meta($post->ID, "memberFlickr", $_POST["memberFlickr"]);

		if(isset($_POST["memberForrst"]))
		update_post_meta($post->ID, "memberForrst", $_POST["memberForrst"]);

		if(isset($_POST["memberTumblr"]))
		update_post_meta($post->ID, "memberTumblr", $_POST["memberTumblr"]);

		if(isset($_POST["memberVimeo"]))
		update_post_meta($post->ID, "memberVimeo", $_POST["memberVimeo"]);
	}	

?>