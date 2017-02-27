<?php
error_reporting(0);
$pattern = $_POST['pattern'];
$pattern = ltrim($pattern, " ");
$pattern = rtrim($pattern, " ");
$postPattern = "/^[a-z]{1}\d{1}[a-z]{1}[' ']?\d{1}[a-z]{1}\d{1}$/i";
$coursePattern = "/^[A-Z]{3}\d{3}[A-Z]{1,3}$/";
$phonePattern = "/^\(\d{3}\)\s\d{3}[ -]\d{4}\$|^\d{3}\s\d{3}[ -]?\d{4}\$|^\d{3}-\d{3}-\d{4}\$|^\d{10}\$/";

$error = $pattern;
$errorMsg = "";

if(preg_match($postPattern, $pattern, $match)){

$error = $match[0];
$errorMsg = "Valid Postal Code";
}
else if(preg_match($coursePattern, $pattern, $match)){

$error = $match[0];
$errorMsg = "Valid Course Code";
}
else if(preg_match($phonePattern, $pattern, $match)){

$error = $match[0];
$errorMsg = "Valid Phone Number";
}
else {

$errorMsg = "No Match";

}
?>