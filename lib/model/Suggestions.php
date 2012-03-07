<?php
require_once("../lib/DatabaseConnection.php");

Class Suggestions
{
	public function getSuggestionsByUser($id){
		
			$db = new DatabaseConnection();
			$conn = $db->connectToDB();
			$query = "SELECT s.id,s.data from Suggestion s join userSuggestions us on us.suggestion_id = s.id where us.user_id = $id";
			$result = $db->queryDatabse($query);
			$db->closeDBConnection($conn);
	    	header("Content-Type: application/json");
			echo json_encode($result);
	}
	
	public function getSuggestionsByVenue($id){
		
			$db = new DatabaseConnection();
			$conn = $db->connectToDB();
			$query = "SELECT s.id,s.data from Suggestion s join venueSuggestions vs on vs.suggestion_id = s.id where vs.venue_id = $id";
			$result = $db->queryDatabse($query);
			$db->closeDBConnection($conn);
	    	header("Content-Type: application/json");
			echo json_encode($result);
	}
	
	public function getSuggestionsByID($id){
		
			$db = new DatabaseConnection();
			$conn = $db->connectToDB();
			$query = "SELECT s.id,s.data from Suggestion s where s.id = $id";
			$result = $db->queryDatabse($query);
			$db->closeDBConnection($conn);
	    	header("Content-Type: application/json");
			echo json_encode($result);
	}
	
	public function getSuggestions(){
		
			$db = new DatabaseConnection();
			$conn = $db->connectToDB();
			$query = "SELECT s.id,s.data from Suggestion s ";
			$result = $db->queryDatabse($query);
			$db->closeDBConnection($conn);
	    	header("Content-Type: application/json");
			echo json_encode($result);
	}
	
	public function updateSuggestion($id,$suggestion){
		
			
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		 $upid = $suggestion->id;
		 $data = $suggestion->data;
		 	
		$query = "UPDATE suggestion set data = '$data' where id = $id";
			
		$result = $db->updateDatabase($query);
		$db->closeDBConnection($conn);
		header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	public function insertSuggestion($suggestion){
	
				
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$data = $suggestion->data;
		$user_id = $suggestion->user_id;
		$venue_id = $suggestion->venue_id;
		
		$query = "INSERT into suggestion (data) Values('$data')"; 		 	
		$result = $db->updateDatabase($query);
		$sugg_id = mysql_insert_id();
					
		if ($sugg_id){
			$query_in_user_suggestions = "INSERT into userSuggestions (user_id,suggestion_id) Values($user_id ,$sugg_id )";
			$result = $db->updateDatabase($query_in_user_suggestions);
		    $query_in_venue_suggestions = "INSERT into venueSuggestions (venue_id,suggestion_id) Values($venue_id ,$sugg_id )";		
			$result = $db->updateDatabase($query_in_venue_suggestions);
		 
			$db->closeDBConnection($conn);
			header("Content-Type: application/json");
			echo json_encode("Added Suggestion");
		}	
		else{
			header("Content-Type: application/json");
			echo json_encode("Unable to Add Suggestion");
		}		
		
	}
	
	
	public function deleteSuggestion($id){
		
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$query = "DELETE from userSuggestions where suggestion_id = $id"; 		 	
		$r1 = $db->updateDatabase($query);
		
		
		$query = "DELETE from venueSuggestions where suggestion_id = $id"; 		 	
		$r2 = $db->updateDatabase($query);
		
		
		$query = "DELETE from suggestion where id = $id"; 		 	
		$r3 = $db->updateDatabase($query);
		
		
		if($r1 == $r2)
			echo json_encode("Suggestion Deleted");
		else
			echo json_encode("Error Deleting Suggestion");
			
		
	}
	
}

?>