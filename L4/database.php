<?php
error_reporting(0);

$first = isset($_POST['first']) ? $_POST['first'] : '';
$last = isset($_POST['last']) ? $_POST['last'] : '';
$sex = isset($_POST['sex']) ? $_POST['sex'] : '';
$size = isset($_POST['size']) ? $_POST['size'] : '';
$multi = isset($_POST['multi']) ? $_POST['multi'] : '';
$shirtNum = isset($_POST['shirtNum']) ? $_POST['shirtNum'] : '';
$numPat = "/^[1-9][0-9]?[0-9]?$/";


$dataValid = true;
$firstNameErr = "";
$lastNameErr = "";
$sexErr = "";
$sizeErr = "";
$multiErr = "";
$shirtErr = "";

//Validation
if ($_POST) { 
        // Test for nothing entered in field
	if ($_POST['first'] == "") {
		$firstNameErr = "Error - you must fill in a first name";
		$dataValid = false;
	}
	if ($_POST['last'] == "") {
		$lastNameErr = "Error - you must fill in a last name";
		$dataValid = false;		
	}
	
	if ($_POST['sex'] == ""){
		$sexErr = "Error - you must choose a sex";
		$dataValid = false;
	}
	
	if ($_POST['size'] == ""){
		$sizeErr = "Error - you must choose a size";
		$dataValid = false;
	}
	if ($_POST['multi'] == ""){
		$multiErr = "Error - you must select yes or no";
		$dataValid = false;
	}
	if ($_POST['multi'] == "y" &&  !preg_match($numPat, $shirtNum, $match)){
		$shirtErr = "Error - you must enter the number of shirts";
		$dataValid = false;
	}
	
}

$servername = "localhost";
$dbuser = "root";
$pass = "";
$dbname ="MyDB";



if($dataValid && $_POST){
//Create connection

$cnx = mysqli_connect($servername, $dbuser, $pass, $dbname)
						or die('Could not connect: ' . mysql_error($cnx));


$sql_query = "INSERT INTO MyDB (first, last, sex, size, multi, shirtNum) VALUES
				('$first', '$last', '$sex', '$size', '$multi', '$shirtNum')";



mysqli_query($cnx, $sql_query)
			 	or die ('Insert failed');


}
?>



<html>
<body>
<table border="1">
<tr>
<th> First Name </th><th> Last Name </th><th> Sex </th><th> T-Shirt Size </th><th> Multiple Shirts </th><th> Number to Order </th>

<?php


//Create connection

$cnx = mysqli_connect($servername, $dbuser, $pass, $dbname)
						or die('Could not connect: ' . mysql_error($cnx));
						
$sql_query = "SELECT * FROM MyDB";

$result = mysqli_query($cnx, $sql_query)
						or die ('Data Retrieval failed');

						
	while($row = mysqli_fetch_assoc($result))
	{
	$stock = 200;
	$ordered += $row['shirtNum'];
	$totalNum = ($stock - $ordered);
?>
	<tr>
	<td><?php print $row['first']; ?></td>
	<td><?php print $row['last']; ?></td>
	<td><?php print $row['sex']; ?></td>
	<td><?php print $row['size']; ?></td>
	<td><?php print $row['multi']; ?></td>
	<td><?php print $row['shirtNum']; ?></td>
	<td><a href="cancel.php?id=<?php print $row['userID'] ?>">Cancel</a></td>
	<td><a href="update.php?id=<?php print $row['userID'] ?>">Update</a></td>
	</tr>
	
<?php
	}

?>

</table>
<?php
echo $totalNum . "/200";
?>
<br />
<a href="lab4.php">Back To Order Screen</a>
</body>
</html>

