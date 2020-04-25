<?php 
include_once 'DBConnector.php';
include_once 'user.php';
$conn = "no";
 
if (isset($_POST['btn-save'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city_name = $_POST['city_name'];
	$user = new User($first_name,$last_name,$city_name);
	$res = $user->save($conn);

	if ($res) {
		echo "SUCCESS!";
	}else{
		echo "failed :(";
	}
	
}

 ?>

<html>
<head>
	<title>LAB 1</title>
</head>
<body> 
	<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
		<table align="center">
			<tr>
				<td><input type="text" name="first_name" required placeholder="First Name"></td>
			</tr>
			<tr>
				<td><input type="text" name="last_name" placeholder="Last name"></td>
			</tr>
			<tr>
				<td><input type="text" name="city_name" placeholder="City name"></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-save"><strong>Save</strong></button></td>
			</tr>
		</table>
	</form>
	<?php 
$user2 = new User("","","");
$res = $user2->readAll($conn);
	 ?>

</body>
</html>