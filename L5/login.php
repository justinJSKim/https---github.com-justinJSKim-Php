<?php

error_reporting(0);
session_start();

if($_POST){
	$user = $_POST['username'];
	$password = $_POST['password'];

	$servername = "localhost";
	$dbuser = "root";
	$pass = "";
	$dbname ="MyDB";

	$cnx = mysqli_connect($servername, $dbuser, $pass, $dbname)
						or die('Could not connect: ' . mysql_error($cnx));

	$sql_query = "SELECT * FROM users WHERE username='$user' AND password='$password'";

	$result = mysqli_query($cnx, $sql_query)
							or die ('Data Retrieval failed');


	if(mysqli_num_rows($result) > 0){
		$_SESSION['verifyUser']  = $user;
		header("Location: protectedstuff.php");
	}
	else{
		echo "Invalid Name or Password!";
	}
}
?>

<html>
<body>

<form method="post" action="">
Username <input type="text" name="username" value=""/>
<br/>
Password <input type="password" name="password" value="" />

<input type="submit" />

</form>

<a href="email.php">Forgot your password?</a>

</body>
</html>
