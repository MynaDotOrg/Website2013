<?php
$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Views/BaseView.php');

class EventListView extends BaseView{
	public function GetView($model){
		?>
				
				<script src="../wp-content/plugins/MynaPlugin/js/jquery.tmpl.min.js"></script>
				<div id="primary" class="site-content">
					<div id="content" role="main">
		
						<h2>Events</h2>
						<div class="wrap" id="EventList">
						
						</div>			
					</div><!-- #content -->
				</div><!-- #primary -->
				<script id="EventItemTemplate" type="text/x-jquery-tmpl">
					<div class='eventlistitem'>
						<h4>
							${Name}
						</h4>
						<div class="eventlistitemRow">
							<div class="eventlistitemColumn">
								<span style='float:left;'>
									<img src='../wp-content/plugins/MynaPlugin/images/camping_default.jpg' class='listitemimage'/>
								</span>
							</div>
							<div class="eventlistitemColumn">
								<span style='vertical-align:top;'>													
									<b>Location</b><br/>
									${LocationAddress}<br/>
									${LocationCity},
									${LocationState}<br/>
									${LocationZip}
								</span>
							</div>
							<div class="eventlistitemColumn">
							{{if typeof EventDates != 'undefined'}}
								<span style='vertical-align:top;'>
									<b>Dates</b>
									<ul id="EventDatesList">
										{{tmpl(EventDates) "#DateListTemplate"}}
									</ul>
								</span>
							{{/if}}
							</div>
						</div>
						<div class="eventlistitemRow dockToBottom">
							<a style='width:10px;' href='http://108.166.98.208/events/${EventID}'>
								<input type="button" value="More Info..." />
							</a>
							<input type="button" value="Register" />
						</div>
					</div>
				</script>
				<script id="DateListTemplate" type="text/x-jquery-tmpl">
					<li>
						${StartDateTime}<br/>
						${EndDateTime}
					</li>
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

class EventInfoView extends BaseView{
	public function GetView($model){
		?>
			<style>
				.infosection{
					margin:25px;
				}
			</style>
			<div id="primary" class="site-content">
					<div id="content" role="main">
						<div class="wrap">
							<h2>
							<?php echo $model->Info->Name; ?>
							</h2>
							<div class='eventlistitemRow'>
								<div class="eventlistitemColumn" style="margin-right:40px">
									<span style="width:200px;">
										<h3>Location</h3>
										<?php echo $model->Info->LocationAddress; ?><br/>
										<?php echo $model->Info->LocationCity; ?>,
										<?php echo $model->Info->LocationState; ?><br/>
										<?php echo $model->Info->LocationZip; ?>
									</span>
								</div>
								<div class="eventlistitemColumn" >
									<span style="width:200px;">
									<h3>Dates</h3>
									<ol id="EventDatesList">
										<?php
										foreach ( $model->EventDates as $eventdate ) 
										{
											$dt = new DateTime($eventdate->StartDateTime);
											echo '<li>'.$eventdate->DateName.'<br/>'.$dt->format('F d, Y H:i A').'</li>';
										}
										?>
									</ol>
									</span>
								</div>
							</div>
							<div class='eventlistitemRow'>
							<?php echo $model->Info->Description; ?>	
							</div>
							<?php 
								if(NULL != $model->Registration){
									echo "<a href='http://".$_SERVER['SERVER_NAME']."/registration/".$model->Registration."' >Register</a>";
								}
								else{
									echo "<a href='http://".$_SERVER['SERVER_NAME']."/registration/?e=".$model->Info->EventID."' >Register</a>";
								} 
							?>
						</div>
					</div><!-- #content -->
			</div><!-- #primary -->
		<?php
	}
}

class EventsEditView extends BaseView{
	public function GetView($model){
		?>
			<style>
				.editsection{
					margin:25px;
				}
			</style>
			<div id="primary" class="site-content">
				<div id="content" role="main">
					<div class="wrap">
						<form method='post' data-validate="parsley" id='editEventForm'
							<?php echo 'action=\''.$_SERVER['REQUEST_URI'].'\'';?>
						>
							<div id="EventInfo">
								<h2><?php echo $model->Info->Name; ?></h2>
								<div  
								<?php echo 'style=\'color:red;display:'.((true == $this->ViewBag["ErrorSavingInfo"]) ? 'block' : 'none').';\'';?>
								>
									Error saving event information
								</div>								
								<div class='editsection'>
									<h3>Name:</h3>
									<input type='text' name='eventName' placeholder='Name' data-required="true" value='<?php echo $model->Info->Name; ?>' >
								</div>
								<div class='editsection'>
									<select id="eventTypeDropDown">
										<?php 
											foreach($this->ViewBag["EventTypes"] as $eventTypeId => $eventTypeName){
												echo '<option value="'.$eventTypeId.'" >'.$eventTypeName.'</option>';
											}
										?>
									</select>
								</div>
								<div class='editsection'>
									<h3>Description:</h3>
									<?php wp_editor( $model->Info->Description, 'descriptionEditor', array('textarea_name'=>'descriptionEditor')); ?>
								</div>
								<div class='editsection' style="height:50px; width:95%;">
									<div style="float:left;">
										<h3>Date</h3>
										<div class='EventDates'>
											<input type="text" class="datePickerClass" id="EventDatePicker" placeholder='Select Date' data-required="true" name="EventDates" value='<?php echo $model->Info->EventDate; ?>' />
										</div>
									</div>
									<div style="float:left; padding-left:30px;">
										<h3>Time</h3>
										<div class='EventDates'>
											<?php $this->GetTimePicker("EventDatePickerTime", $model->Info->Time, true);?>
										</div>
									</div>
								</div>
								<div class='editsection'>
									<h3>Location:</h3>
									<input type='text' name='EventLocationAddress' style='width:200px' placeholder='Address' value='<?php echo $model->Info->LocationAddress; ?>'/><br/>
									<input type='text' name='EventLocationAddress2' style='width:200px' placeholder='Address2' value='<?php echo $model->Info->LocationAddress2; ?>'/><br/>
									<input type='text' name='EventLocationCity' style='width:150px' placeholder='City' value='<?php echo $model->Info->LocationCity; ?>'/>
									<?php $this->GetStatesDropdown('EventLocationState', $model->Info->LocationState);?>
									<br/>
									<input type='text' name='EventLocationZip' style='width:200px' placeholder='Zip' value='<?php echo $model->Info->LocationZip; ?>'/>
								</div>
							</div>
							
							<input type="submit" value="Save" id='btnSave' /><input type="button" value="Cancel" />
						</form>
					</div>
				</div><!-- #content -->
			</div><!-- #primary -->
			<script id="EditEventInfoTemplate"  type="text/x-jquery-tmpl">
			
			</script>
			<script>
				var viewmodel = {};
				<?php echo "viewmodel.data=".json_encode($model->Info).";" ;?>
				viewmodel.Init = function(){
					//bind states dropdown value
					//bind description editor value
					jQuery("#eventTypeDropDown").val('<?php echo $model->Info->EventTypeID;?>');
					jQuery(".datePickerClass").datepicker( "option", "dateFormat", "mm/dd/yy" );
					$('#btnSave').click(viewmodel.Valdate);
				};
				viewmodel.Init();

				viewmodel.Valdate = function(){
				    $('#editEventForm').parsley( 'validate' );
				}
				
			</script>
		<?php
		
	}
}


?>
