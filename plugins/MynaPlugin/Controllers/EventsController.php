<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/BaseController.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Models/EventsModels.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Views/EventsViews.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Utility/Utility.php');

class EventsController extends BaseController{

	public function Actions(){
	
		$currentUrl =$_SERVER['REQUEST_URI'];
		$action = 'view';
		if(isset($_REQUEST['a']) && false == empty($_REQUEST['a'])){
			$action = $_REQUEST['a'];
		}
		
		if(false == Utility::endswith($currentUrl,'/events/') && $action == 'view'){
			$eventId = $this->GetEventIDFromUrl($currentUrl);
			$this->GetEventInfo($eventId);
		}
		else if(false == Utility::endswith($currentUrl,'/events/') && $action == 'edit'){
			$eventId = $this->GetEventIDFromUrl($currentUrl);
			$this->EditEventInfo($eventId);
		}
		else{
			//default
			$this->GetEventsList();
		}
		
	}
	
	function GetEventsList(){
		$view = new EventListView();
		$model = new EventListModel();
		$model->LatestEvents = $this->sqldatalayer->GetLatestEvents();
		foreach($model->LatestEvents as $event){
			$model->EventDates[$event->EventID] = $this->sqldatalayer->GetEventDates($event->EventID);
		}
		$view->GetView($model);
	}
	
	function GetEventInfo($eventId ){
		$view = new EventInfoView();
		$model = new EventInfoModel();
		$model->Info = $this->sqldatalayer->GetEventInfo($eventId);
		$model->EventDates = $this->sqldatalayer->GetEventDates($eventId);
		$view->GetView($model);
	}
	
	function EditEventInfo($eventId){
		$view = new EventsEditView();
		$model = new EventInfoModel();
		
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$eventInfo = $this->populateWithPost();
			$successfullySaved = $this->sqldatalayer->SaveEventInfo($eventId, $eventInfo);
			if(true == $successfullySaved){
				$this->redirect('/events/'.$eventId);
			}else{
				$model->ErrorSavingInfo = true;
			}
		}
		
		$model->Info = $this->sqldatalayer->GetEventInfo($eventId);
		$view->GetView($model);
	}
	
	
	function GetEventIDFromUrl($url){
		preg_match_all('^\d+^',$url,$matches,PREG_PATTERN_ORDER);
		$arraylen = count($matches[0]);
		if(0 < $arraylen){
	        return intval($matches[0][$arraylen-1]);
		}
		return -1;
	}

}

?>
