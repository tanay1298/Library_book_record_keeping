<?php
	session_start();
	include 'databh.php';
	if(!isset($_POST['id1']) && empty($_POST['id1'])){
		header('Location: profile.php');
		exit();
	}
	$uid = $_SESSION['uid'];
	$id = $_POST['id1'];
	$sql = "SELECT id FROM wishlist WHERE uid = '$uid' AND bid = '$id'";
	$result = $conn->query($sql);
	$num = mysqli_num_rows($result);
	if($num != 0){
		echo "<p style='text-align: center;'>This Book already exists in your wishlist!</p>";
	}else{
		$sql = "INSERT INTO wishlist(uid,bid) VALUES('$uid', '$id')";
		$result = $conn->query($sql);
		echo "<p style='text-align: center;'>This Book has been added to your wishlist!</p>";
	}
?>