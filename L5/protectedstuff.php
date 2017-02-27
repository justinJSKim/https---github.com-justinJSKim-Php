<?php
session_start();

if(isset($_SESSION['verifyUser'])){
	echo "You're logged in!" . "<br />";
	echo "<a href='logout.php'>Logout</a>";
}else{
	header("Location: login.php");
}

?>

