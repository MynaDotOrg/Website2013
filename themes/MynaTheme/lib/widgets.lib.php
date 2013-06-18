<?php

/**
*	Begin Quote Rotator Custom Widgets
**/

class WPCrown_Custom_Quote_Rotator extends WP_Widget {
	function WPCrown_Custom_Quote_Rotator()
	  {
	    $widget_ops = array('classname' => 'Quote_Rotator_Widget', 'description' => 'WPCrown Quote Rotator Widget' );
	    $this->WP_Widget('Quote_Rotator_Widget', 'WPCrown Quote Rotator Widget', $widget_ops);
	  }
	 
	  function form($instance)
	  {
	    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ));
	    $title = $instance['title'];
	?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
	<?php
	  }
	 
	  function update($new_instance, $old_instance)
	  {
	    $instance = $old_instance;
	    $instance['title'] = $new_instance['title'];
	    return $instance;
	  }
	 
	  function widget($args, $instance)
	  {
	    extract($args, EXTR_SKIP);
	 
	    echo $before_widget;
	    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	 
	    if (!empty($title))
	      echo $before_title . $title . $after_title;  
		
	    // popular_posts Widget Content
		echo '<div class="widget-quote">';
		 
		$pc = new WP_Query('post_type=quote'); 
		while ($pc->have_posts()) : $pc->the_post();
			
			echo '<blockquote><p>';
			the_content();
			echo '<cite>';
			the_title();
			echo '</cite></p>
			</blockquote>';
			
		endwhile;
		
		echo '</div>';
		
	    echo $after_widget;
	  }
	 
	}

register_widget('WPCrown_Custom_Quote_Rotator');

/**
*	End Quote Rotator Custom Widgets
**/

/**
*	Begin Twitter Custom Widgets
**/
class WPCrown_Custom_Twitter extends WP_Widget {
	function WPCrown_Custom_Twitter() {
		$widget_ops = array('classname' => 'WPCrown_Custom_Twitter', 'description' => 'Display your recent Twitter feed' );
		$this->WP_Widget('WPCrown_Custom_Twitter', 'WPCrown Custom Twitter', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo $before_widget;
		$twitter_username = empty($instance['twitter_username']) ? ' ' : apply_filters('widget_title', $instance['twitter_username']);
		$title = $instance['title'];
		
		if(empty($title))
		{
			$title = 'Recent Tweets';
		}
		
		if(!empty($twitter_username))
		{
			echo '<div class="widget-title">'.$title.'</div>';
			echo '<div class="widget-content archive">';
				
			echo '<ul class="news-wrap" id="twitter_update_list">
								<li><p>Please wait while our tweets load <img src="';
			get_template_directory_uri();
			echo '/images/indicator-white.gif" alt="loading"/></p></li></ul>
			<p><span class="twitter_link"><p><span class="follow-twitter"><a href="https://twitter.com/#!/'.$twitter_username.'">Follow Me +</a></span></p></div>';
					
			echo '<script src="http://api.twitter.com/1/statuses/user_timeline/'.$twitter_username.'.json?callback=twitterCallback1&amp;count=2" type="text/javascript"></script>';
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter_username'] = strip_tags($new_instance['twitter_username']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'items' => '', 'twitter_username' => '', 'title' => '') );
		$twitter_username = strip_tags($instance['twitter_username']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo $this->get_field_id('twitter_username'); ?>">Twitter Username: <input class="widefat" id="<?php echo $this->get_field_id('twitter_username'); ?>" name="<?php echo $this->get_field_name('twitter_username'); ?>" type="text" value="<?php echo esc_attr($twitter_username); ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}
}

register_widget('WPCrown_Custom_Twitter');
/**
*	End Twitter Feed Custom Widgets
**/

// Recent Posts Widget
class posts_recent_Widget extends WP_Widget
{
	  function posts_recent_Widget()
	  {
	    $widget_ops = array('classname' => 'posts_recent_Widget', 'description' => 'WPCrown Recent Posts Widget' );
	    $this->WP_Widget('posts_recent_Widget', 'WPCrown Recent Posts Widget', $widget_ops);
	  }
	 
	  function form($instance)
	  {
	    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ));
	    $title = $instance['title'];
	  ?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
	  <?php
	  }
	 
	  function update($new_instance, $old_instance)
	  {
	    $instance = $old_instance;
	    $instance['title'] = $new_instance['title'];
	    return $instance;
	  }

	  function widget($args, $instance)
	  {
	    extract($args, EXTR_SKIP);

	    echo $before_widget;

	    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

	    if (!empty($title))
	      echo $before_title . $title . $after_title;  
		
	    // recent_posts Widget Content
		echo '<ul>';
		
	    
			        $pc = new WP_Query('posts_per_page=3'); 
					while ($pc->have_posts()) : $pc->the_post();	
					
						echo '<li class="news-content"><a class="news-link" title="" href="';
						the_permalink();
						echo '"><strong class="news-headline">';
						the_title();
						echo '<span class="news-time">';
						the_time('F jS, Y');
						echo '</span></strong></a></li>';
						
					
					endwhile;
		echo '</ul>';			
					
		echo $after_widget;			
					
	  }
	 

}
register_widget('posts_recent_Widget');

// Popular Posts Widget
class posts_pop_Widget extends WP_Widget
{
	  function posts_pop_Widget()
	  {
	    $widget_ops = array('classname' => 'posts_pop_Widget', 'description' => 'WPCrown Popular Posts Widget' );
	    $this->WP_Widget('posts_pop_Widget', 'WPCrown Popular Posts Widget', $widget_ops);
	  }
	 
