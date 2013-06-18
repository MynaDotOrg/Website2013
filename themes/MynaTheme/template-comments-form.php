<?php if ('open' == $post->comment_status) : ?>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<h6><?php _e("You must be", "agrg"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in", "agrg"); ?></a> <?php _e("to post a comment.", "agrg"); ?></h6><br/>
	<?php else : ?>

			<h5><?php _e("Wanna say something?", "agrg"); ?></h5>
			
				<div class="comment_input">
					<!-- Start of form --> 
					<form name="comm" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="contactform"> 

						<?php if ( is_user_logged_in() ) : ?>

					<?php _e("Logged in as", "agrg"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e("Log out &raquo;", "agrg"); ?></a><br/><br/>

			<?php else : ?>
			
					<input type="text" onfocus="if(this.value=='Name <?php if ($req) echo "(required)"; ?>')this.value='';" onblur="if(this.value=='')this.value='Name <?php if ($req) echo "(required)"; ?>';" name="author" class="input-textarea"  value="Name <?php if ($req) echo "(required)"; ?>" id="author" />
					
	              	<input type="text" onfocus="if(this.value=='Email (Will not be published) <?php if ($req) echo "(required)"; ?>')this.value='';" onblur="if(this.value=='')this.value='Email (Will not be published) <?php if ($req) echo "(required)"; ?>';" name="email" class="input-textarea" value="Email (Will not be published) <?php if ($req) echo "(required)"; ?>" id="email" />
					
					<input type="text" onfocus="if(this.value=='URL')this.value='';" onblur="if(this.value=='')this.value='URL';" name="url" class="input-textarea" value="URL" id="url" />

			<?php endif; ?>
						
					<textarea name="comment" cols="8" rows="5" id="comment" tabindex="4"></textarea>		
						
					<input type="submit" class="input-submit" value="Submit" />

					<?php comment_id_fields(); ?> 
					<?php do_action('comment_form', $post->ID); ?>

					</form> 
				</div>
				<!-- End of form --> 
			

	<?php endif; // If registration required and not logged in ?>

<?php endif; // if comment is open ?>
