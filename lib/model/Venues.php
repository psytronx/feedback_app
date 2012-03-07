<?php
require_once("../lib/DatabaseConnection.php");

Class Venues
{
	
   public function getVenuesByContactId($id){
	
	 	$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		$query = "SELECT v.id,v.name,v.location_id,vc.isOwner,vc.isManger,l.address,l.cross_street,l.lat,l.lng,l.postal_code,l.city,l.state,l.country,l.distance FROM venuecontacts vc join venue v on v.id = vc.venue_id  join location l on v.location_id = l.id where contact_id = $id";
		$result = $db->queryDatabse($query);
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	
	}
	
	public function getVenues(){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->queryDatabse("SELECT * FROM venue");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	public function getVenueById($id){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->queryDatabse("SELECT * FROM venue where id = $id");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	
	public function updateVenue($id,$venue){
		
			
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		 $upid = $venue->id;
		 $name = $venue->name;
		 $location_id = $venue->location_id;
   	     
		 	 	
		$query = "UPDATE venue set location_id = '$location_id' ,name = '$name' where id = $id";
			
		$result = $db->updateDatabase($query);
		$db->closeDBConnection($conn);
		header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	public function insertVenue($venue){
				
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
			 
		$name = $venue->name;
		$location_id = $venue->location_id;
		 	
		$query = "INSERT into venue (name,location_id) Values('$name' ,'$location_id' )";
			
		$result = $db->updateDatabase($query);
		$id = mysql_insert_id();
		$db->closeDBConnection($conn);
		header("Content-Type: application/json");
		echo json_encode($id);
	}
	
	public function deleteVenue($id){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->updateDatabase("DELETE FROM venue where id = $id");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}
}
?>