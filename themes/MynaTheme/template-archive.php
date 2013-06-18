<?php 

/*
Template Name: Archives
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_title = get_post_meta($current_page_id, 'page_title', true);

$page_slider = get_post_meta($current_page_id, 'page_slider', true);

get_header(); ?>
<!-- this is index.php -->

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

			<div class="container">
		
				<div class="full">

					<div class="entry-title">
						<h5><span><?php _e("The 20 latest Blog Posts", "agrgg"); ?></span></h5>
					</div>

					<div class="full column_container">

					<?php 
					//display the actual post content
					the_post();
					the_content();
					
					
					/*
					* Display the latest 20 blog posts
					*/
					
					
					query_posts(array('posts_per_page'=>20));

					// check if we got posts to display:
					if (have_posts()) :
					
					echo "<ul class='lists star'>";
						while (have_posts()) : the_post();
						
			        	echo "<li><a href='".get_permalink()."' rel='bookmark' title='". __('Permanent Link:','agrg')." ".get_the_title()."'>".get_the_title()."</a></li>";
						
						endwhile;
					echo "</ul>";
					endif;

					?>

					</div>

					</div>

					<!-- Begin Projects-->
					<div class="full">

						<div class="entry-title">
							<h5><span><?php _e("The 8 latest Products", "agrg"); ?></span></h5>
						</div>
				
						<?php echo do_shortcode("[recent_products per_page='8' columns='4']"); ?>

					</div>
					<!-- End Projects -->

					<?php

					/*
					* Display pages, categories and month archives
					*/
					
					echo "<div class='one_third first'>";

					?>

					<div class="entry-title">
						<h5><span><?php _e("Available Pages", "agrg"); ?></span></h5>
					</div>

					<?php

					echo "<ul class='full lists star'>";
					wp_list_pages('title_li=&depth=-1' );
					echo "</ul>";
					echo "</div>";
					
					echo "<div class='one_third'>";

					?>

					<div class="entry-title">
						<h5><span><?php _e("Archives by Subject:", "agrg"); ?></span></h5>
					</div>

					<?php

					echo "<ul class='full lists star'>";
					wp_list_categories('sort_column=name&optioncount=0&hierarchical=0&title_li=');
					echo "</ul>";
					echo "</div>";
					
					echo "<div class='one_third'>";

					?>

					<div class="entry-title">
						<h5><span><?php _e("Archives by Month:", "agrg"); ?></span></h5>
					</div>

					<?php

					echo "<ul class='full lists star'>";
					wp_get_archives('type=monthly');
					echo "</ul>";
					echo "</div>";

					 ?>

			</div>
		
		</div>
		<!-- End Main Container -->	
			
<?php get_footer(); ?>