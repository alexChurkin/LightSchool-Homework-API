<?php
include 'config.php';
include 'print_response.php';

if(isset($_POST['admin_token']) && isset($_POST['timestamp']) && isset($_POST['subject']) && isset($_POST['hometask'])) {

	$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);
	
	$timestamp = trim($_POST['timestamp']);
	$subject = trim($_POST['subject']);
	$hometask = trim($_POST['hometask']);
	
	if(empty($timestamp) || empty($subject) || empty($hometask)) {
		onError(1);
		exit();
	}
	else if(!(strcmp($_POST['admin_token'], ADMIN_TOKEN) == 0)) {
		onError(2);
		exit();
	}
	
	$stmt = $mysqli->prepare("INSERT INTO $TABLE (timestamp, subject, hometask) VALUES (?, ?, ?)");
	if($stmt === false) {
		die ("Mysql Error: " . $mysqli->error);
	}
	$stmt->bind_param('iss', $timestamp, $subject, $hometask);
	$stmt->execute();
	$newId = $stmt->insert_id;
	$mysqli->close();
	onSuccessAdded($newId);
}
else {
	onError(1);
}	
?>