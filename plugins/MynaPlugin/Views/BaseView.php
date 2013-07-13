<?php

class BaseView{
	function __construct(){
		$ViewBag= array();
	}
	public $ViewBag;
	
	public function GetStatesDropdown($controlName, $selectedValue){
		?>
		<select
		<?php echo 'name=\''.$controlName.'\'' ;?>
		>
		<?php 
		$states = array(	
			'AL'=>'Alabama',
			'AK'=>'Alaska',
			'AZ'=>'Arizona',
			'AR'=>'Arkansas',
			'CA'=>'California',
			'CO'=>'Colorado',
			'CT'=>'Connecticut',
			'DE'=>'Delaware',
			'DC'=>'District of Columbia',
			'FL'=>'Florida',
			'GA'=>'Georgia',
			'HI'=>'Hawaii',
			'ID'=>'Idaho',
			'IL'=>'Illinois',
			'IN'=>'Indiana',
			'IA'=>'Iowa',
			'KS'=>'Kansas',
			'KY'=>'Kentucky',
			'LA'=>'Louisiana',
			'ME'=>'Maine',
			'MD'=>'Maryland',
			'MA'=>'Massachusetts',
			'MI'=>'Michigan',
			'MN'=>'Minnesota',
			'MS'=>'Mississippi',
			'MO'=>'Missouri',
			'MT'=>'Montana',
			'NE'=>'Nebraska',
			'NV'=>'Nevada',
			'NH'=>'New Hampshire',
			'NJ'=>'New Jersey',
			'NM'=>'New Mexico',
			'NY'=>'New York',
			'NC'=>'North Carolina',
			'ND'=>'North Dakota',
			'OH'=>'Ohio',
			'OK'=>'Oklahoma',
			'OR'=>'Oregon',
			'PA'=>'Pennsylvania',
			'RI'=>'Rhode Island',
			'SC'=>'South Carolina',
			'SD'=>'South Dakota',
			'TN'=>'Tennessee',
			'TX'=>'Texas',
			'UT'=>'Utah',
			'VT'=>'Vermont',
			'VA'=>'Virginia',
			'WA'=>'Washington',
			'WV'=>'West Virginia',
			'WI'=>'Wisconsin',
			'WY'=>'Wyoming');
			
			echo'<option value=\'\'>Select a State...</option>';
			
			foreach($states as $key=>$val){
				if($selectedValue == $key){				
					echo '<option value=\''.$key.'\' selected>'.$val.'</option>';
				}else{
					echo '<option value=\''.$key.'\'>'.$val.'</option>';
				}
			}
		?>
		</select>
		<?php 
	}
	
	function GetTimePicker($controlName, $selectedValue){
		?>
			<select
		<?php echo 'name=\''.$controlName.'\'' ;?>
		>
		<?php 
		$times = array( 
			'0'=>'12 AM',
			'1'=>'1 AM',
			'2'=>'2 AM',
			'3'=>'3 AM',
			'4'=>'4 AM',
			'5'=>'5 AM',
			'6'=>'6 AM',
			'7'=>'7 AM',
			'8'=>'8 AM',
			'9'=>'9 AM',
			'10'=>'10 AM',
			'11'=>'11 AM',
			'12'=>'12 AM',
			'13'=>'1 PM',
			'14'=>'2 PM',
			'15'=>'3 PM',
			'16'=>'4 PM',
			'17'=>'5 PM',
			'18'=>'6 PM',
			'19'=>'7 PM',
			'20'=>'8 PM',
			'21'=>'9 PM',
			'22'=>'10 PM',
			'23'=>'11 PM');

			echo'<option value=\'\'>Select a Time...</option>';
				
			foreach($times as $key=>$val){
				if($selectedValue == $key){
					echo '<option value=\''.$key.'\' selected>'.$val.'</option>';
				}else{
					echo '<option value=\''.$key.'\'>'.$val.'</option>';
				}
			}
			?>
		</select>
		<?php 
	}
}

?>