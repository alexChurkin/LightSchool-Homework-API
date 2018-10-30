<?php
include 'config.php';

$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);

$stmt = $mysqli->prepare("SELECT id, timestamp, subject, hometask FROM $TABLE");
if($stmt === false) {
	die ("Mysql Error: " . $mysqli->error);
}
$stmt->execute();

$hometasks_array = array();
$stmt->bind_result($id, $timestamp, $subject, $hometask);

$counter = 0; 
while ( $stmt->fetch() ) {
    $hometasks_array[$counter] = array('task_id' => $id, 'date' => $timestamp, 'subject' => $subject, 'hometask' => $hometask);
    $counter++;
}

$json_data = json_encode($hometasks_array, JSON_UNESCAPED_UNICODE);
echo $json_data;
$mysqli->close();	
?>