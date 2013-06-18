<?php 

/*
The main template file for display categories
*/

$page = get_page($post->ID);
$current_page_id = $page->ID;

$page_title = get_post_meta($current_page_id, 'page_title', true);

get_header(); ?>
<!-- this is index.php -->

			<!-- Page Title Container -->
			<div class="container_wrap" id="page-title">
				<div class="container">
					<div class="full">
						<h2><span><?php _e("Category", "agrgg"); ?> | <?php	printf( __( ' %s', '' ), '' . single_cat_title( '', false ) . '' );	?></span></h2>
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

			
						<?php

						global $more; $more = false; # some wordpress wtf logic

							$cat_id = get_cat_ID(single_cat_title('', false));
							if(!empty($cat_id))
							{
								$query_string.= '&cat='.$cat_id;
							}
						
						query_posts($query_string);

						if (have_posts()) : while (have_posts()) : the_post();
						

						?>  
						
						<div class="post-v2" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
							
							
							<?php 
								$image_id = get_post_thumbnail_id();
								$image_url = wp_get_attachment_image_src($image_id,'large', true);
								//$imagem = '';						
								//$imagem = wpcrown_vt_resize( '', $image_url[0], '430', '180', true, 'left', true); 
														
								//echo $blog_type;
								if(!empty($image_id))
							{ ?>
								
							
							<div class="post-image">
								<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/lib/timthumb.php?src=<?php echo $image_url[0]; ?>&w=600&zc=1&q=100" alt=""/></a>
							</div>	
							
							<?php 
								}
							?>

							<ul class="post-meta">
								<li><span><?php _e("Posted on", "agrg"); ?></span><br /><?php the_time('F jS, Y') ?></li>
								<li><span><?php _e("Author", "agrg"); ?></span><br /><?php the_author_posts_link(); ?></li>
								<li><span><?php _e("Comments", "agrg"); ?></span><br /><a href="<?php comments_link(); ?>"><?php comments_number(__('No comment', "agrg"), __('One comment', "agrg"), __('% Comments', "agrg")); ?></a></li>
								<li><span><?php _e("Category", "agrg"); ?></span><br /><?php the_category(', ') ?></li>
							</ul>
							
							<div class="post-content">

								<a href="<?php the_permalink() ?>"><h1><?php the_title(); ?></h1></a>

								<?php $more = 0;the_content(''); ?>
							
								<span class="more"><a href="<?php the_permalink() ?>">Read More &rarr;</a></span>
							
							</div>
						
						</div>
			
						<?php endwhile; ?>
				
						<!-- Begin Pagination-->	
						<div class="pagination">
							<?php pagination(); ?>
						</div>
						<!-- End Pagination-->	

						<?php endif; ?>
			
					</div>
				
				</div>
				
				<div class="columns sidebar_right four">
					<div class="sidebar">
						<div class="inner_sidebar">
							<?php get_sidebar('blog'); ?>
						</div>
					</div>	
				</div>

			</div>
		
		</div>
		<!-- End Main Container -->			
			
<?php get_footer(); ?>