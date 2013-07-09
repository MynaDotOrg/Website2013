<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Views/BaseView.php');

class RegistrationListView extends BaseView{
	public function GetView($model){
		?>
		<div id="primary" class="site-content">
			<div id="content" role="main">

				<h2>Events</h2>
				<div class="wrap" id="RegistrationForm">
					<i>add registration form here</i>
				</div>			
			</div><!-- #content -->
		</div><!-- #primary -->
		<script id="RegistrationItemTemplate" type="text/x-jquery-tmpl">
					<div class='registrationItem'>
						<h4>
							${Name}
						</h4>
						<div class="registrationItemRow">
							<div class="registrationItemColumn">
							</div>
						</div>
					</div>
				</script>
			<script>
			var viewmodel = {};
			<?php echo "viewmodel.data=".json_encode($model->LatestEvents).";" ;?>
			viewmodel.Init = function(){
				jQuery("#EventItemTemplate").tmpl(viewmodel.data).appendTo("#EventList");
			};
			viewmodel.Init();
			</script>
		
		<?php 		
	}
}

class RegistrationUserListView extends BaseView{
	public function GetView($model){
		?>
		<div id="primary" class="site-content">
			<div id="content" role="main">

				<h2>Events</h2>
				<div class="wrap" id="RegistrationForm">
				</div>			
			</div><!-- #content -->
		</div><!-- #primary -->
		
		
		<?php 		
	}
}

class RegistrationFormView extends BaseView{
	public function GetView($model){
		?>
		<div id="primary" class="site-content">
			<div id="content" role="main">
				<h2><?php echo $model->EventInfo->Name; ?> Registration</h2>
				<div class="wrap" id="RegistrationForm">
					<?php echo $model->FormInfo->FormEmbedCode; ?>
					<a href=''>click here to simulate completing the form</a>
				</div>			
			</div><!-- #content -->
		</div><!-- #primary -->
		
		
		<?php 		
	}
}

class RegistrationCompletedView extends BaseView{
	public function GetView($model){
		?>
		<div id="primary" class="site-content">
			<div id="content" role="main">

				<h2>Events</h2>
				<div class="wrap" id="RegistrationForm">
					<i>Thank you for registering</i>
				</div>			
			</div><!-- #content -->
		</div><!-- #primary -->
		
		
		<?php 		
	}
}


?>