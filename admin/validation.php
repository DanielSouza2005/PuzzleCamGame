<?php

session_start();
require_once("./connection.php");

$user = $_REQUEST['txt_user'];
$password   = $_REQUEST['txt_password'];

$sql = "select  
			Login, 
			Password 
		from users
		where Login = '$user' and Password = '$password'";
		
$sql = mysqli_query($con, $sql) or die ("It didn't work :/") ;
echo $total = mysqli_num_rows($sql);

if ($total == 1) {
	$_SESSION["user"] = $user;
	$_SESSION["password"] = $password;
	header("location: server.php");
} else {
	header("location: negated_access.php");
}

?>





