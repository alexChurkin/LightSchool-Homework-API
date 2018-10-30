<?php
include 'config.php';
include 'print_response.php';

if(isset($_POST['admin_token']) && isset($_POST['id'])) {

	$id = trim($_POST['id']);
	if(empty($id)){
		onError(1);
		exit();
	}
	else if(!(strcmp($_POST['admin_token'], ADMIN_TOKEN) == 0)) {
		onError(2);
		exit();
	}

	$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);

	$stmt = $mysqli->prepare("DELETE FROM $TABLE WHERE id=?");
	if($stmt === false) {
		die ("Mysql Error: " . $mysqli->error);
	}
	$stmt->bind_param('i', $_POST['id']);
	$stmt->execute();
	
	$mysqli->close();
	onSuccess();
}
else{
	onError(1);
}	
?>