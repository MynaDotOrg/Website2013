<?php

$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Utility/Utility.php');

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
			$r = $results[0];
			$r->Date = Utility::SqlDateToDate($r->EventDate);
			$r->Time = Utility::SqlDateToTime($r->EventDate);
			return $r;
		}
		else{
			return $results;
		} 
	}
	
	public function SaveEventInfo($eventID, $eventInfo){
		
		$eventDate = Utility::GetSqlDateString($eventInfo->EventDates,$eventInfo->EventDatePickerTime);
		
		return $this->wpdbservice->update(
			'Myna_Events',
			array(
			'Name' => $eventInfo->eventName,
			'Description' => $eventInfo->descriptionEditor,
			'LocationAddress' => $eventInfo->EventLocationAddress,
			'LocationAddress2' => $eventInfo->EventLocationAddress2,
			'LocationCity' => $eventInfo->EventLocationCity,
			'LocationState' => $eventInfo->EventLocationState,
			'LocationZip' => $eventInfo->EventLocationZip,
			'EventDate'=>$eventDate
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
	
	public function GetUsersTypes($userID){
		$results = $this->wpdbservice->get_results(
				$this->wpdbservice->prepare(
						'
				SELECT DISTINCT u2t.UserTypeID
				FROM  Myna_UsersToTypes as u2t
				WHERE u2t.UserID = %d
				'
						,$userID
				)
		);
		return $results;
	}
	
	public function AddUserType($userID, $typeID){
		
		$result = $this->wpdbservice->insert(
				'Myna_UsersToTypes',
				array(
						'UserID'=> $userID,
						'UserTypeID'=> $typeID->UserTypeID
				),
				array('%d', '%d')
		);
	}
	
	public function RemoveUserType($userID, $typeName){
		
	}
	
	public function AddMynaUser($userID){
		$result = $this->wpdbservice->insert(
				'Myna_Users',
				array(
						'UserID'=> $userID
				),
				array('%d')
		);
	}
	
	
	public function GetRegistrationFormEmbedCode($registrationId){
		$results = $this->wpdbservice->get_results(
				$this->wpdbservice->prepare(
						'
						SELECT FormEmbedCode
						FROM Myna_Registrations as r
						WHERE r.RegistrationID = %d
						'
						,$registrationId
				)
		);
		if(0 < count($results)){
			return $results[0];
		}
		else{
			return $results;
		}
	}
	
	public function GetRegistrationEventInfo($registrationId){
		$results = $this->wpdbservice->get_results(
				$this->wpdbservice->prepare(
						'
						SELECT e.*
						FROM Myna_Events AS e
						INNER JOIN Myna_Registrations AS r ON r.EventID = e.EventID
						WHERE r.RegistrationID = %d
						'
						,$registrationId
				)
		);
		if(0 < count($results)){
			return $results[0];
		}
		else{
			return $results;
		} 
	}
	
	public function GetRegistrationIDFromEvent($eventId, $userTypeId){
		$registration = $this->wpdbservice->get_row(
				$this->wpdbservice->prepare(
						"select RegistrationID from Myna_Registrations where EventID = %d and UserTypeID = %d"
						,$eventId,$userTypeId)
		);
		if(NULL != $registration){
			return $registration->RegistrationID;		
		}
		else{
			return null;
		}
	}
	
	public function SaveRegistrationFormEntry($registrationId, $entryId, $userID){
		$previousRegistration = $this->wpdbservice->get_row(
				$this->wpdbservice->prepare(
					"select * from Myna_RegistrationsToUsers where RegistrationID = %d and UserID = %d"
					,$registrationId,$userID)
				);
		if(NULL == $previousRegistration){
			$result = $this->wpdbservice->insert(
					'Myna_RegistrationsToUsers',
					array(
							'RegistrationID'=>$registrationId,
							'UserID'=> $userID,
							'EntryID'=>$entryId
					),
					array('%d','%d','%d')
			);
		}else{
			$result = $this->wpdbservice->update(
					'Myna_RegistrationsToUsers',
					array(
							'EntryID'=>$entryId
					),
					array( 
							'RegistrationID'=>$registrationId,
							'UserID'=> $userID, ),
					array( '%d' ),
					array( '%d' )
			);
		}
	}
	
	public function SaveRegistrationInfo($registrationId, $registrationInfo){
		
		$eventDate = Utility::GetSqlDateString($registrationInfo->RegistrationExpiresDate,$registrationInfo->RegistrationExpiresTime);
		
		$previousRegistration = $this->wpdbservice->get_row(
				$this->wpdbservice->prepare(
						"select * from Myna_Registrations where RegistrationID = %d"
						,$registrationId)
		);
		if(NULL != $previousRegistration){
			$result = $this->wpdbservice->update(
					'Myna_Registrations',
					array(
							'UserTypeID'=>$registrationInfo->UserType,
							'ExpiresOn'=>$eventDate,
							'FormEmbedCode'=>$registrationInfo->EmbedCode
					),
					array( 'RegistrationID'=>$registrationId),
					array( '%d' ),
					array( '%d' )
			);
		}
	}
	
	public function CreateRegistrationInfo($eventId, $registrationInfo){
		$previousRegistration = $this->wpdbservice->get_row(
				$this->wpdbservice->prepare(
						"select * from Myna_Registrations where RegistrationID = %d"
						,$registrationId,$userID)
		);
	}
						
						
	
	
}

?>
