<?php

/*
 The main template file for display single post page.
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

get_header(); 

?>

<?php

if (have_posts()) : while (have_posts()) : the_post();
?>

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

			<!-- Page Title Container -->
			<div class="container_wrap" id="page-title">
				<div class="container">
					<div class="full">
						<h2><?php the_title(); ?></h2>
					</div>
				</div>	
			</div>
			<!-- End Page Title Container -->

		</div>
		<!-- End Main Header -->
		
		<!-- Begin Main Container -->
		<div class="container_wrap fullsize" id="main">		
			
			<!-- Begin Blog and Sidebar -->
			<div class="container" id="template-blog">
			
				<div class="content eight alpha columns">
				
					<div class="full column_container">
						
						<div class="project-page-content">	

							<?php 
								$image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);
														
								if(!empty($image_id))
							{ ?>
								
								
								<div class="post-image">
									<img src="<?php echo get_template_directory_uri(); ?>/lib/timthumb.php?src=<?php echo $image_url[0]; ?>&w=600&q=100" alt="" />
								</div>
										
							<?php 
								}
							?>
				
							<ul class="post-meta">
								<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">Facebook</a></li>
								
								<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">Twitter</a></li>
								
								<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">Delicious</a></li>
								
								<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Diig</a></li>
								
								<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">Reddit</a></li>
								
								<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Stumbleupon</a></li>
							</ul>
				
							<div class="post-content">
							
								<h5><?php the_title(); ?></h5>
								
								<?php echo the_content(); ?>
							
							</div>
						
						</div>
						
					</div>
				
				</div>

				<?php endwhile; endif; ?>
				
				<div class="columns sidebar_right four">
					<div class="sidebar">
						<div class="inner_sidebar">
							<?php get_sidebar('pages'); ?>
						</div>
					</div>
				</div>
				
			</div>
			<!-- End Blog and Sidebar -->
		
		</div>
		<!-- End Main Container -->

<?php get_footer(); ?>