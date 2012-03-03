<?php
require_once("../lib/DatabaseConnection.php");

Class Venue
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
}
?>