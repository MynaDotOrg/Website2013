<?php


class EventListView{
	public function GetView($model){
		?>
				<style>
					.listitem{
						width:85%;
						height:170px;
						border: #cccccc solid 2px;
						margin:30px;
						padding:10px;
					}
					
					.listitembox{
						margin:10px;
					}
					.listitemimage{
						border:#cccccc solid 2px; 
						padding:4px;
						margin:10px;
					}
				</style>
		
				<div id="primary" class="site-content">
					<div id="content" role="main">
		
						<h2>Events</h2>
						<div class="wrap">
							
							<?php   
							try {
								
								foreach ( $model->LatestEvents as $LatestEvent ) 
								{
									//$LatestEvent->Name,$LatestEvent->Description
									?>
									<div class='listitem'>
										<h4>
										<?php echo $LatestEvent->Name; ?>
										</h4>
										<image src='../wp-content/plugins/MynaPlugin/images/camping_default.jpg' class='listitemimage' style='float:left;'/>
										
										<ol id="EventDatesList">
											<?php
											foreach ( $model->EventDates[$LatestEvent->EventID] as $eventdate ) 
											{
												$dt = new DateTime($eventdate->StartDateTime);
												echo '<li>'.$dt->format('F d, Y H:i A').'</li>';
											}
											?>
										</ol>
										<div style='width:100%; text-alignment:center;margin-top:35px;'>
											<input type="button" value="More Info..." /><input type="button" value="Register" />
										</div>
									</div>
									<?php
								}
							} catch (Exception $e) {
								echo 'Caught exception: '.$e->getMessage().'\n';
							}
							?>
							
						</div>			
					</div><!-- #content -->
				</div><!-- #primary -->
		<?php
	}
}

class EventInfoView{
	public function GetView($model){
		?>
			<div id="primary" class="site-content">
					<div id="content" role="main">
						<div class="wrap">
							<h2>
							<?php echo $model->Info->Name; ?>
							</h2>
						</div>
					</div><!-- #content -->
			</div><!-- #primary -->
		<?php
	}
}

class EventsEditView{
	public function GetView($model){
		echo 'events info view';
	
	}
}


?>
