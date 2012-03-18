<?php
Class DatabaseConnection
{
	// define properties
		public $dbServer;
		public $userName;
		public $password;
		public $database;
		
		public $dbConn;
	
	//constructor
	public function __construct() {
        $this->dbServer = DB_HOST;
		$this->userName = DB_USER;
        $this->password = DB_PASS;
		$this->database = DB_NAME;
    }

	public function connectToDB(){
		$this->dbConn = mysql_connect($this->dbServer,$this->userName,$this->password);
		
		$conn = $this->dbConn;
		
		if (!$conn) {
		  echo( "<P>Unable to connect to the " .
		        "database server at this time.</P>" );
		  exit();
		}
		
		$db_selected = mysql_select_db($this->database, $conn);
		
		if (! $db_selected ) {
		  echo( "<P>Unable to locate the selected " .
		        "database at this time.</P>" );
		  exit();
		}
		
		return $conn;
	}
	
	public function queryDatabse($query){
		
		$result = mysql_query($query);
		$rows = array();
		
		  if (!$result) {
		    echo("<P>Error performing query: " .
		         mysql_error() . "</P>");
		    exit();
		  }

		  while ( $row = mysql_fetch_assoc($result) ) {
		    	array_push($rows, $row);
		  }
		
		return $rows;
		
	}
	
	public function updateDatabase($query){
		$result = mysql_query($query);
		return $result;
	}
	
	public function closeDBConnection($connection){
		
	  $status =	mysql_close($connection);
	
   		return $status;	
	}
	
	
}

?>