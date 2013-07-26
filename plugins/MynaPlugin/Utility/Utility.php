<?php

class Utility{

	public static function endswith($string, $test) {
		$strlen = strlen($string);
		$testlen = strlen($test);
		if ($testlen > $strlen) return false;
		return substr_compare($string, $test, -$testlen) === 0;
	}
	
	public static function contains($string){
		if (strpos($string, '.') !== FALSE)
			return true;
		else
			return false;
	}
	
	public static function DateTimeToSqlDate(){
		$datetime = strtotime($mysqldate);
		return date("Y-m-d H:i:s");
	}
	
	public static function SqlDateToDate($mysqldate){
		$datetime = strtotime($mysqldate);
		$phpdate = date("m/d/y", $datetime);
		return $phpdate;
		
	}
	public static function SqlDateToTime($mysqldate){
		$datetime = strtotime($mysqldate);
		$phpdate = date("H:i", $datetime);
		return $phpdate;
	
	}
	
	private static function GetSqlDateString($date, $time){
		//desired format: YYYY-MM-DD HH:MM:SS
		//$date format: mm/dd/yyyy
		//$time format: 0 = midnight, 12 = noon, 13 = 1 pm
		list($mm,$dd,$yyyy) = explode('/',$date);
		if (!checkdate($mm,$dd,$yyyy)) {
			return -1;
		}
		return $yyyy.'-'.$mm.'-'.$dd.' '.$time.':00:00';
	}
}

?>