<?php
	include 'databh.php';
	session_start();
	if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
		header('Location: login.php');
	}
	if(!isset($_GET['id']) || empty($_GET['id'])){
		header('Location: profile.php');
	}
	$uid = $_SESSION['uid'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title> OLibrary - <?php echo $uid;?> </title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    <link rel="stylesheet" type="text/css" href="CSS/custom_content.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <meta name="theme-color" content="#1A237E">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="plugin/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="plugin/tinymce/init-tinymce.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style type="text/css">
    	.feedcard{
    		background-color: #FFFFFF;
    		box-shadow: 3px 3px 3px #EDE7F6;
    		min-height: 300px;
    		width: 97%;
		}
        .feedcard p{
            text-align: justify;
            margin-right: 15px;
            margin-left: 15px;
            color: #636363;
        }
        .hed{
            box-shadow: 3px 3px 3px #EDE7F6;
            background-color: #E8EAF6;
        }
        .left{
            float: left;
        }
        .right{
            float: right;
        }
    </style>
  </head>
	<body>
		<div class="loader"></div>
		<div class="container">
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: #FFFFFF; border: none;">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-left" href="index.php" style="margin-top: 18px; color: #939393; text-decoration: none; font-size: 20px;"><img src="images/lo2.png" style="height: 40px; width: 40px; margin-right: 1px;"> OLibrary</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <div id="custom-search-input">
                                <form class="navbar-form navbar-left" method="POST" action="searchresults.php" id="search">
                                    <div class="input-group">
                                        <input type="text" class="search-query form-control" placeholder="Search" id="query" name="query"/>
                                        <span class="input-group-btn">
                                            <button class="btn btn-danger" type="submit">
                                                <span class=" glyphicon glyphicon-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                                </div>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <?php
                                if(isset($_SESSION['uid']) && !empty($_SESSION['uid'])){
                                    if(isset($dp) && !empty($dp)){
                                       echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>" .$_SESSION['uid']."<span class='caret'></span></a>"; 
                                   }else{
                                    echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>" .$_SESSION['uid']."<span class='caret'></span></a>";
                                   }
                                
                                }
                                else{
                                    echo "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>User<span class='caret'></span></a>";
                                    }
                                    ?>
                                    <ul class="dropdown-menu">
                                    	<li><a href="logout.php">Logout</a></li>
                                        <li><a href="user.php">Profile</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>
        </div>
        <div class="container-fluid back">
            <br><br><br><br><br><br><br><br>
            <div class='container'>
            	<?php
            		$id = $_GET['id'];
            		$sql = "SELECT * FROM books WHERE id = '$id'";
            		$result = $conn->query($sql);
            		$row = $result->fetch_assoc();
            		$sql1 = "SELECT id FROM issued WHERE bid = '$id'";
                    $result1 = $conn->query($sql1);
                    $ava = mysqli_num_rows($result1);
                    $tot = $row['copies'];
                    $name = $row['name'];
                 	$ava = $tot - $ava;
                 	if($ava > 0){
                 		$sql1 = "SELECT id FROM issued WHERE bid = '$id' AND uid = '$uid'";
                    	$result1 = $conn->query($sql1);
                    	$op = mysqli_num_rows($result1);
                    	if($op == 0){
                    		$sql = "INSERT INTO issued(bid,uid) VALUES('$id', '$uid')";
            				$result = $conn->query($sql);
            				echo "<h4 style='text-align: center;'>Congratulations! Your order has been successfully placed!</h4>";
            				echo "<br>";
            				echo "<div class='row'>";
            					echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
            					echo "</div>";
            					echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
            						echo "<div class='feedcard'>";
            							echo "<br>";
            							echo "<img src='images/done1.png' style='width: 80px; height: 80px;' class='center-block'/>";
            							
            							echo "<h2 style='text-align: center;'>Your Order Details</h4>";
            							echo "<h4 style='text-align: center;'>".$name."</h4>";
            							echo "<hr>";
            							echo "<p>Username: ".$uid."</p>";
            							$sql2 = "SELECT date1 FROM issued WHERE uid = '$uid' AND bid = '$id' LIMIT 1";
            							$result2 = $conn->query($sql2);
            							$row2 = $result2->fetch_assoc();
            							$date = $row2['date1'];
            							echo "<p>Order Date & Time: ".$date."</p>";
            						echo "</div>";
            					echo "</div>";
            					echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
            					echo "</div>";
            				echo "</div>";
                    	}else{
                    		echo "<h4 style='text-align: center;'>You have already ordered this book!.</h4>";
                    	}
                 	}else{
                 		echo "<h4 style='text-align: center;'>We Are Sorry! The Books Are Not Available at the moment.</h4>";
                 	}

            	?>
            	<div style="text-align: center;">
            		<a href='profile.php' style="text-decoration: none;">Click Here To Continue</a>
            	</div>
            </div>
        </div>
        <div class="container-fluid footer" style="background-color: #F5F5F5; margin-bottom: 0px;">
            <div class="container">
                <p style="color: #636363; " class="left"> OLibrary.com</p>
                <p style="color: #636363; text-align: right;" class="right">&copyDBMS</p>
            </div>
        </div>
    </body>
</html>