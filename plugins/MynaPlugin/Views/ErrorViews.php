<?php
$root = $_SERVER["DOCUMENT_ROOT"];
require_once($root.'/wp-content/plugins/MynaPlugin/Views/BaseView.php');

class PermissionsErrorView{
	public function GetView($model){
		?>
		
			<span style="color:red;">There was an error, you don't have permissions to view that.</span>
		
		<?php		
	}
}

?>