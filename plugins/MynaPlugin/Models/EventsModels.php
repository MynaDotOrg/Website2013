<?php

class EventListModel{
	public $LatestEvents;
}

class EventInfoModel{
	public $Info;
	public $Registration;
	public function GetPostMap($eventID, $eventInfoPost){
		return array(
				"eventName"=>"Name",
				"descriptionEditor"=>"Description",
				"EventLocationAddress"=>"LocationAddress",
				"EventLocationAddress2"=>"LocationAddress2",
				"EventLocationCity"=>"LocationCity",
				"EventLocationState"=>"LocationState",
				"EventLocationZip"=>"LocationZip",
				"EventDates"=>"Date",
				"EventDatePickerTime"=>"Time"
				);
	}
	public function GetRequiredFields(){
		return array("Name", "Date","Time");
	}
}

?>