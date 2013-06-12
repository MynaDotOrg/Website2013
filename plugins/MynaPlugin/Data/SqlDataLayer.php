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