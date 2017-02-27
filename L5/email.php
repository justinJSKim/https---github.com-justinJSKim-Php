<?php
//email.php

	
if (isset($_POST)){
	$email = $_POST['email'];

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){

	

	$servername = "localhost";
	$dbuser = "root";
	$pass = "";
	$dbname ="MyDB";

	$cnx = mysqli_connect($servername, $dbuser, $pass, $dbname)
						or die('Could not connect: ' . mysql_error($cnx));

	$sql_query = "SELECT * FROM users WHERE username='$email'";

	$result = mysqli_query($cnx, $sql_query)
							or die ('Data Retrieval failed');  
			
					
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_assoc($result);
			$userEmail = $row['username'];
			$hint = $row['passwordHint'];
		
			mail($userEmail, "Your Password hint", $hint, "From" . "server@gmail.com");
		}
		else{
			header("Location: login.php");
		}						
							
	}
	else{
		echo "Invalid email";
	}
}

?>
<html>
<body>
 <form method="post" action="">
  Email: <input name="email" type="text" /><br />
  <input type="submit" value="Submit" />
  </form>
</body>
</html>  