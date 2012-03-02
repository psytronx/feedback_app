<?php
require_once("../lib/DatabaseConnection.php");


Class Contacts
{

	public function getContacts(){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->queryDatabse("SELECT * FROM contact");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	public function getContactsById($id){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->queryDatabse("SELECT * FROM contact where id = $id");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	
	public function updateContact($id,$contact){
		
			
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		 $upid = $contact->id;
		 $fName = $contact->first_name;
		 $lName = $contact->last_name;
		 	
		$query = "UPDATE contact set first_name = '$fName' ,last_name = '$lName' where id = $id";
			
		$result = $db->updateDatabase($query);
		$db->closeDBConnection($conn);
		header("Content-Type: application/json");
		echo json_encode($result);
	}

}

?>