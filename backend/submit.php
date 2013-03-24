<?php
session_start();
require_once ('./DBHandler/DB_Functions.php');

$dbFunctions = new DB_Functions();
$con = $dbFunctions->getthedatabasehandler();

$message = mysql_real_escape_string($_POST['chinab_textarea']);
$colorCode  = mysql_real_escape_string($_POST['colour']);
//$picSource = mysql_real_escape_string($_GET['picSource']);

$query = "INSERT INTO message_details (MESSAGE_TEXT, COLOR_CODE) VALUES ('$message', '$colorCode')";
mysql_query($query, $con);

?>