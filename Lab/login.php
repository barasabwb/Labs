<?php 
include_once 'DBConnector.php';
include_once 'user.php';
    $con = new DBConnector;
    if(isset($_POST['btn-login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $instance=User::create();
    $instance->setPassword($password);
    $instance->setUserName($username);
    
    
    
    if($instance->isPasswordCorrect()){
        $instance->login();
        $con->closeDatabase();
        $instance->createUserSession();
    }else{
    	
       
        $con->closeDatabase();
        header("Location:login.php");

    }
    }


 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="validate.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>
	<form name="login" id="login" method="post" action="<?=$_SERVER['PHP_SELF']?>">
		<table align="center">

			<tr>
				<td><input type="text" name="username" required placeholder="Username"></td>
			</tr>
			<tr>
				<td><input type="password" name="password" placeholder="Password"></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-login"><strong>LOGIN</strong></button></td>
			</tr>
			
			<tr>
				<td><a href="login.php">Login</a></td>
			</tr>
		</table>
	</form>

</body>
</html>