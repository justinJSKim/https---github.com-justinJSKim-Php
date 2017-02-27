<?php

require('lab6Login.php');
require('myClasses.php');
if($_POST){
	$passUser = $_POST['passUser'];
	$newPass = $_POST['newPass'];
	$newPass = crypter($newPass);
	
	$passUpdate = new DBLink ("MyDB");
	
	$sql_query = "UPDATE users set password='$newPass' WHERE username='$passUser'";

	$result = $passUpdate->query($sql_query);
}
else{
?>


<html>
<body>
<h4>Password Updater</h4>
<form method="post" action="">
User<input type="text" name="passUser">
<br />
New Password<input type="password" name="newPass">
<br />
<input type="submit">
</form>

<br />
<br />
<br />

<h4>Database Login</h4>
<form method="post" action="lab6Login.php">
<input type="text" name="user">
<input type="password" name="password"> 
<input type="submit">
</form>

<?php 
	$error = $_GET['error'];
	
if($error == true){
	echo "You did not enter valid information.";
} 

?>
</body>
</html>

<?php

}
?>