<?php
	include 'databh.php';
	session_start();
	if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
		header('Location: profile.php');
		exit();
	}
	if(!isset($_POST['review1']) || empty($_POST['review1'])){
		echo "<p style='text-align: center;'>You have submitted an empty review!</p>";
	}else{
		$review = $_POST['review1'];
		$uid = $_SESSION['uid'];
		$id = $_POST['id1'];
		$sql = "INSERT INTO reviews(uid,bid,review) VALUES('$uid', '$id', '$review')";
		$result = $conn->query($sql);
		$sql = "SELECT * FROM reviews WHERE bid = '$id'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc()){
                            echo "<div class='row'>";
                                echo "<div class='col-sm-2 col-lg-2 col-md-2'>";
                                echo "</div>";
                                echo "<div class='col-sm-8 col-lg-8 col-md-8'  style='background-color: #FFFFFF;'>";
                                    echo "<br>";
                                    echo "<h3 style='margin-left: 5px; display: inline;'>".$row['uid']."</h3>";
                                    $date = $row['date1'];
                                    $datearr = explode(" ", $date);
                                    $date1 = $datearr[0];
                                    $time = $datearr[1];
                                    $date1arr = explode("-", $date1);
                                    $month = $date1arr[1];
                                    if($month == '01'){
                                        $month = "JAN";
                                    }
                                    if($month == '02'){
                                        $month = "FEB";
                                    }
                                    if($month == '03'){
                                        $month = "MAR";
                                    }
                                    if($month == '04'){
                                        $month = "APR";
                                    }
                                    if($month == '05'){
                                        $month = "MAY";
                                    }
                                    if($month == '06'){
                                        $month = "JUN";
                                    }
                                    if($month == '07'){
                                        $month = "JUL";
                                    }
                                    if($month == '08'){
                                        $month = "AUG";
                                    }
                                    if($month == '09'){
                                        $month = "SEP";
                                    }
                                    if($month == '10'){
                                        $month = "OCT";
                                    }
                                    if($month == '11'){
                                        $month = "NOV";
                                    }
                                    if($month == '12'){
                                        $month = "DEC";
                                    }
                                    $datedisp = $date1arr[2]."-".$month;
                                    echo "<h5 style='margin-left: 5px; text-align: right; display: inline; float: right;'>".$datedisp."</h5>";
                                    echo "<p style='margin-left: 5px;'>".$row['review']."</p>";
                                echo "</div>";
                                echo "<div class='col-sm-2 col-lg-2 col-md-2'>";
                                echo "</div>";
                            echo "</div>";
                            echo "<br>";
                        }
	}
?>