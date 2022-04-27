<?php
require_once "config.php";

$name = $email = $password = "";
$link = mysqli_connect('localhost', 'root','','user');

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(!empty(trim($_POST["name"]))){
		$name = trim($_POST["name"]);
	}

	if(!empty(trim($_POST["email"]))){
		$email = trim($_POST["email"]);
	}

	if(!empty(trim($_POST["password"]))){
		$password = trim($_POST["password"]);
	}
}else {
	echo "something wrong.try later.";
}

$param_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO `register` (`name`,`email`,`password`) VALUES ('$name','$email','$param_password')";

	if (mysqli_query($link, $sql)) {
		header("location: login.php");
		exit();
	} else{
		echo "something wrong ! try laterr.";
    }
   
    mysqli_close($link);
?>