<?php
$id = $_GET['id'];

$servername = "localhost";
$dbuser = "root";
$pass = "";
$dbname ="MyDB";


//Create connection

$cnx = mysqli_connect($servername, $dbuser, $pass, $dbname)
						or die('Could not connect: ' . mysql_error($cnx));


$sql_query = "DELETE FROM MyDB WHERE userID = '$id'";

mysqli_query($cnx, $sql_query)
			 	or die ('Cancel failed');

header("Location: database.php");
mysqli_close($cnx);
?>
