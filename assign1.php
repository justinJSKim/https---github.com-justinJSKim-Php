<?php
//assign1.php
error_reporting(0);

//The following code opens and parses the password file to access the server
$passHandle = fopen('../secret/topsecret.txt', 'r');
$passContents = file_get_contents('topsecret.txt');
$pass = explode(',', $passContents);

$cnx = mysqli_connect($pass[0], $pass[1], $pass[2], $pass[3])
				or die('Could not connect: ' . mysql_error($cnx));


//Retrieves the table if it exists
$tableCheck = mysqli_query($cnx, "SELECT * FROM mobile");

//If the table does not exist, creates it using the 4 files to be parsed	
if (!$tableCheck) {

$modelHandle = fopen('model.txt', 'r');
$modelContent = file_get_contents('model.txt');

$osHandle = fopen('os.txt', 'r');
$osContent = file_get_contents('os.txt');

$versionHandle = fopen('version.txt', 'r');
$versionContent = file_get_contents('version.txt');

$priceHandle = fopen('price.txt', 'r');
$priceContent = file_get_contents('price.txt');


$model = array_map('trim', explode(",", $modelContent));
$os = array_map('trim', explode(",", $osContent));
$version = array_map('trim', explode(",", $versionContent));
$price = array_map('trim', explode(",", $priceContent));


mysqli_query($cnx, "CREATE TABLE mobile (id int zerofill not null auto_increment, itemName varchar(40) not null, model varchar(20) not null, os varchar(10) not null,price decimal(10,2) not null, primary key (id));") or die ("Couldn't create table");
  for ($i=0; $i < sizeof($model); $i++) {

    mysqli_query($cnx, "INSERT INTO mobile (itemName, model, os, price) VALUES ('$model[$i]','$version[$i]', '$os[$i]', '$price[$i]');") or die ("Couldn't run query");
  }
//Once the table is created, redirects the user to the same page so no empty screen  
  header("Location: assign1.php");
}

?>

<html>
<head>
<style>

.tableClass{
	border: double;
	border-radius: 5px; 
	box-shadow: 8px 8px 5px #888888;
}

td{
	border: solid;
	border-width: 1px;
}
.table{
	display:table;
	border-spacing:17px;
}
.cell{
	display:table-cell;
}
.row{
	display:table-row;
}
</style>
</head>
<body>

<div class="table">
<div class="row">
<div class="cell">

<table class="tableClass">
<tr>
	<th>Phone</th>
	<th>Operating System</th>
	<th>Version</th>
	<th>Price</th>
</tr>
<?php
	while($row = mysqli_fetch_assoc($tableCheck)){
	?>
	<tr>
	<td><?php print $row['itemName'] ?></td>
	<td><?php print $row['os'] ?></td>
	<td><?php print $row['model'] ?></td>
	<td><?php print $row['price'] ?></td>
	</tr>
<?php
}
?>
</table>
</div>
<div class="cell">
<h4>Search by model and price range: </h4>
<form method="post" action="">
Min<input type="text" name="min" >
Max<input type="text" name="max" >
<br />
<select name="phone">
<option disabled selected value>--Please choose--</option>
<option name="iPhone" value="iPhone">iPhone</option>
<option name="Samsung" value="Samsung">Samsung</option>
</select>

<input type="submit">
</form>
</div>
</div>
<div class="row">
<div class="cell">
<?php
if($_POST){

$min = $_POST['min'];
$max = $_POST['max'];
$phone = $_POST['phone'];


//Valid search checks
if(($min < $max) && ($_POST['phone']=="iPhone" ||$_POST['phone']=="Samsung" )){
	$selection = mysqli_query($cnx, "SELECT * FROM mobile WHERE itemName='$phone' AND price>'$min' AND price<'$max'");
	?>
	<h4>Matching Models</h4>
	<?php
	while($row = mysqli_fetch_assoc($selection)){
	echo $row['itemName'] . " " . $row['os'] . " " . $row['model'] . " " . $row['price'] . "<br />";   
	}
	
//Date of search
	$date = mysqli_query($cnx, "SELECT NOW()");
	$dateStamp = mysqli_fetch_assoc($date);
	echo "<br />Date and time of your serach: " . $dateStamp['NOW()'];

} else{
	echo "Please enter the correct search parameters <br />";
}

} //<<<---closing brace for if($_POST)
?>
</div>
</div>
</div>
</body>
</html>


