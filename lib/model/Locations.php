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
	
	public function getLocationById($id){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->queryDatabse("SELECT * FROM location where id = $id");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	
	public function updateLocation($id,$location){
		
			
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		 $upid = $location->id;
		 $address = $location->address;
		 $cross_street = $location->cross_street;
   	     $lat = $location->lat;
		 $lng = $location->lng;
		 $postal_code = $location->postal_code;
		 $city = $location->city;
		 $state = $location->state;
		 $country = $location->country;
		 $distance = $location->distance;
		 
		
		 	
		$query = "UPDATE location set address = '$address' ,cross_street = '$cross_street' ,lat = '$lat' ,lng = '$lng' ,postal_code = '$postal_code' ,city = '$city' ,state = '$state' ,country = '$country' ,distance = '$distance' where id = $id";
			
		$result = $db->updateDatabase($query);
		$db->closeDBConnection($conn);
		header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	public function insertLocation($location){
				
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$address = $location->address;
		 $cross_street = $location->cross_street;
   	     $lat = $location->lat;
		 $lng = $location->lng;
		 $postal_code = $location->postal_code;
		 $city = $location->city;
		 $state = $location->state;
		 $country = $location->country;
		 $distance = $location->distance;
		 	
		$query = "INSERT into location (address,cross_street,lat,lng,postal_code,city,state,country,distance) Values('$address' ,'$cross_street' ,'$lat' ,'$lng' ,'$postal_code' ,'$city' ,'$state' ,'$country' ,'$distance' )";
			
		$result = $db->updateDatabase($query);
		$id = mysql_insert_id();
		$db->closeDBConnection($conn);
		header("Content-Type: application/json");
		echo json_encode($id);
	}
	
	public function deleteLocation($id){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->updateDatabase("DELETE FROM location where id = $id");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}

}

?>