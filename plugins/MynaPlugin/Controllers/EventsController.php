<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/BaseController.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Models/EventsModels.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Views/EventsViews.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Views/ErrorViews.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Utility/Utility.php');

class EventType
{
	const Camp = 1;
	const Seminar = 2;
	const Fundraser = 3;
}

class EventsController extends BaseController{

	public function Actions(){
	
		$currentUrl =$_SERVER['REQUEST_URI'];
		$action = 'view';
		if(isset($_REQUEST['a']) && false == empty($_REQUEST['a'])){
			$action = $_REQUEST['a'];
		}
		
		if(false == Utility::endswith($currentUrl,'/events/') && $action == 'view'){
			$eventId = $this->GetIDFromUrl($currentUrl);
			$this->GetEventInfo($eventId);
		}
		else if(false == Utility::endswith($currentUrl,'/events/') && $action == 'edit'){
			$eventId = $this->GetIDFromUrl($currentUrl);
			$this->EditEventInfo($eventId);
		}
		else if(false == Utility::endswith($currentURl, '/events/')&& $action == 'new'){
			$this->NewEventInfo();
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
			$eventDates = $this->sqldatalayer->GetEventDates($event->EventID);
			$event->EventDates = array();
			foreach ( $eventDates as $eventdate )
			{
				$edt = new StdClass();
				$dt = new DateTime($eventdate->StartDateTime);
				$edt->StartDateTime = $dt->format('F d, Y H:i A');
				$dt = new DateTime($eventdate->EndDateTime);
				$edt->EndDateTime = $dt->format('F d, Y H:i A');
				$event->EventDates[] = $edt;
			}
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
		if(true == $this->usrService->UserIsAtLeast(UserType::Advisor,UserType::Officer,UserType::Administrator)){
			$view = new EventsEditView();
			$model = new EventInfoModel();
			$this->SetEventTypes($view);
			if(true == $this->RequestIsPost()){
				$eventInfo = $this->populateWithPost();
				$successfullySaved = $this->sqldatalayer->SaveEventInfo($eventId, $eventInfo);
				if(true == $successfullySaved){
					$this->redirect('/events/'.$eventId);
				}else{
					$view->ViewBag["ErrorSavingInfo"] = true;
				}
			}
			$model->Info = $this->sqldatalayer->GetEventInfo($eventId);
			$view->GetView($model);
		}
		else{
			$this->ShowPermissionsError();
		}
	}
	
	function NewEventInfo(){
		if(true == $this->usrService->UserIsAtLeast(UserType::Advisor,UserType::Officer,UserType::Administrator)){
			$model = new EventInfoModel();
			$view = new EventsEditView();
			$this->SetEventTypes($view);
			if(true == $this->RequestIsPost()){
				$eventInfo = $this->populateWithPost();
				$successfullyCreated = $this->sqldatalayer->CreateEventInfo($eventInfo);
				if($successfullyCreated != (-1)){
					//$this->redirect('/events/'.$successfullyCreated);
					$this->redirect('/events/');
				}else{
					$view->ViewBag["ErrorSavingInfo"] = true;
				}
			}
			else{
				$model->Name = 'New Event';
			}
			$view->GetView($model);
		}
		else{
			$this->ShowPermissionsError();
		}
	}	
	
	function GetIDFromUrl($url){
		preg_match_all('^\d+^',$url,$matches,PREG_PATTERN_ORDER);
		$arraylen = count($matches[0]);
		if(0 < $arraylen){
	        return intval($matches[0][$arraylen-1]);
		}
		return -1;
	}
	
	function SetEventTypes(&$view){
		$view->ViewBag["EventTypes"] = array(EventType::Camp=>"Camp",EventType::Seminar=>"Seminar",EventType::Fundraser=>"Fundraser");
	}

}

?>
