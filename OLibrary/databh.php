<?php
	$conn = mysqli_connect("localhost", "root", "", "olibrary");
	if(!$conn){
		die("Connection Failed ". mysqli_connect_error());
	}
?>