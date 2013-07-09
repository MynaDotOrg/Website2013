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
}

?>