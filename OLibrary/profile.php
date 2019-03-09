<?php
	include 'databh.php';
	session_start();
	if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
		header('Location: login.php');
		exit();
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
        	   <?php
                    $sql = "SELECT * FROM books";
                    $result = $conn->query($sql);
                    $flag = 0;
                    while($row = $result->fetch_assoc()){
                        if($flag == 0){
                            echo "<div class='row'>";
                        }
                        echo "<div class='col-sm-4 col-lg-4 col-md-4'>";
                            echo "<div class='center-block feedcard'>";
                                echo "<div class='hed'>";
                                    echo "<br>";
                                    echo "<h4 style='text-align: center;'>".$row['name']."</h4>";
                                echo "<br>";
                                echo "</div>";
                                echo "<br>";
                                echo "<h5 style='margin-left: 10px; color: #636363;' class='left'>Author: ".$row['author']."</h5>";
                                echo "<h5 style='display:inline; text-align: right; margin-right: 12px;' class='right'>Copies: ".$row['copies']."</h5>";
                                echo "<br><hr>";
                                $descript = $row['description'];
                                if ((strlen($descript) > 300) && (strlen($descript) > 1)) { 
                                    $whitespaceposition = strpos($descript," ",295); 
                                    $descript = substr($descript, 0, $whitespaceposition);
                                    $descript = $descript."...";
                                }
                                echo "<p>".$descript."</p>";
                                echo "<br>";
                                $id = $row['id'];
                                echo "<div style='text-align:center;'>";
                                echo "<a href='order.php?id=".$id."' class='bton1'>Order Book</a>";
                                echo "<br><br>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                        $flag = $flag + 1;
                        if($flag == 3){
                            echo "</div>";
                            echo "<br><br>";
                            $flag = 0;
                        }
                    }
                    if($flag != 0){
                        echo "</div>";
                    }
                ?>
                <br><br><br>
            </div>
        </div>
        
        </body>
    </html>
