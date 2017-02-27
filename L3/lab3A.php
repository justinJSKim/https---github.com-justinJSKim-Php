<?php require('validation.php')

?>


<html>
<head></head>
<body>
<h4>
<tr>
<th>Postal Code, Course Code or Phone Number Verification</th>
</tr>
</h4>

<form method="post" action="">
<input type="text" name="pattern" placeholder="Enter Text here" autofocus="autofocus" value="<?php echo $error ?>">
<?php echo $errorMsg ?>
<br />
<br />
<input type="submit">
</form>

</body>
</html>
