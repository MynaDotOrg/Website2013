<?php

class UserType
{
	const Administrator = 1;
	const Advisor = 2;
	const Camper = 3;
	const Counselor = 4;
	const Officer = 5;
	const _Parent = 6;
}

class UsersService{
	
	private $sqldatalayer;
	
	function __construct($sqllayer){
		$this->sqldatalayer = $sqllayer;
	}
	
	public function GetCurrentUserTypes(){
		if(true == is_user_logged_in()){
			$current_user = wp_get_current_user();
			$types = $this->sqldatalayer->GetUsersTypes($current_user->ID);
			return $types;
		}
		else{
			return array();	
		}
	}
	
	public function UserIs(){
		if(true == is_user_logged_in()){
			$args = array();
			for($i = 0 ; $i < func_num_args(); $i++) {
				$args[$i] = func_get_arg($i);
			}
			$types = $this->GetCurrentUserTypes();
			$userIsTypes = true;
			foreach ($args as $arg){
				$isType = false;
				foreach ($types as $type){
					if($arg == $type->UserTypeID){
						$isType = true;
					}
				}
				if(false == $isType){
					$userIsTypes = false;
					break;
				}
			}
			return $userIsTypes;
		}
		else{
			return false;
		}
	}
	
	public function UserIsAtLeast(){
		if(true == is_user_logged_in()){
			if(count($args)==0){
				return true;
			}
			$args = array();
			for($i = 0 ; $i < func_num_args(); $i++) {
				$args[$i] = func_get_arg($i);
			}
			$types = $this->GetCurrentUserTypes();
			
			$userIsTypes = false;
			foreach ($args as $arg){
				$isType = false;
				foreach ($types as $type){
					if($arg == type){
						$isType = true;
					}
				}
				if(true == $isType){
					$userIsTypes = true;
					break;
				}
			}
			return $userIsTypes;
		}
		else{
			return false;
		}
	}
	
	public function AddUserTypeToCurrentUser(){
		$current_user = wp_get_current_user();
		$type = $this->sqldatalayer->GetUserType($current_user->ID);
	}
}



?>