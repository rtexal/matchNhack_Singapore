<?php
session_start();
require_once ('./DBHandler/DB_Functions.php');

$dbFunctions = new DB_Functions();
$con = $dbFunctions->getthedatabasehandler();

$dataArr = Array();

$query = "SELECT * FROM message_details";
$result = mysql_query($query, $con);
while($row = mysql_fetch_array($result)) {
	$tag_number = $row['ID_MESSAGE_DETAILS'];
	$messageText = $row['MESSAGE_TEXT'];
	$colorCode = $row['COLOR_CODE'];
	array_push($dataArr,Array($tag_number,$messageText,$colorCode));
	}

//text//colour
	$values = array('tag_number', 'text', 'color');
	for($i=0; $i<count($dataArr); $i++) {
		$dataArr[$i] = array_combine($values, $dataArr[$i]);
	}

	$jsonString = json_encode(array('ky' => $dataArr));
	echo $jsonString;

?>