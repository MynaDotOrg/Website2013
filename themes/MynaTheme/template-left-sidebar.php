<?php 

/*
Template Name: Page Left Sidebar 
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
			
			<!-- Begin Page and Sidebar -->
			<div class="container align_right" id="template-blog">
				
				<div class="content eight alpha columns">
			
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php the_content(); ?>		
								
					<?php endwhile; endif; ?>
			
				</div>		

				<div class="sidebar_left">
					<div class="sidebar columns four">
						<div class="inner_sidebar">
							<?php get_sidebar('pages'); ?>
						</div>
					</div>	
				</div>
				
			</div>
		
		</div>
		<!-- End Main Container -->			
			
<?php get_footer(); ?>