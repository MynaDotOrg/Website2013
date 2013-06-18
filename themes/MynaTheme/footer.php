		<!-- Footer Container -->
		<div class="container_wrap" id="footer">
		
			<!-- Begin Footer -->
			<div class="container">
			
				<div class="one_fourth first column_container">
					<?php get_sidebar('footer-one'); ?>
				</div>	
				
				<div class="one_fourth column_container">
					<?php get_sidebar('footer-two'); ?>
				</div>
				
				<div class="one_fourth column_container">
					<?php get_sidebar('footer-three'); ?>
				</div>
					
				<div class="one_fourth column_container">
					<?php get_sidebar('footer-four'); ?>
				</div>
				
			</div>
			<!-- End Footer -->

			<?php wp_footer(); ?>
		
		</div>
		<!-- End Footer Container -->
		
		<!-- Socket Container -->
		<div class="container_wrap" id="socket">
		
			<!-- Begin Copyright -->
			<div class="container">

				<span class="copyright"></a>
				<?php if (get_option('wpcrown_footer_copyright') <> ""){
						echo stripslashes(stripslashes(get_option('wpcrown_footer_copyright')));
					}else{
						echo '&#64; Copyright - <a href="http://alexgurghis.com/themes/prometheus-e-comm/">Prometheus - A Responsive e-Commerce Theme</a> - A Theme by <a href="http://www.alexgurghis.com">AlexGurghis.com';
				}?>
				</span>
				
				<div class="backtop">
					<a href="#backtop">Top</a>
				</div>
			</div>
			<!-- End Copyright -->
		
		</div>
		<!-- End Socket Container -->
	
	</div>
		
</body>
</html>