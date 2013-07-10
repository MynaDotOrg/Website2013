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
							<div class='infosection'>
								<table style="width:400px;">
									<tr>
										<td>
											<span style="width:200px;">
												<h3>Location</h3>
												<?php echo $model->Info->LocationAddress; ?><br/>
												<?php echo $model->Info->LocationCity; ?>,
												<?php echo $model->Info->LocationState; ?><br/>
												<?php echo $model->Info->LocationZip; ?>
											</span>
										</td>
										<td>
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
										</td>
									</tr>
								</table>
							</div>
							<div class='infosection'>
							<?php echo $model->Info->Description; ?>	
							</div>
							<input type="button" value="Register" />
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
						<form method='post'
							<?php echo 'action=\''.$_SERVER['REQUEST_URI'].'\'';?>
						>
							<div id="EventInfo"></div>
							
							<input type="submit" value="Save" /><input type="button" value="Cancel" />
						</form>
					</div>
				</div><!-- #content -->
			</div><!-- #primary -->
			<script id="EditEventInfoTemplate"  type="text/x-jquery-tmpl">
			<h2>${Name}</h2>
			<div  
			<?php echo 'style=\'color:red;display:'.((true == $this->ViewBag["ErrorSavingInfo"]) ? 'block' : 'none').';\'';?>
			>
				Error saving event information
			</div>								
			<div class='editsection'>
				<h3>Name:</h3>
				<input type='text' name='eventName' value='${Name}' >
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
				
			</div>
			<div class='editsection'>
				<h3>Date</h3>
				<div class='EventDates'>
					<input type="text" class="datePickerClass" id="EventDatePicker" name="EventDates" value='${EventDate}' />
				</div>
			</div>
			<div class='editsection'>
				<h3>Location:</h3>
				<input type='text' name='EventLocationAddress' style='width:200px' value='${LocationAddress}'/><br/>
				<input type='text' name='EventLocationAddress2' style='width:200px' value='${LocationAddress2}'/><br/>
				<input type='text' name='EventLocationCity' style='width:150px' value='${LocationCity}'/>
				<?php $this->GetStatesDropdown('EventLocationState', $model->Info->LocationState);?>
				<br/>
				<input type='text' name='EventLocationZip' style='width:200px' value='${LocationZip}'/>
			</div>
			</script>
			<script>
				var viewmodel = {};
				<?php echo "viewmodel.data=".json_encode($model->Info).";" ;?>
				viewmodel.Init = function(){
					jQuery("#EditEventInfoTemplate").tmpl(viewmodel.data).appendTo("#EventInfo");
					//bind states dropdown value
					//bind description editor value
					jQuery("#eventTypeDropDown").val('<?php echo $model->Info->EventTypeID;?>');
					jQuery(".datePickerClass").datepicker();
				};
				viewmodel.Init();
				
			</script>
		<?php
	}
}


?>
