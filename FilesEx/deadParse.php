<?php

$filename = 'deadLanguage.txt';
$handle = fopen($filename, 'r'); //opens file

$content = fread($handle, filesize($filename));

//$content = file_get_contents('deadLanguage.txt');

fclose($handle); //closes file
?>