	<?php 

	include "Crud.php";
	include "authenticator.php";
	include_once "DBConnector.php";
	/**
	 * 
	 */
	$connection = new DBConnector();
	class User implements Crud
	{   private $user_id;
		private $first_name;
		private $last_name;
		private $city_name;
		private $username;
		private $password;



		
		
		function __construct($first_name,$last_name,$city_name,$username,$password)
		{
			
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			$this->city_name = $city_name;
			$this->username = $username;
			$this->password = $password;
		}
		public static function create(){

			$instance = new ReflectionClass(__CLASS__);
            return $instance->newInstanceWithoutConstructor();

		}
		public function setUsername($username){
			$this->username = $username;
		}
		public function getUsername(){
			return $this->username;
		}
		public function setpassword($password){
			$this->password = $password;
		}
		public function getpassword(){
			return $this->password;
		}
		public function setUserId($user_id){
			$this->user_id = $user_id;
		}
		public function getUserId($user_id){
			return $this->user_id;
		}
		public function save(){
	    // $conn = mysqli_connect('localhost','root','','btc3205') or die(mysqli_error());
			$cdb = new DBConnector();

			$fn = $this->first_name;
			$ln = $this->last_name;
			$city = $this->city_name;
			$uname = $this->username;
			$this->hashPassword();
			$pass= $this->password;

			$res = mysqli_query($cdb->conn,"INSERT INTO user(first_name,last_name,user_city,username,password) VALUES('$fn','$ln','$city','$uname','$pass')") or die("Error".mysqli_error());


			return $res;
		}

		public function readAll(){

	    
			$cdb2 = new DBConnector();

			$result = mysqli_query($cdb2->conn,"SELECT * FROM user") or die("Error".mysqli_error());

			if (mysqli_num_rows($result) > 0) {
	    
				echo "<table  align='center' style='border:2px solid black'>";
				echo "<tr style='border:2px solid black'>
                <th style='border:2px solid black'>ID</th>
                <th style='border:2px solid black'>First Name</th>
                <th style='border:2px solid black'>Last Name</th>
                <th style='border:2px solid black'>User City</th>
                <th style='border:2px solid black'>Username</th>
                <th style='border:2px solid black'>Password</th>
                <th style='border:2px solid black'>Image Name</th>
				";
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr style='border:2px solid black'>";
					echo"<td style='border:2px solid black'>". $row["id"]."</td>" ."  " ."<td style='border:2px solid black'>" .$row["first_name"]."</td>". " " ."<td style='border:2px solid black'>". $row["last_name"]."</td>". " " ."<td style='border:2px solid black'>". $row["user_city"]."</td>"." "  ."<td style='border:2px solid black'>". $row["username"]."</td>"." " ."<td style='border:2px solid black'>". $row["password"]."</td>"." " ."<td style='border:2px solid black'>". $row["image_name"]."</td>"."<br>";
					echo "</tr>";
				}
				echo "</table>";
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
		public function validateForm(){
			$fn = $this->first_name;
			$ln = $this->last_name;	
			$city = $this->city_name;
			if ($fn==''||$ln==''||$city=='') {
				return false;
			}else{
			return true;}
		}
		public function createFormErrorSessions(){
			session_start();
			$_SESSION['form_errors']="all fields are required";
		}
		public function hashPassword(){

			$this->password = password_hash($this->password, PASSWORD_DEFAULT);
		}
	public function isPasswordCorrect(){
		$cdb3 = new DBConnector();
		$found = false;
		$result2 = mysqli_query($cdb3->conn,"SELECT * FROM user") or die("Error".mysqli_error());
			while($row = mysqli_fetch_assoc($result2)) {
					if (password_verify($this->password, $row['password'])&& $this->getUsername()==$row['username']) {
						$found=true;
						return $found;
					}
					$cdb3->closeDatabase();
					return $found; 
				}
			 

	}
	public function login(){
		if ($this->isPasswordCorrect()) {
			
			header("Location:private_page.php");
		}
	}
	public function createUserSession(){
		session_start();
		$_SESSION['username'] = $this->getUsername();
	}
	public function logout(){
		session_start();
		unset($_SESSION['username']);
		session_destroy();
		header("Location:lab.php");
	}
	}



	?>