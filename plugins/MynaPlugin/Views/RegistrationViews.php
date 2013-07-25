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
					<a href='<?php echo $_SERVER['REQUEST_URI'].'?a=complete&eid=9999';?>'>click here to simulate completing the form</a>
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
				<h2><?php echo $model->EventInfo->Name; ?> Registration</h2>
				<div class="wrap" id="RegistrationForm">
					<i>Thank you for registering</i>
				</div>			
			</div><!-- #content -->
		</div><!-- #primary -->
		
		
		<?php 		
	}
}

class RegistrationEditView extends BaseView{
	public function GetView($model){
	?>
		<div id="primary" class="site-content">
			<div id="content" role="main">
				<h2><?php echo $model->EventInfo->Name; ?> Registration</h2>
				<div class="wrap" id="RegistrationForm">
					<div  
					<?php echo 'style=\'color:red;display:'.((true == $this->ViewBag["ErrorSavingInfo"]) ? 'block' : 'none').';\'';?>
					>
						Error saving event information
					</div>
					<div class='editsection' style="height:50px; width:95%;">
						<h2>User Type</h2>
						<?php 
						//
						?>
						<select id="eventTypeDropDown" name='RegistrationUserType'>
							<?php 
								foreach($this->ViewBag["UserTypes"] as $userTypeId => $userTypeName){
									echo '<option value="'.$userTypeId.'" >'.$userTypeName.'</option>';
								}
							?>
						</select>
					</div>
					<div class='editsection' style="height:50px; width:95%;">
						<h2>Expiration Date</h2>
						<div style="float:left;">
							<h3>Date</h3>
							<div class='ExpiresDates'>
								<input type="text" class="RegistrationExpiresDatePickerClass" id="ExpiresDatePicker" name="RegistrationExpiresDate" value='<?php echo $model->Info->EventDate; ?>' />
							</div>
						</div>
						<div style="float:left; padding-left:30px;">
							<h3>Time</h3>
							<div class='ExpiresDates'>
								<?php $this->GetTimePicker("EventDatePickerTime", $model->Info->Time);?>
							</div>
						</div>
					</div>
					<div class='editsection' style="height:50px; width:95%;">
						<h2>Form Embed Code</h2>
						<textarea name='EmbedCode' rows="5" cols="60"></textarea>
					</div>
				</div>			
			</div><!-- #content -->
		</div><!-- #primary -->
		
		
		<?php 		
	}
}


?>