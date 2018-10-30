<?php
include 'config.php';
include 'print_response.php';

if(isset($_POST['admin_token']) && isset($_POST['id']) && isset($_POST['subject']) && isset($_POST['hometask'])) {

	$id = trim($_POST['id']);
	$subject = trim($_POST['subject']);
	$hometask = trim($_POST['hometask']);
	
	if(empty($id) || empty($subject) || empty($hometask)) {
		onError(1);
		exit();
	}
	else if(!(strcmp($_POST['admin_token'], ADMIN_TOKEN) == 0)) {
		onError(2);
		exit();
	}

	$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);

	$stmt = $mysqli->prepare("UPDATE $TABLE SET subject = ?, hometask = ? WHERE id=?");
	if($stmt === false) {
		die ("Mysql Error: " . $mysqli->error);
	}
	$stmt->bind_param('ssi', $subject, $hometask, $id);
	$stmt->execute();
	$mysqli->close();
	onSuccess();
}
else {
	onError(1);
}	
?>