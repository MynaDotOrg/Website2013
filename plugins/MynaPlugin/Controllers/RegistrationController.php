<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Controllers/BaseController.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Models/RegistrationModels.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Views/RegistrationViews.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Views/ErrorViews.php');
require_once($root.'/wp-content/plugins/MynaPlugin/Utility/Utility.php');

class RegistrationController extends BaseController{

	public function Actions(){

		$currentUrl =$_SERVER['REQUEST_URI'];
		$action = 'view';
		if(isset($_REQUEST['a']) && false == empty($_REQUEST['a'])){
			$action = $_REQUEST['a'];
		}

		if(false == Utility::endswith($currentUrl,'/registration/') && $action == 'view'){
			$registrationId = $this->GetIDFromUrl();
			$this->GetRegistrationForm($registrationId);
		}
		else if(false == Utility::endswith($currentUrl,'/registration/') && $action == 'complete'){
			$registrationId = $this->GetIDFromUrl();
			$entryID = $this->GetFormEntryIDFromUrl();
			$this->GetRegistrationFormCompleted($registrationId,$entryID);
		}
		else if(false == Utility::endswith($currentUrl,'/registration/') && $action == 'edit'){
			$registrationId = $this->GetIDFromUrl();
			$this->EditEventInfo($registrationId);
		}
		else if(false == Utility::endswith($currentURl, '/registration/')&& $action == 'new'){
			$this->NewEventInfo();
		}
		else{
			//default
			//$this->GetEventsList();
			//error page or redirect to event list?
			echo "error, you must have a registration id";
		}

	}
	
	public function GetRegistrationForm($registrationId){
		$view = new RegistrationFormView();
		$model = new RegistrationFormModel();
		$model->FormInfo = $this->sqldatalayer->GetRegistrationFormEmbedCode($registrationId);
		$model->EventInfo = $this->sqldatalayer->GetRegistrationEventInfo($registrationId);
		//need to add error handling if registraion id doesn't exist
		$view->GetView($model);
	}
	
	public function GetRegistrationFormCompleted($registrationId, $entryId){
		$view = new RegistrationCompletedView();
		$model = new RegistrationFormModel();
		
		$userID = $this->usrService->GetCurrentUserID();
		
		$model->EventInfo = $this->sqldatalayer->GetRegistrationEventInfo($registrationId);
		$this->sqldatalayer->SaveRegistrationFormEntry($registrationId, $entryId, $userID);
		
		$view->GetView($model);
	}
	
	function GetIDFromUrl(){
		$pos = strpos($_SERVER['REQUEST_URI'], $_SERVER['QUERY_STRING']);
		$asd = substr($_SERVER['REQUEST_URI'], 0, $pos - 2);
		$asd = substr($asd, strlen($_SERVER['SCRIPT_NAME']) + 1);
		preg_match_all('^\d+^',$asd,$matches,PREG_PATTERN_ORDER);
		$arraylen = count($matches[0]);
		if(0 < $arraylen){
			return intval($matches[0][$arraylen-1]);
		}
		return -1;
	}
	
	function GetFormEntryIDFromUrl(){
		$entryId = 0;
		if(isset($_REQUEST['eid']) && false == empty($_REQUEST['eid'])){
			$entryId = intval($_REQUEST['eid']);
		}
		return $entryId;
	}
}

?>