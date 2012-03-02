<?php
require_once("../lib/DatabaseConnection.php");


Class Users
{

	public function getUsers(){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->queryDatabse("SELECT * FROM user");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	public function getUsersById($id){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->queryDatabse("SELECT * FROM user where id = $id");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	
	public function updateUser($id,$user){
		
			
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		 $upid = $user->id;
		 $fName = $user->first_name;
		 $lName = $user->last_name;
		 $nName = $user->nick_name;
		 	
		$query = "UPDATE user set first_name = '$fName' ,last_name = '$lName' ,nick_name = '$nName' where id = $id";
			
		$result = $db->updateDatabase($query);
		$db->closeDBConnection($conn);
		header("Content-Type: application/json");
		echo json_encode($result);
	}
	
	public function insertUser($user){
				
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		 $fName = $user->first_name;
		 $lName = $user->last_name;
		 $nName = $user->nick_name;
		 	
		$query = "INSERT into user (first_name,last_name,nick_name) Values('$fName' ,'$lName','$nName' )";
			
		$result = $db->updateDatabase($query);
		$id = mysql_insert_id();
		$db->closeDBConnection($conn);
		header("Content-Type: application/json");
		echo json_encode($id);
	}
	
	public function deleteUser($id){	
		$db = new DatabaseConnection();
		$conn = $db->connectToDB();
		
		$result = $db->updateDatabase("DELETE FROM user where id = $id");
		$db->closeDBConnection($conn);
    	header("Content-Type: application/json");
		echo json_encode($result);
	}

}

?>