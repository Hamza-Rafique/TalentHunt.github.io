<!DOCTYPE html>
<?php
session_start();
include 'db.php';

if (isset($_GET['bid_placed'])){
    if ($_GET['bid_placed']=="success"){
        echo '<script>alert("Bid Placed....")</script>';
    }elseif ($_GET['bid_placed']=="fail"){
        echo '<script>alert("Bid not Placed....")</script>';
    }
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="new_boot/css/font.css">
    <link rel="stylesheet" href="public/css/style_new.css">
    <link rel="stylesheet" href="public/css/footer.css">

    <link type="text/css" rel="stylesheet" href="boots/boots4.css">


    <style type="text/css">
        .img-jmbo{
            background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),
            url('rk/back.jpg'); background-size: 100%,100%;
        }
        .container{
            margin-left: 50px;
        }

    </style>



  	<style>
  		#msg{
  			text-align: center;
  			background-color: #2C3034;
  			border-radius: 20px;
  			margin: 5cm 0cm 5cm 0cm;
  			color: red;
  			height: 55px;
  			
  		}
  		 #wrapper{
  			padding: 2vw 0 2vw 0;
  			background: #f6f6f6;
  		}
  		.img{
  			width: 100%;
  			border: 5px solid white;
  		}
  		.btn-size{
  			width: 100%;
  		}
  		.heading{
  			background-color:#2C3034;
  			color: red;
  			text-align: center;
  			border-radius: 5px;
  		}
  		.field{
  			background-color:#2C3034;
  		}
  		#bid{
  			margin-top: 1cm;
  		}
  	</style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <span href="" class="navbar-brand">TalentHunt<img src="rk/logo.png" width="100px"></span>
        <a href="profile.php" id="profile"  >
            <?php
            if(isset($_SESSION['logged_in'])){
                display_profile();}
            ?>


        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarid">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarid">
            <ul class="navbar-nav text-center ml-auto">
                <?php
                if (isset($_SESSION['logged_in'])){
                    if ($_SESSION['logged_in']['id']==2234){
                        ?>
                        <li class="nav-item">
                            <a href="Admin_panel/index.php" class="nav-link">Admin Panel</a>
                        </li>
                        <?php
                    }
                }
                ?>
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link" >About </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Catagories</a>
                    <ul class="dropdown-menu">

                        <li><a href="" class="dropdown-item"></a></li>

                        <?= show_menu();
                        ?>
                    </ul>
                </li>
                <?php
                $html='';
                if (!isset($_SESSION['logged_in'])){
                    $html .='<li class=\"nav-item\">';
                    $html .='<a href="login.php" class="nav-link">Sign In</a>';
                    $html .='</li>';
                    $html .=' <li class="nav-item">';
                    $html .='<a href="signup.php" class="nav-link">Creat Account</a>';
                    $html .='</li>';
                }
                else{
                    $html .='<li class=\"nav-item\">';
                    $html .='<a href="logout.php" class="nav-link">logout</a>';
                    $html .='</li>';
                }
                echo $html;
                ?>





                <li class="nav-item">
                    <a href="participate.php" class="nav-link">Competitions</a>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link"><span class="fa fa-shopping-cart"></span></a>
                </li>


            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
                <input name="keyword" class="form-control mr-sm-2" type="search" placeholder="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="search">Search</button>
            </form>
        </div>
</nav>
<div class="container-fluid" id="wrapper">
		<div class="container">
            <a href="adspost.php" style="float: right" class="btn btn-success text-white">Add bidding product</a><br>
        <h1>Every Bid Is Placed by 10%. From The previous one.</h1>

		<br>
		<div class="row">
			 <?php
             $conn=Connect();
			$sql="SELECT * FROM `bid_products`";
			$result=mysqli_query($conn,$sql);
			if (mysqli_num_rows($result)>0) {
 			while ($data=mysqli_fetch_assoc($result)) {
 				$img="profiles/".$data["image"];
                $current_time=time();
                $expire_time=$data['expire_time'];
                $time_remain=$expire_time-$current_time;
                $hours = floor($time_remain / 3600);
                $minutes = floor(($time_remain/ 60) % 60);
                $seconds = $time_remain % 60;
                //get bid amount
                $id=$data['id'];
                $query_max="SELECT MAX(bid_amount) AS 'maximum_bid' FROM `bidding_details` WHERE `b_id`='$id'";
                $max_query_res=mysqli_query($conn,$query_max);
                $row_query_max=mysqli_fetch_array($max_query_res);
                if ($row_query_max['maximum_bid']!=null){
                    $percentage_bid=10;
                    $max_bid_amount_previous=$row_query_max['maximum_bid'];
                    $amount_of_percentage=$max_bid_amount_previous*$percentage_bid/100;
                    $amount_required=$max_bid_amount_previous+$amount_of_percentage;
                    $new_amount_bid=ceil($amount_required );
                }else{
                    $percentage_bid=10;

                    $bid_amount=$data['bidding_amount'];
                    $percentage_amount=$bid_amount*$percentage_bid/100;
                    $amount_required=$bid_amount+$percentage_amount;
                    $new_amount_bid=ceil($amount_required );
                }
 				echo "
 					<div class='col-sm-4'>
 					    
 					    <img src='$img' class='img'>
 					    <p>Remaining Time : $hours:$minutes:$seconds</p>
 					    <p>$new_amount_bid RS required</p>
 					    <a href='bid_backend.php?bid_id=$data[id]&amount_bid=$new_amount_bid'><button class='btn btn-info btn-size'>Add Bid</button></a>
 					    
 					</div>";
 			}
 		}
 		else{

 			echo "
	<div class='container' id='msg'><h1>Bidding Products Not Available</h1></div>

	";
}
?>


		</div>
	</div>
	</div>

<footer class="section footer-classic context-dark bg-dark mt-5" style="background: #2d3246;">
    <div class="container">
        <div class="row row-30">
            <div class="col-md-4 col-xl-5">
                <div class="pr-xl-4"><a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>
                    <p>We are an creative agency, dedicated to the best result in
                        Photography, Arts and many others.</p>
                    <!-- Rights-->
                    <p class="rights"><span>©  </span><span class="copyright-year">2019</span><span> </span><span>Waves</span><span>. </span><span>All Rights Reserved.</span></p>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Contacts</h5>
                <dl class="contact-list">
                    <dt>Address:</dt>
                    <dd>Sialkot</dd>
                </dl>
                <dl class="contact-list">
                    <dt>email:</dt>
                    <dd><a href="mailto:#">usmanabbas2211@gmail.com</a></dd>
                </dl>
                <dl class="contact-list">
                    <dt>phones:</dt>
                    <dd><a href="tel:#">+92308 1234457</a>
                    </dd>
                </dl>
            </div>
            <div class="col-md-4 col-xl-3">
                <h5>Links</h5>
                <ul class="nav-list">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Help</a></li>

                    <li><a href="#">Feedback</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="row no-gutters social-container">
        <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-facebook"></span><span>Facebook</span></a></div>
        <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-instagram"></span><span>instagram</span></a></div>
        <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-twitter"></span><span>twitter</span></a></div>
        <div class="col"><a class="social-inner" href="#"><span class="icon mdi mdi-youtube-play"></span><span>google</span></a></div>
    </div>
</footer>

</body>

</html>