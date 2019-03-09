<?php
	include 'databh.php';
	session_start();
	if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
		header('Location: login.php');
		exit();
	}
	$uid = $_SESSION['uid'];
    if($_POST['query']){
        $query = $_POST['query'];
    }else{
        header('location: profile.php');
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title> Exchangeagram - <?php echo $uid;?> </title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
    <link rel="stylesheet" type="text/css" href="CSS/custom_content.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <meta name="theme-color" content="#1A237E">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <style type="text/css">
    	.feedcard{
    		background-color: #FFFFFF;
    		box-shadow: 3px 3px 3px #EDE7F6;
    		min-height: 200px;
    		width: 97%;
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
                            <a class="navbar-left" href="profile.php" style="margin-top: 18px; color: #939393; text-decoration: none; font-size: 20px;"><img src="images/lo2.png" style="height: 40px; width: 40px; margin-right: 1px;"> OLibrary</a>
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
        	<div class="container content">
                <br><br><br><br><br><br><br>
                <div class="row">
                    <div class="col-sm-2 col-lg-2 col-md-2">
                    </div>
                    <div class="col-sm-8 col-lg-8 col-md-8">
                        <h2 style="color: #636363;"> Search Results for <?php echo $query;?>: </h2>
                        <hr style="border-width: 3px;">
                        <br>
                        <?php
                            $sql = "SELECT * FROM books WHERE name LIKE '".$query."%'";
                            $result = $conn->query($sql);
                            $num = mysqli_num_rows($result);
                            if($num == 0){
                                echo "<h5 style='color: #636363;'>No Books Found for ".$query."</h5>";
                            }
                            while($row = $result->fetch_assoc()){
                                $name = $row['name'];
                                $id1 = $row['id'];
                                echo "<div class='row'>";
                                    echo "<div class='col-sm-10 col-lg-10 col-md-10'>";
                                        echo "<a href='order.php?id=".$id1."' style='text-decoration:none;'><h3>".$name."</h3></a>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                    <div class="col-sm-2 col-lg-2 col-md-2">
                    </div>
                </div>
            </div>
            <br><br><br>
        </div>
        <div class="container-fluid footer" style="background-color: #F5F5F5; margin-bottom: 0px;">
            <div class="container">
                <p style="color: #636363; " class="left"> OLibrary.com</p>
                <p style="color: #636363; text-align: right;" class="right">&copySanjay Shanbhag</p>
            </div>
        </div>
    </body>
</html>
                