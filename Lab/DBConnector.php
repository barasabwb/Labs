<?php 
// define('DB_Server', 'localhost');
// define('DB_User', 'root');
// define('DB_Pass', '');
// define('DB_Name', 'btc3205');
// /**
  

class DBConnector
{ public $conn;
	
	function __construct()
	{
		$conn = mysqli_connect('localhost','root','','btc3205') or die(mysqli_error());
	
	}
	public function closeDatabase(){
		mysqli_close($conn);
	}
}




 ?>