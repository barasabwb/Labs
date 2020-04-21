<?php 

include "Crud.php";
include_once "DBConnector.php";
/**
 * 
 */
class User implements Crud
{ private $user_id;
	private $first_name;
	private $last_name;
	private $city_name;
		


	
	
	function __construct($first_name,$last_name,$city_name)
	{
		
		$this->first_name = $first_name;
		$this->last_name = $last_name;
		$this->city_name = $city_name;
	}
	public function setUserId($user_id){
		$this->user_id = $user_id;
	}
	public function getUserId($user_id){
		return $this->user_id;
	}
	public function save($conn){
		$conn = mysqli_connect('localhost','root','','btc3205') or die(mysqli_error());
	$fn = $this->first_name;
	$ln = $this->last_name;
	$city = $this->city_name;
	$res = mysqli_query($conn,"INSERT INTO user(first_name,last_name,user_city) VALUES('$fn','$ln','$city')") or die("Error".mysqli_error());


	return $res;
}

	public function readAll($conn){
			
    $conn = mysqli_connect('localhost','root','','btc3205') or die(mysqli_error());
	
	$result = mysqli_query($conn,"SELECT id,first_name,last_name,user_city FROM user") or die("Error".mysqli_error());

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["first_name"]. " " . $row["last_name"]. " " . $row["user_city"]."<br>";
    }
} else {
    echo "0 results";
}
		return $result;
	}
	public function readUnique(){
		return null;
	}
	public function search(){
		return null;
	}
	public function update(){
		return null;
	}
	public function removeOnee(){
		return null;
	}
	public function removeAll(){
		return null;
	}
}

	

 ?>