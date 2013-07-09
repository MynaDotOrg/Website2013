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
			$registrationId = $this->GetIDFromUrl($currentUrl);
			$this->GetRegistrationForm($registrationId);
		}
		else if(false == Utility::endswith($currentUrl,'/registration/') && $action == 'edit'){
			$registrationId = $this->GetIDFromUrl($currentUrl);
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
	
	function GetIDFromUrl($url){
		preg_match_all('^\d+^',$url,$matches,PREG_PATTERN_ORDER);
		$arraylen = count($matches[0]);
		if(0 < $arraylen){
			return intval($matches[0][$arraylen-1]);
		}
		return -1;
	}
}

?>