<?php 
include_once 'DBConnector.php';
include_once 'user.php';

$cdb = new DBConnector();

if (isset($_POST['btn-save'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city_name = $_POST['city_name'];
	$user = new User($first_name,$last_name,$city_name);
	if (!$user->validateForm) {
		$user->createFormErrorSessions();
		header("Refresh:0");
		die();
	}
	$res = $user->save();

	if ($res) {
		echo "SUCCESS!";
	}else{
		echo "failed :(";
	}
	$cdb->closeDatabase();
	
}

?>

<html>
<head>
	<script type="text/javascript" src="validate.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
	<title>LAB 1</title>
</head>
<body> 
	<form name="user_details" id="user_details" onsubmit="return validateForm()" method="post" action="<?=$_SERVER['PHP_SELF']?>">
		<table align="center">
			<tr>
				<td>
					<div id="form_errors">
						<?php 
						session_start();
						if (!empty($_SESSION['form_errors'])) {
							echo "". $_SESSION['form_errors'];
							unset($_SESSION['form_errors']);
						}

						  ?>
						
						
					</div>
				</td>
			</tr>
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
	$res = $user2->readAll();
	
	?>

</body>
</html>