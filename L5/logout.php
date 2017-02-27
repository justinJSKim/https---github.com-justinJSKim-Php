<?php
session_start();
session_unset($_SESSION['verifyUser']);
session_destroy();
setcookie("PHPSESSID", "", time() - 61200,"/");
header("Location:login.php");

?>