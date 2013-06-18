<?php 

/*
Forum
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
						<h2><?php 
				
						$title = "";

						if(function_exists('bbp_is_single_user_edit') && (bbp_is_single_user_edit() || bbp_is_single_user()))
						{
							$user_info = get_userdata(bbp_get_displayed_user_id());
							$title = __("Profile for User:","agrgg")." ".$user_info->display_name;
							if(bbp_is_single_user_edit()) 
							{
								$title = __("Edit profile for User:","agrgg")." ".$user_info->display_name; 
							}
						} 

						if(!is_singular()) 
						{
							$title = __('Forums',"agrgg");
						} else {
							
							$title = the_title();

						}

						echo $title;
						 
						?></h2>

					</div>
				</div>	
			</div>
			<!-- End Page Title Container -->	
		
		</div>
		<!-- End Main Header -->


		<!-- Begin Main Container -->
		<div class="container_wrap fullsize" id="main">
			
			<!-- Begin Page and Sidebar -->
			<div class="container" id="template-blog">
			
				<div class="content eight alpha columns" id="forum">
				
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<?php the_content(); ?>
								
					<?php endwhile; endif; ?>
			
				</div>		

				<div class="columns sidebar_right four">
					<div class="sidebar">
						<div class="inner_sidebar">
							<?php get_sidebar('forum'); ?>
						</div>
					</div>	
				</div>
				
			</div>
		
		</div>
		<!-- End Main Container -->			
			
<?php get_footer(); ?>