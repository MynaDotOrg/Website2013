<?php
$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Views/BaseView.php');

class EventListView{
	public function GetView($model){
		?>
				<style>
					.listitem{
						width:85%;
						height:250px;
						border: #cccccc solid 2px;
						margin:30px;
						padding:10px;
						position:relative;
					}
					
					div.listitemColumn{
						margin:10px;
						float:left;
					}
					div.listitemRow{
						margin:10px;
						float:left;
						width:99%;
						height:auto
					}
					div.dockToBottom{
						position: absolute; 
						bottom: 0;
					}
					.listitemimage{
						border:#cccccc solid 2px; 
						padding:4px;
						margin:3px;
					}
				</style>
				<script src="../wp-content/plugins/MynaPlugin/js/jquery.tmpl.min.js"></script>
				<div id="primary" class="site-content">
					<div id="content" role="main">
		
						<h2>Events</h2>
						<div class="wrap" id="EventList">
						
						</div>			
					</div><!-- #content -->
				</div><!-- #primary -->
				<script id="EventItemTemplate" type="text/x-jquery-tmpl">
					<div class='listitem'>
						<h4>
							${Name}
						</h4>
						<div class="listitemRow">
							<div class="listitemColumn">
								<span style='float:left;'>
									<img src='../wp-content/plugins/MynaPlugin/images/camping_default.jpg' class='listitemimage'/>
								</span>
							</div>
							<div class="listitemColumn">
								<span style='vertical-align:top;'>													
									<b>Location</b><br/>
									${LocationAddress}<br/>
									${LocationCity},
									${LocationState}<br/>
									${LocationZip}
								</span>
							</div>
							<div class="listitemColumn">
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
						<div class="listitemRow dockToBottom">
							<a style='width:10px;' 
							<?php echo ' href=\'http://108.166.98.208/events/'.$LatestEvent->EventID.'\'' ;?>
								><input type="button" value="More Info..." />
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
				<?php echo "viewmodel.data=".json_encode($model).";" ;?>
				viewmodel.Init = function(){
					jQuery("#EventItemTemplate").tmpl(viewmodel.data.LatestEvents).appendTo("#EventList");
				};
				viewmodel.Init();
				</script>
		<?php
	}
}

class EventInfoView{
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
								<h2>
								<?php echo $model->Info->Name; ?>
								</h2>
								<div 
								<?php echo 'style=\'color:red;display:'.((true == $model->ErrorSavingInfo) ? 'block' : 'none').';\'';?>
								>
									Error saving event information
								</div>								
								<div class='editsection'>
									<h3>Name:</h3>
									<?php echo '<input type=\'text\' name=\'eventName\' value=\''.$model->Info->Name.'\' >'; ?>
								</div>
								<div>
									<select>
										
									</select>
								</div>
								<div class='editsection'>
									<h3>Description:</h3>
									<?php wp_editor( $model->Info->Description, 'descriptionEditor', array('textarea_name'=>'descriptionEditor'));?>
								</div>
								<div class='editsection'>
									<h3>Location:</h3>
									<input type='text' name='EventLocationAddress' style='width:200px'
									<?php echo ' value=\''.$model->Info->LocationAddress.'\''; ?>
									 /><br/>
									<input type='text' name='EventLocationAddress2' style='width:200px'
									<?php echo ' value=\''.$model->Info->LocationAddress2.'\' '; ?>
									 /><br/>
									<input type='text' name='EventLocationCity' style='width:150px'
									<?php echo ' value=\''.$model->Info->LocationCity.'\' '; ?>
									/>
									<?php $this->GetStatesDropdown('EventLocationState', $model->Info->LocationState);?>
									<br/>
									<input type='text' name='EventLocationZip' style='width:200px'
									<?php echo ' value=\''.$model->Info->LocationZip.'\' '; ?>
									/>
								</div>
								<input type="submit" value="Save" /><input type="button" value="Cancel" />
							</form>
						</div>
					</div><!-- #content -->
			</div><!-- #primary -->
		<?php
	}
}


?>
