<?php
error_reporting(0);
?>


<html>
<body>
<?php 
if(!$dataValid || !$_POST){
?>
<form method="post" action="database.php">

First Name : <input type="text" name="first" autofocus="autofocus" placeholder="First Name" value="<?php if ($_POST['first']) echo $_POST['first']; ?>" />
<?php echo $firstNameErr ?>
<br />
Last Name : <input type="text" name="last" placeholder="Last Name" value="<?php if ($_POST['last']) echo $_POST['last']; ?>" />
<?php echo $lastNameErr ?>
<br />

Male or Female : <?php echo $sexErr ?>
<br />
<input type="radio" name="sex" value="f" <?php if (isset($sex) && $sex=="f") echo "checked";?> />Female  
<br />
<input type="radio" name="sex" value="m" <?php if (isset($sex) && $sex=="m") echo "checked";?> />Male  
<br />

T-Shirt Size: <select name="size"> 
<option disabled selected value>--Please choose--</option>
<option name="s" value="s"<?php if (isset($size) && $size=="s") echo "SELECTED"; ?>>Small</option>
<option name="m" value="m"<?php if (isset($size) && $size=="m") echo "SELECTED"; ?>>Medium</option>
<option name="l" value="l"<?php if (isset($size) && $size=="l") echo "SELECTED"; ?>>Large</option>
<option name="xl" value="xl"<?php if (isset($size) && $size=="xl") echo "SELECTED"; ?>>Extra Large</option>
</select><?php echo $sizeErr ?>
<br />
Multiple Shirts: 
	<input type="checkbox" name="multi" value="y" <?php if (isset($multi) && $multi=="y") echo "checked";?>/> Yes
	<input type="checkbox" name="multi" value="n" <?php if (isset($multi) && $multi=="n") echo "checked";?>/> No
	<?php echo $multiErr ?>
<br />
Number to Order: <br />
<input type="text" name="shirtNum" value="<?php if ($_POST['shirtNum']) echo $_POST['shirtNum']; ?>" /> <?php echo $shirtErr ?>
<br />
<input type="submit">
</form>
<?php
}
?>
</body>
</html>
