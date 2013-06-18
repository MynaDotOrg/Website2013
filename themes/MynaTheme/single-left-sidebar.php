<?php

/*
 The main template file for display single post page.
*/

if($post->post_type == 'project')
{
	include (TEMPLATEPATH . "/template-portfolio-single.php");
    exit;
}

$page = get_page($post->ID);
$current_page_id = $page->ID;

$blog_type = get_option('wpcrown_blog_type');


get_header(); 

?>

<?php

if (have_posts()) : while (have_posts()) : the_post();
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
		
		</div>
		<!-- End Main Header -->
		
		<!-- Begin Main Container -->
		<div class="container_wrap fullsize" id="main">		
			
			<!-- Begin Blog and Sidebar -->
			<div class="container align_right" id="template-blog">
			
				<div class="content eight alpha columns">
				
					<div class="full column_container">
						
						<div class="post-page-content" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
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
							
								<h1><?php the_title(); ?></h1>
								
								<?php echo the_content(); ?>
							
							</div>
			
						</div>
						
						<ul class="post-meta">
							<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://www.facebook.com/sharer.php" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent('<?php the_permalink() ?>')+'&amp;amp;t='+encodeURIComponent('<?php the_title() ?>'),'facebook', 'toolbar=no,width=550,height=350'); return false;">Facebook</a></li>
							
							<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://twitter.com/home/?status=<?php the_title(); ?>: <?php echo get_tiny_url(get_permalink($post->ID)); ?>" title="Tweet this!" target="_blank">Twitter</a></li>
							
							<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://delicious.com/save" onclick="window.open('http://delicious.com/save?v=5&noui&jump=close&url='+encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'delicious', 'toolbar=no,width=550,height=550'); return false;">Delicious</a></li>
							
							<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink() ?>&amp;title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Digg</a></li>
							
							<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://www.reddit.com/submit" onclick="window.open('http://www.reddit.com/submit?url=' +encodeURIComponent('<?php the_permalink() ?>')+'&title='+encodeURIComponent('<?php the_title() ?>'),'reddit', 'toolbar=no,width=550,height=550'); return false">Reddit</a></li>
							
							<li><span><?php _e("Share this on", "agrg"); ?></span> <a href="http://stumbleupon.com/submit?url=<?php the_permalink() ?>&title=<?php echo urlencode(the_title('','', false)) ?>" target="_blank">Stumbleupon</a></li>
						</ul>
						
						<!-- End each blog post -->

						<?php comments_template( '' ); ?>
									
						<?php endwhile; endif; ?>
						
					</div>		

				</div>	
				
				<div class="sidebar_left">
					<div class="sidebar columns four">
						<div class="inner_sidebar">
							<?php get_sidebar('blog'); ?>
						</div>
					</div>
				</div>		
						
			</div>
			<!-- End Blog and Sidebar -->
				
		</div>
		<!-- End Main Container -->		

<?php get_footer(); ?>