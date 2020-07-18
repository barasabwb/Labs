<?php 

include_once 'DBConnector.php';
include_once 'user.php';
include_once 'fileUploader.php';
$cdb = new DBConnector();

if (isset($_POST['btn-save'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$city_name = $_POST['city_name'];
	$username = $_POST['username'];
	$_SESSION['username']=$username;
	$password = $_POST['password'];
	$fileName=$_FILES['fileToUpload']['name'];
	$fileSize=$_FILES['fileToUpload']['size'];
	$fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
	$finalName=$_FILES['fileToUpload']['tmp_name'];

	$user = new User($first_name,$last_name,$city_name,$username,$password);
	$fileUploader = new fileUploader();

	$fileUploader->setOriginalName($fileName);
	$fileUploader->setType($fileType);
	$fileUploader->setSize($fileSize);
	$fileUploader->setFinalName($finalName);
	$fileUploader->setUsername($username);

	if (!$user->validateForm()) {
		$user->createFormErrorSessions();
		header("Refresh:0");
		die();
	}else{
		if ($fileUploader->fileWasSelected()) {
			// echo "SELECTED"."<br>";
			if ($fileUploader->fileTypeisCorrect()) {
				// echo "CORRECT TYPE"."<br>";
				if ($fileUploader->fileSizeIsCorrect()) {
					// echo "CORRECT SIZE"."<br>";

					if (!($fileUploader->fileAlreadyExists())) {
						// echo "FILE DOESNT EXIST"."<br>";
				    $user->save();
					$fileUploader->uploadFile() ;


						// if (!$res || !$res2) {
						// 	echo "failed!";
						// }else{
						// 	echo "success ";
						// }

					}else{
						echo "FILE EXISTS"."<br>";

					}

				}else{
					echo "PICK A SMALLER SIZE"."<br>";
				}

			}else{
				echo "INCORRECT TYPE"."<br>";
			}


		}else{echo "NO FILE DETECTED"."<br>";}
	}
	$cdb->closeDatabase();
	
	
	

	

	


	// if (!$user->validateForm()) {
	// 	$user->createFormErrorSessions();
	// 	header("Refresh:0");
	// 	die();
	// }
	

	// if ($res ) {
	// 	echo "SUCCESS!";
	// }else{
	// 	echo "failed :(";
	// }
	// $cdb->closeDatabase();

	
}

?>

<html>
<head>
	<script type="text/javascript" src="validate.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
	<title>LAB 1</title>
</head>
<body> 
	<form name="user_details" id="user_details" onsubmit="return validateForm()" method="post" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>">
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
				<td><input type="text" name="username" placeholder="Username"></td>
			</tr>
			<tr>
				<td><input type="password" name="password" placeholder="Password"></td>
			</tr>
			<tr>
				<td><input type="file" name="fileToUpload" id="fileToUpload"></td>
			</tr>
			<tr>
				<td><button type="submit" name="btn-save"><strong>Save</strong></button></td>
			</tr>
			<tr>
				<td><a href="login.php">Login</a></td>
			</tr>
		</table>
	</form>
	<?php 
	$user2 = new User("","","","","");
	$res = $user2->readAll();

	?>

</body>
</html>