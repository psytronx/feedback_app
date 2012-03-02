<?php
require_once("../lib/DatabaseConnection.php");


Class Locations
{

	public function getLocations(){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->queryDatabse("SELECT * FROM location");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}

}

?>