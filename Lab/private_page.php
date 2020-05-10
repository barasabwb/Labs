<?php  
session_start();
if (!isset($_SESSION['username'])) {
	# code...
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="validate.css">
	<script type="text/javascript" src="validate.js"></script>
	<title></title>
</head>
<body>
	<p>THIS IS A PRIVATE PAGE</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	<p>Must be protected</p>
	<a href="logout">LOGOUT</a>

</body>
</html>