<?php
include 'config.php';

function showRusTitle() {
	echo "<title>Домашнее задание</title>";
}

function showEngTitle() {
	echo "<title>Homework</title>";
}

function showRusTableStart()
{
    echo "
		<center>
		<h1>Домашнее задание</h1>

		<table border=\"1\">
			<tr>
				<th>Дата</th>
				<th>Предмет</th>
				<th>Задание</th>
			</tr>";
}

function showEngTableStart() {
	    echo "
		<center>
		<h1>Homework</h1>

		<table border=\"1\">
			<tr>
				<th>Date</th>
				<th>Subject</th>
				<th>Homework</th>
			</tr>";
}


$mysqli = new mysqli(HOST, USERNAME, PASS, DBNAME);
$link = mysqli_connect(HOST, USERNAME, PASS, DBNAME);
mysqli_set_charset($link, "utf8");
$res=mysqli_query($link,"SELECT * FROM $TABLE");

$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

if(strcmp($language, "ru") == 0) {
	showRusTitle();
	showRusTableStart();
} else {
	showEngTitle();
	showEngTableStart();
}


echo "
	<style>
		h1 {
			color:#45aa26;
		}
    	table {
			width: 90%;
			text-align: center;
		}
	</style>";
   
while($row = mysqli_fetch_array($res))
{
  echo "<tr><td>".gmdate("d.m.Y", $row['timestamp'] + 86400)."</td><td>".$row['subject']."</td><td>".$row['hometask']."</td></tr>";  
}  
echo "</table>";
echo "</center>";
?>