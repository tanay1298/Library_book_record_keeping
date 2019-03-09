<?php
	session_start();
	include 'databh.php';
	if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
		header('Location: login.php');
		exit();
	}
	$uid = $_SESSION['uid'];
	$sql = "SELECT name FROM users WHERE uid = '$uid'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$username = $row['name'];
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
    		min-height: 200px;
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
            	<div class="row">
        			<div class="col-sm-5 col-lg-5 col-md-5">
        				<img src='images/alternate2.png' style='width: 170px; height: 170px; border-radius: 50px; border:4px solid #0288D1;' class='center-block'/>
        			</div>
        			<div class="col-sm-7 col-lg-7 col-md-7">
        				<?php
        					echo "<h2>".$username."</h2>";
        					echo "<p>@".$uid."</p>";
        					$sql = "SELECT id FROM issued WHERE uid = '$uid'";
        					$result = $conn->query($sql);
        					$issuednumber = mysqli_num_rows($result);
        					echo "<br>";
        					echo "<h4 style='display: inline;'>".$issuednumber." Reads</h4>";
                            echo "<span id = 'wl'><a style='text-decoration: none; margin-left: 15px;' href='user.php?tye=1'>View Wishlist</a></span>";
        				?>
        			</div>
        		</div>
        		<br>
        		<hr style="border-width: 3px;">
        		<br>
                <?php
                    if(isset($_GET['tye']) && !empty($_GET['tye'])){
                       ?>
                       <script type="text/javascript">
                           var abc = document.getElementById('wl');
                           abc.innerHTML = "";
                           abc.innerHTML = "<a style='text-decoration: none; margin-left: 15px;' href='user.php'>View Orders</a>";
                       </script>
                       <div class="row">
                            <div class="col-sm-3 col-lg-3 col-md-3">
                            </div>
                            <div class="col-sm-6 col-lg-6 col-md-6">
                                <?php
                                    $sql = "SELECT * FROM wishlist WHERE uid = '$uid' ORDER BY id DESC";
                                    $result = $conn->query($sql);
                                    $num = mysqli_num_rows($result);
                                    if($num == 0){
                                        echo "<p style='text-align: center;'>No Books Added Yet!</p>";
                                    }
                                    while($row = $result->fetch_assoc()){
                                        $bid = $row['bid'];
                                        $sql1 = "SELECT * FROM books WHERE id = '$bid'";
                                        $result1 = $conn->query($sql1);
                                        $row1 = $result1->fetch_assoc();
                                        $bname = $row1['name'];
                                        $bdescript = $row1['description'];
                                        $bauthor = $row1['author'];
                                        echo "<div class='feedcard center-block'>";
                                            echo "<br>";
                                            echo "<h3 style='margin-left: 10px;'>".$bname."</h3>";
                                            echo "<hr>";
                                            echo "<p style='margin-left: 10px;'>".$bdescript."</p>";
                                            echo "<br>";
                                        echo "</div>";
                                        echo "<br><br>";
                                    }
                                ?>
                            </div>
                            <div class="col-sm-3 col-lg-3 col-md-3">
                            </div>
                        </div>
                       <?php 
                    }else{
                ?>
        		<div class="row">
        			<div class="col-sm-3 col-lg-3 col-md-3">
        			</div>
        			<div class="col-sm-6 col-lg-6 col-md-6">
        				<?php
        					$sql = "SELECT * FROM issued WHERE uid = '$uid' ORDER BY id DESC";
        					$result = $conn->query($sql);
        					$num = mysqli_num_rows($result);
        					if($num == 0){
        						echo "<p style='text-align: center;'>No Orders Yet!</p>";
        					}
        					while($row = $result->fetch_assoc()){
        						$bid = $row['bid'];
        						$date = $row['date1'];
        						$sql1 = "SELECT * FROM books WHERE id = '$bid'";
        						$result1 = $conn->query($sql1);
        						$row1 = $result1->fetch_assoc();
        						$bname = $row1['name'];
        						$bdescript = $row1['description'];
        						$bauthor = $row1['author'];
        						echo "<div class='feedcard center-block'>";
        							echo "<br>";
        							echo "<h3 style='margin-left: 10px;'>".$bname."</h3>";
        							echo "<p style='margin-left: 10px;'>".$date."</p>";
        							echo "<hr>";
        							echo "<p style='margin-left: 10px;'>".$bdescript."</p>";
        							echo "<br>";
        						echo "</div>";
        						echo "<br><br>";
        					}
        				?>
        			</div>
        			<div class="col-sm-3 col-lg-3 col-md-3">
        			</div>
        		</div>
                <?php
            }
                ?>
            </div>
            <br><br>
        </div>
        <div class="container-fluid footer" style="background-color: #F5F5F5; margin-bottom: 0px;">
            <div class="container">
                <p style="color: #636363; " class="left"> OLibrary.com</p>
                <p style="color: #636363; text-align: right;" class="right">&copyDBMS</p>
            </div>
        </div>
    </body>
</html>