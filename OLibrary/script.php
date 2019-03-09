<?php
	session_start();
	include 'databh.php';
	$bookname = $_POST['bn'];
	$author = $_POST['an'];
	$copies = $_POST['nco'];
	$sql = "INSERT INTO books(name, author, copies) VALUES('$bookname', '$author', '$copies')";
	$result = $conn->query($sql);
	header('Location: profile.php');
?>