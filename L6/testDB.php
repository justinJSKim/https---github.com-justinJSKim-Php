<?php
require('myClasses.php');
error_reporting(0);

 
 //$result = $db->query ("Select * from users");
 
 
 if($_POST['option']=="Add User"){
  	$db = new DBLink ("MyDB");
 	$name = $_POST['username'];
 	$pass = $_POST['password'];
 	$pass = $db->crypter($pass);
 	$role = "user";
 	$hint = $_POST['hint'];
 	$query = "INSERT INTO users (username, password, role, passwordHint)VALUES ('$name', '$pass', '$role', '$hint');";

 	$result = $db->query ($query);
 
 }
 
  if($_POST['option']=="Update"){
 
 	$name = $_POST['username'];
 	$pass = $_POST['password'];
 	$pass = $db->crypter($pass);
 	$role = "user";
 	$hint = $_POST['hint'];
 
 	
 	$result = $db->query ("UPDATE users SET password='$pass', passwordHint='$hint' WHERE username='$name'");
 
 }
?>

<html>
<body>
<form method="post" action="">

Username<input type="text" name="username" >
Password<input type="password" name="password" >
Password Hint<input type="text" name="hint" >

<input type="submit" name="option" value="Add User" >
<input type="submit" name="option" value="Update" >
<input type="submit" name="option" value="Search" >
</form>


</body>
<html>