<?php 
/*
Template Name: Contact
*/

$contact_email = get_option('wpcrown_contact_email');
$wpcrown_contact_email_error = get_option('wpcrown_contact_email_error');
$wpcrown_contact_name_error = get_option('wpcrown_contact_name_error');
$wpcrown_contact_message_error = get_option('wpcrown_contact_message_error');
$wpcrown_contact_thankyou = get_option('wpcrown_contact_thankyou');

$wpcrown_contact_latitude = get_option('wpcrown_contact_latitude');
$wpcrown_contact_longitude = get_option('wpcrown_contact_longitude');
$wpcrown_contact_locTitle = get_option('wpcrown_contact_locTitle');
$wpcrown_contact_zoomLevel = get_option('wpcrown_contact_zoomLevel');

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_title = get_post_meta($current_page_id, 'page_title', true);

$page_slider = get_post_meta($current_page_id, 'page_slider', true);

global $nameError;
global $emailError;
global $commentError;

//If the form is submitted
if(isset($_POST['submitted'])) {
	
		//Check to make sure that the name field is not empty
		if(trim($_POST['contactName']) === '') {
			$nameError = $wpcrown_contact_name_error;
			$hasError = true;
		} elseif(trim($_POST['contactName']) === 'Name') {
			$nameError = $wpcrown_contact_name_error;
			$hasError = true;
		}	else {
			$name = trim($_POST['contactName']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$emailError = $wpcrown_contact_email_error;
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$emailError = $wpcrown_contact_email_error;
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		//Check to make sure comments were entered	
		if(trim($_POST['comments']) === '') {
			$commentError = $wpcrown_contact_message_error;
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = $contact_email;
			$subject = 'Contact Form Submission from '.$name;	
			$body = "Nume: $name \n\nEmail: $email \n\nComments: $comments";
			$headers = 'From website <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			wp_mail($emailTo, $subject, $body, $headers);

			$emailSent = true;

	}
}

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_title = get_post_meta($current_page_id, 'page_title', true);
$page_tagline = get_post_meta($current_page_id, 'page_tagline_text', true);

get_header(); 

?>

<script type='text/javascript'>
  jQuery(function() {
	// Location map //
	var locations = [
      ['<?php echo $wpcrown_contact_locTitle;?>', <?php echo $wpcrown_contact_latitude; ?>, <?php echo $wpcrown_contact_longitude; ?>, 4],
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: <?php echo $wpcrown_contact_zoomLevel;?>,
      center: new google.maps.LatLng(<?php echo $wpcrown_contact_latitude; ?>, <?php echo $wpcrown_contact_longitude; ?>),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
    // end //
	
	});
</script>

			<?php if($page_slider == "flexSlider") : ?>

			<!-- flexSlider Container -->
			<div class="container_wrap" id="slideshow_big">
				
				<!-- start header -->
			    <div class="container" style="position:relative; z-index:2;">

			        <div class="flexslider">
						<ul class="slides">

							<?php 
						
								$my_query = new WP_Query('post_type=flex_sldr'); while ($my_query->have_posts()) : $my_query->the_post();
									
								$custom = get_post_custom($post->ID);
								
								$image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);

								$link_url = get_post_meta($post->ID, 'flex_sldr_link_url', true);
													
								if(empty($link_url))
								{ ?>
									
									<li>
										<img src="<?php echo get_template_directory_uri(); ?>/lib/timthumb.php?src=<?php echo $image_url[0]; ?>&h=310&w=930&zc=1" alt="" width="930" height="310" />

										<?php if($post->post_content=="") : ?>
										<!-- Do stuff with empty posts (or leave blank to skip empty posts) -->
										<?php else : ?>
										<p class="flex-caption"><?php the_content(); ?></p>
										<?php endif; ?>
									</li>
									

								<?php } else { ?>

									<li>
										<a href="<?php echo $link_url; ?>"><img src="<?php echo get_template_directory_uri(); ?>/lib/timthumb.php?src=<?php echo $image_url[0]; ?>&h=310&w=930&zc=1" alt="" width="930" height="310" /></a>

										<?php if($post->post_content=="") : ?>
										<!-- Do stuff with empty posts (or leave blank to skip empty posts) -->
										<?php else : ?>
										<p class="flex-caption"><?php the_content(); ?></p>
										<?php endif; ?>
									</li>

							<?php } ?>

							<?php endwhile; ?>

						</ul>
					</div>

			    </div>
			    <!-- end header -->
			</div>
			<!-- End flexSlider Container -->

			<?php endif; ?>	

			<?php

				if(!empty($page_title))
					{
			?>

			<!-- Page Title Container -->
			<div class="container_wrap" id="page-title">
				<div class="container">
					<div class="full">
						<h2><?php echo $page_title; ?></h2>
					</div>
				</div>	
			</div>
			<!-- End Page Title Container -->

			<?php
				} else {
			?>	

			<!-- Page Title Container -->
			<div class="container_wrap" id="page-title">
				<div class="container">
					<div class="full">
						<h2><?php the_title(); ?></h2>
					</div>
				</div>	
			</div>
			<!-- End Page Title Container -->

			<?php
				}
			?>	
		
		</div>
		<!-- End Main Header -->

		<!-- Begin Main Container -->
		<div class="container_wrap fullsize" id="main">	
			
			<!-- Begin Services and Sidebar -->
			<div class="container" id="template-contact">
			
				<div class="content eight alpha columns services">
				
					<div class="full contact-image"><div id="map"></div></div>

					<div class="full column_container">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
						<?php the_content(); ?>
							
						<?php endwhile; endif; ?>
					</div>

					<div class="full column_container">
					
						<div class="contact_form">
		
							<?php if(isset($emailSent) && $emailSent == true) { ?>
							
							<h5><?php echo $wpcrown_contact_thankyou ?></h5></div>

							<?php } else { ?>
							
							<?php if($nameError != '') { ?>
								<h5><?php echo $nameError;?></h5>  
							<?php } ?>
							
							<?php if($emailError != '') { ?>
							   <h5><?php echo $emailError;?></h5>
							<?php } ?>
							
							<?php if($commentError != '') { ?>
							   <h5><?php echo $commentError;?></h5>
							<?php } ?>
						
							<form name="contactForm" action="<?php the_permalink(); ?>" id="contact-form" method="post" class="contactform" >
						
								<div>
								
								<input type="text" onfocus="if(this.value=='Name')this.value='';" onblur="if(this.value=='')this.value='Name';" name="contactName" id="contactName" value="Name" class="input-textarea" />
							 
								<input type="text" onfocus="if(this.value=='Email')this.value='';" onblur="if(this.value=='')this.value='Email';" name="email" id="email" value="Email" class="input-textarea" />
							 
								<textarea name="comments" id="commentsText" cols="8" rows="5" ></textarea>
								
								<br />
								
								<input name="submitted" type="submit" value="Submit" class="input-submit"/>
							
		
								</div>
							
							</form>
	
						</div>

						<?php } ?>
						
					</div>
						
				
				</div>
				
				<div class="sidebar columns sidebar_right four">
					<div class="inner_sidebar">
						<?php get_sidebar('pages'); ?>
					</div>
				</div>

			</div>
		
		</div>
		<!-- End Main Container -->		
			
<?php get_footer(); ?>