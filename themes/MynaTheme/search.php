<?php 

/*
The main template file for search
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
						<h2><?php _e( 'Search results for: ', 'agrgg' ); ?><?php the_search_query(); ?></h2>
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

						global $avia_config;
						if(isset($avia_config['new_query'])) { query_posts($avia_config['new_query']); }

						// check if we got posts to display:
						if (have_posts()) :
							$first = true;
							
							$counterclass = "";
							$counter = 1;
							$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
							if($page > 1) $counter = ((int) ($page - 1) * (int) get_query_var('posts_per_page')) +1;
							

							
							while (have_posts()) : the_post();	 ?>	
						
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

								<?php the_excerpt(); ?>
							
								<span class="more"><a href="<?php the_permalink() ?>">Read More &rarr;</a></span>
							
							</div>
						
						</div>
			
						<?php $first = false;
							$counter++;
							if($counter >= 100) $counterclass = "nowidth";
						endwhile;		
						else: 
						
						 ?>

						 <div class="full">
						<p><strong><?php _e('Nothing Found', 'agrg'); ?></strong><br/>
						   <?php _e('Sorry, no posts matched your criteria. Try another search?', 'agrg'); ?>
					    </p>
						
						<?php _e('You might want to consider some of our suggestions to get better results:', 'agrg'); ?></p>
						<ul>
							<li><?php _e('Check your spelling.', 'agrg'); ?></li>
							<li><?php _e('Try a similar keyword, for example: tablet instead of laptop.', 'agrg'); ?></li>
							<li><?php _e('Try using more than one keyword.', 'agrg'); ?></li>
						</ul>

						</div>
				
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