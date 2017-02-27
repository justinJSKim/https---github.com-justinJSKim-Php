<?php
session_start();


if(isset($_SESSION['verifyUser'])){
	echo $_SESSION['verifyUser'];
}else{
	header("Location: login.php");
}
?>

