<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

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
</head>
<body>
<?php require_once 'db.php';
$connection = connect();
if(isset($_SESSION['logged_in'])){


    $user_id=$_SESSION['logged_in']['id'];
    $sql_user="SELECT * FROM `users` WHERE `id`=$user_id";
    $res_user=mysqli_query($connection,$sql_user);
    while ($row_user=mysqli_fetch_assoc($res_user)){
        if ($row_user['occupation']=='agent'){
            header("location:Admin_panel/agent.php");
        }
    }
}
?>
<div class="navigationDesktop">






</div>



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
    <div class="row">

        <div class="col-sm-6 shadow-sm" id="bid">
            <form action="bid_backend.php" method="post" enctype="multipart/form-data">
                <h2>Fill Form for Bidding</h2>
                <br>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <label>House Pic</label>
                        <input type="file" id="bid_img" name="pic" class="form-control-file border">
                    </div>
                </div>
                <br>

                <br>
                <div class="row">
                    <div class="col-sm-8">
                        <input type="text" id="price_bid" name="bamount" class="form-control" placeholder="Start Bidding Amount">
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-8">
                        <textarea class="form-control" id="loc_bid" placeholder="Description...." name="address"></textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-8">
                        <input type="reset" name="" class="btn btn-danger" value="Clear">
                        <input type="submit" onclick="return addbid();" name="bidnow" class="btn btn-info" value="Bid Now">
                    </div>
                </div>
                <br><br>
        </div>
        </form>
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

<script type="text/javascript" src="boots/js/add_post.js"></script>
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/script.js"></script>

<script src="boots/js/jquery.js"></script>
<script src="boots/js/ajaxlibs.js"></script>
<script src="boots/js/popper.js"></script>
</body>
</html>