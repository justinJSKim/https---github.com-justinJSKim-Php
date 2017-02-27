<?php
error_reporting(0);


$user = $_POST['user'];
$password = $_POST['password'];
$password = crypter($password);

function crypter($input){
$password = crypt($input, substr($input, 2, -2));
return $password;
}

if($_POST){

	
	$servername = "localhost";
	$dbuser = "root";
	$pass = "";
	$dbname ="MyDB";

	$cnx = mysqli_connect($servername, $dbuser, $pass, $dbname)
						or die('Could not connect: ' . mysql_error($cnx));

	$sql_query = "SELECT * FROM users WHERE password='$password'";

	$result = mysqli_query($cnx, $sql_query)
							or die ('Data Retrieval failed');

	if(mysqli_num_rows($result) > 0){
		echo "You're logged in!";
	}
	else{
		header('Location: lab6.php?error=true');
	}

}


?>