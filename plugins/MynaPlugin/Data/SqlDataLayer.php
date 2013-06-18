<?php

class SqlDataLayer{
	
	private $wpdbservice;
	
	function __construct($wpdb){
		$this->wpdbservice = $wpdb;
	}
	
	

	public function GetLatestEvents(){
		$results = $this->wpdbservice->get_results(
				'
				SELECT *
				FROM  Myna_Events
			'
		);
		return $results;
	}

	public function GetEventInfo($eventID){
		$results = $this->wpdbservice->get_results(
				$this->wpdbservice->prepare(
						'
				SELECT *
				FROM  Myna_Events
				WHERE EventID = %d
				'
						,$eventID
				)
		);
		if(0 < count($results)){
			return $results[0];
		}
		else{
			return $results;
		} 
	}
	
	public function SaveEventInfo($eventID, $eventInfo){
		return $this->wpdbservice->update(
			'Myna_Events',
			array(
			'Name' => $eventInfo->eventName,
			'Description' => $eventInfo->descriptionEditor,
			'LocationAddress' => $eventInfo->EventLocationAddress,
			'LocationAddress2' => $eventInfo->EventLocationAddress2,
			'LocationCity' => $eventInfo->EventLocationCity,
			'LocationState' => $eventInfo->EventLocationState,
			'LocationZip' => $eventInfo->EventLocationZip
			),
			array( 'EventID' => $eventID ),
			null,
			array( '%d' )
		);
	}

	public function CreateEventInfo($eventInfo){
		$result = $this->wpdbservice->insert(
			'Myna_Events',
			array(
			'Name'=> $eventInfo->eventName,
			'EventTypeID'=>1,		
			'Description'=>$eventInfo->descriptionEditor,
			'LocationAddress'=>$eventInfo->EventLocationAddress,
			'LocationAddress2'=>$eventInfo->EventLocationAddress2,
			'LocationCity'=>$eventInfo->EventLocationCity,
			'LocationState'=>$eventInfo->EventLocationState,
			'LocationZip'=>$eventInfo->EventLocationZip
			),
			array('%s', '%d','%s','%s','%s','%s','%s','%s')
		);
		
		$resultID = $this->wpdbservice>insert_id;

		if(false != $result){
			
			return $resultID;
		}
		else{
			return -1;
		}
	}

	public function GetEventDates($eventID){
		$results = $this->wpdbservice->get_results(
				$this->wpdbservice->prepare(
						'
				SELECT *
				FROM  Myna_EventDates
				WHERE EventID = %d
				'
						,$eventID
				)
		);
		return $results;
	}
	
	public function GetEventsDates($eventsIDs){
		if(0< count($eventsIDs)){
			$events ='';
			foreach ($eventsIDs as $eventID){
				$events = $events.$this->wpdbservice->prepare(',%d',$eventID); 
			}
			$events = substr($events, 1,strlen($events));
			$results = $this->wpdbservice->get_results(
					$this->wpdbservice->prepare(
							'
					SELECT *
					FROM  Myna_EventDates
					WHERE EventID in (%s)
					'
							,$events
					)
			);
		}
		return $results;
	}
}

?>
