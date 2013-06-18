<?php 

/*
Template Name: Portfolio Standard 3 Col
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

			<!-- Begin Project Intro -->
			<div class="container">
				<div class="full">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<?php the_content(); ?>
								
					<?php endwhile; endif; ?>
				</div>
			</div>
			<!-- End Project Intro -->

			<!-- Begin Projects-->
			<div class="container" id="portfolio">
		
				<?php 
		
					if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} elseif ( get_query_var('page') ) {
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
					query_posts( array('post_type' => 'project',  'posts_per_page' => 9, 'paged' => $paged));

					$current = -1;
				
				?>
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); $current++; 
				
					$image_id = get_post_thumbnail_id();
					$image_url = wp_get_attachment_image_src($image_id,'large', true);

					$portfolio_link_url = get_post_meta($post->ID, 'portfolio_link_url', true);
													
					if(empty($portfolio_link_url))
					{
						$permalink_url = get_permalink($post->ID);
					}
					else
					{
						$permalink_url = $portfolio_link_url;
					}
				
				?>

				<div class="one_third <?php if($current%3 ==0) { echo 'first '; } ?>column_container">
					<div class="portfolio-image"><a href="<?php echo $permalink_url; ?>"><img src="<?php echo get_template_directory_uri(); ?>/lib/timthumb.php?src=<?php echo $image_url[0]; ?>&w=450&h=320&zc=1&q=100" alt="" /></a></div>
					<h1><a href="<?php echo $permalink_url; ?>"><?php the_title(); ?></a></h1>
					<p><?php echo wpcrown_substr(strip_tags(strip_shortcodes($post->post_content)), 130); ?> <span class="more"><a href="<?php echo $permalink_url; ?>">Project Details &rarr;</a></span></p>
				</div>
				
				<?php endwhile; ?>

			</div>
			<!-- End Projects -->	
			<!-- Begin Pagination-->
			<div class="container">		
				<?php pagination(); ?>	
			</div>
			<!-- End Pagination-->
				
			<?php endif; ?>
			<?php wp_reset_query(); ?>	
		
		</div>
		<!-- End Main Container -->	
			
<?php get_footer(); ?>