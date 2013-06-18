<?php 

/*
Template Name: Team
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
		
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
				<?php the_content(); ?>
							
				<?php endwhile; endif; ?>

			</div>

			<!-- Begin Team  -->
			<div class="container"  id="team">

			<?php 
		
				if ( get_query_var('paged') ) {
						$paged = get_query_var('paged');
					} elseif ( get_query_var('page') ) {
						$paged = get_query_var('page');
					} else {
						$paged = 1;
					}
				query_posts( array('post_type' => 'team',  'posts_per_page' => 9, 'paged' => $paged));

				$current = -1;
			?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); $current++; 
				
				$image_id = get_post_thumbnail_id();
				$image_url = wp_get_attachment_image_src($image_id,'large', true);
				//$imagem = '';						
				//$imagem = wpcrown_vt_resize( '', $image_url[0], '160', '100', true, 'left', true);
				
				$custom = get_post_custom($post->ID);
				
				$position = $custom["memberPosition"][0];
				$twitter = $custom["memberTwitter"][0];
				$facebook = $custom["memberFacebook"][0];
				$diig = $custom["memberDiig"][0];
				$dribbble = $custom["memberDribbble"][0];
				$flickr = $custom["memberFlickr"][0];
				$forrst = $custom["memberForrst"][0];
				$tumblr = $custom["memberTumblr"][0];
				$vimeo = $custom["memberVimeo"][0];
			
			?>

				<div class="one_third <?php if($current%3 ==0) { echo 'first '; } ?>column_container team">
					<div class="team-image"><img src="<?php echo get_template_directory_uri(); ?>/lib/timthumb.php?src=<?php echo $image_url[0]; ?>&h=280&w=450&zc=1" alt="<?php the_title(); ?>" /></div>
					<h1><?php the_title(); ?></h1>
					<span class="team-position"><?php echo $position; ?></span>
					<p><?php echo the_content(); ?></p>
					<ul class="social_bookmarks">

						<?php 
			
						if(!empty($facebook))
							{
							
						?>
						<li class="facebook"><a href="<?php echo $facebook; ?>">Join our Facebook Group</a></li>
						<?php }	?>

						<?php 
			
						if(!empty($dribbble))
							{
							
						?>
						<li class="dribbble"><a href="<?php echo $dribbble; ?>">Follow us on dribbble</a></li>
						<?php }	?>

						<?php 
			
						if(!empty($twitter))
							{
							
						?>
						<li class="twitter"><a href="<?php echo $twitter; ?>">Follow us on Twitter</a></li>
						<?php }	?>

						<?php 
			
						if(!empty($forrst))
							{
							
						?>
						<li class="forrst"><a href="<?php echo $forrst; ?>">Follow us on Forrst</a></li>
						<?php }	?>
							
						<?php 
			
						if(!empty($flickr))
							{
							
						?>	
						<li class="flickr"><a href="<?php echo $flickr; ?>">Flickr</a></li>
						<?php }	?>

						<?php 
			
						if(!empty($vimeo))
							{
							
						?>
						<li class="vimeo"><a href="<?php echo $vimeo; ?>">Follow us on Vimeo</a></li>
						<?php }	?>

						<?php 

						if(!empty($diig))
							{
							
						?>
						<li class="diig"><a href="<?php echo $diig; ?>">Follow us on Diig</a></li>
						<?php }	?>

						<?php 
			
						if(!empty($tumblr))
							{
							
						?>
						<li class="tumblr"><a href="<?php echo $tumblr; ?>">Follow us on Tumblr</a></li>
						<?php }	?>

					</ul>
				</div>

				<?php endwhile; ?>

			</div>
			<!-- End Team -->


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