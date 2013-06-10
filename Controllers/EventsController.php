<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/BaseController.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Models/EventsModels.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Views/EventsViews.php');

class EventsController extends BaseController{

	public function Actions(){
	
		$currentUrl =$_SERVER['REQUEST_URI'];
		if(false == $this->endswith($currentUrl,'/events/')){
			$eventId = $this->GetEventIDFromUrl($currentUrl);
			$this->GetEventInfo($eventId );
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
		$view->GetView($model);
	}
	
	function endswith($string, $test) {
		$strlen = strlen($string);
		$testlen = strlen($test);
		if ($testlen > $strlen) return false;
		return substr_compare($string, $test, -$testlen) === 0;
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