	  function form($instance)
	  {
	    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ));
	    $title = $instance['title'];
	  ?>
	  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
	  <?php
	  }
	 
	  function update($new_instance, $old_instance)
	  {
	    $instance = $old_instance;
	    $instance['title'] = $new_instance['title'];
	    return $instance;
	  }

	  function widget($args, $instance)
	  {
	    extract($args, EXTR_SKIP);

	    echo $before_widget;

	    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

	    if (!empty($title))
	      echo $before_title . $title . $after_title;  
		
	    // popular_posts Widget Content
		echo '<ul>';
		
	    
			        $pc = new WP_Query('orderby=comment_count&posts_per_page=3'); 
					while ($pc->have_posts()) : $pc->the_post();	
					
						echo '<li class="news-content"><a class="news-link" title="" href="';
						the_permalink();
						echo '"><strong class="news-headline">';
						the_title();
						echo '<span class="news-time">';
						the_time('F jS, Y');
						echo '</span></strong></a></li>';
						
					
					endwhile;
		echo '</ul>';			
					
		echo $after_widget;			
					
	  }
	 

}
register_widget('posts_pop_Widget');


/**
*	Begin Flickr Feed Custom Widgets
**/

class WPCrown_Custom_Flickr extends WP_Widget {
	function WPCrown_Custom_Flickr() {
		$widget_ops = array('classname' => 'WPCrown_Custom_Flickr', 'description' => 'Display your recent Flickr photos' );
		$this->WP_Widget('WPCrown_Custom_Flickr', 'WPCrown Custom Flickr', $widget_ops);
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);

		echo '<div class="widgetflickr widget">';
		$flickr_id = empty($instance['flickr_id']) ? ' ' : apply_filters('widget_title', $instance['flickr_id']);
		$title = $instance['title'];
		
		
		if(empty($title))
		{
			$title = 'Photostream';
		}
		
		if(!empty($flickr_id))
		{
			$photos_arrg = get_flickr(array('type' => 'user', 'id' => $flickr_id, 'items' => '6' ));
			
			if(!empty($photos_arrg))
			{
				echo '<div class="widget-title">'.$title.'</div>';
				echo '<div class="widget-content"><ul id="flickr_widget">';
				
				foreach($photos_arrg as $flickr_photo)
				{
					echo '<li>';
					echo '<a class="flickr_images image" href="'.$flickr_photo['url'].'" title="'.$flickr_photo['title'].'"><img src="'.$flickr_photo['thumb_url'].'" alt="" /></a>';
					echo '</li>';
				}
				
				echo '</ul><p><span class="follow-twitter"><a href="http://www.flickr.com/photos/'.$flickr_id.'/">View More +</a></span><p></div>';
			}
		}
		
		echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['flickr_id'] = strip_tags($new_instance['flickr_id']);

		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'flickr_id' => '', 'title' => '') );
		$flickr_id = strip_tags($instance['flickr_id']);
		$title = strip_tags($instance['title']);

?>
			<p><label for="<?php echo $this->get_field_id('flickr_id'); ?>">Flickr ID <a href="http://idgettr.com/">Find your Flickr ID here</a>: <input class="widefat" id="<?php echo $this->get_field_id('flickr_id'); ?>" name="<?php echo $this->get_field_name('flickr_id'); ?>" type="text" value="<?php echo esc_attr($flickr_id); ?>" /></label></p>
			
			<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}
}

register_widget('WPCrown_Custom_Flickr');

/**
*	End Flickr Feed Custom Widgets
**/

?>