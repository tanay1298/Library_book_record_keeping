<?php
	include 'databh.php';
	session_start();
	if(!isset($_SESSION['uid']) || empty($_SESSION['uid'])){
		header('Location: login.php');
		exit();
	}
	$uid = $_SESSION['uid'];
    if(!isset($_GET['id']) || empty($_GET['id'])){
        header('Location: profile.php');
        exit();
    }
    $id = $_GET['id'];
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
    <script type="text/javascript">
            function loadDoc(){
                document.getElementById('resudiv').innerHTML = "";
                var review = $("#review");
                var id = "<?php echo $id; ?>";
                var url = "submitreview.php";
                $.post(url,{review1: review.val(), id1: id}, function(data){
                    $('.resudiv').append(data);
                });
            }
            function wishlist(){
                document.getElementById('resudiv1').innerHTML = "";
                var id = "<?php echo $id; ?>";
                var url = "wishlist.php";
                $.post(url,{id1: id}, function(data){
                    $('.resudiv1').append(data);
                });
            }
      </script>
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
                    <div class="col-sm-1 col-lg-1 col-md-1">
                    </div>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        <?php
                            $sql = "SELECT * FROM books WHERE id = '$id'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $name = $row['name'];
                            $descript = $row['description'];
                            echo "<h2 style='text-align: center;'>".$name."</h2>";
                            echo "<br>";
                            echo "<p style='text-align: justify; font-size: 19px;'>".$descript."</p>";
                            echo "<br>";
                            $sql1 = "SELECT id FROM issued WHERE bid = '$id'";
                            $result1 = $conn->query($sql1);
                            $ava = mysqli_num_rows($result1);
                            $tot = $row['copies'];
                            $ava = $tot - $ava;
                            echo "<p>Availability: ".$ava."</p>";
                            echo "<div class='row'>";
                                echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                                    echo "<a href='orderprocess.php?id=".$id."' class='bton1 center-block'>Order</a>";
                                echo "</div>";
                                echo "<div class='col-sm-6 col-md-6 col-lg-6'>";
                                    echo "<a onclick='wishlist()' class='bton1 center-block'>Add To Wishlist</a>";
                                echo "</div>";
                            echo "</div>";
                        ?>
                        <br>
                        <div class="resudiv1" id='resudiv1'>
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-5 col-lg-5 col-md-5">
                        
                        <div class="center-block hist">
                            <div class="histhead">
                                <h3 style="text-align: center;">Issue History</h3>
                            </div>
                            <br>
                            <?php
                                $sql = "SELECT * FROM issued WHERE bid = '$id'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                    $name = $row['uid'];
                                    $date = $row['date1'];
                                    $datearr = explode(" ", $date);
                                    $date1 = $datearr[0];
                                    echo "<h4 style='display: inline; float: left; margin-left: 10px;'>".$name."</h4>";
                                    echo "<h4 style='display: inline; float: right; margin-right: 10px;'>".$date1."</h4>";
                                    echo "<br>";
                                    echo "<hr>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-1 col-lg-1 col-md-1">
                    </div>
                </div>
                <br>
                <hr style="border-width: 2px; border-color: #78909C;">
                <br>
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4 col-lg-4 col-md-4">
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                            <textarea class="form-control" name="review" id="review" placeholder="Leave a Review" style="resize: none; height: 100px;"></textarea>
                        </div>
                        <div class="col-sm-4 col-lg-4 col-md-4">
                        </div>
                    </div>
                </div>
                <div class="form-group">        
                    <div style="text-align: center;">
                        <p onclick="loadDoc()" class="btn btn-default">Submit</p>
                    </div>
                </div>
                <br>
                <hr>
                <div class="resudiv" id="resudiv">
                    <?php
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
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>