<?php
include 'db.php';
session_start();
?>
<html>
<head>
    <title>Home Page|TalentHunt</title>
    <link rel="stylesheet" type="text/css" href="new_boot/css/font.css">
    <link rel="stylesheet" href="public/css/style_new.css">
    <link rel="stylesheet" href="public/css/footer.css">

    <link type="text/css" rel="stylesheet" href="boots/boots4.css">
    <link rel="stylesheet" href="con.css" type="text/css">
    <style type="text/css">
    	body{ background-image: url(aboutuspic.jpg); }
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
                            <a href="Admin.php" class="nav-link">Admin Panel</a>
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
                    <a href="#" class="nav-link">Competitions</a>
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

<div class="container-fluid text-warning text-center mt-5">
	<h2>TALENT HUNT, THE SINGLE PLATFORM FOR EVERY ARTFORM</h2><br><br>
	<h3>FOR THE ARTIST</h3><br><br>
	<p>Whether you are a musician, dancer, painter, author, actor, freestyler, magician, DJ, film maker, script writer, comedian,
        photographer, <br> journalist, model, tattoo artist, personality, or something we just have not discovered yet, then TalentHunt
        is the place for you.</p><br><br>
	
	<h3>IT’S ORGANISED</h3><br><br>
	<p>Every artform is different and every different artform can have a different platform, in the form of many categories and sub categories.<br>
Look for yourself, there are over 100 different music sub categories, so the end user can find what they really want, and the artist is where <br> they need to be.

This applies to every Artform.<br>

This is a place where break dancer can compete with the painter<br>

There are no boundaries!</p><br><br>
<h3>THE CLIMB</h3><br><br>
<p>Each artist has their own page to showcase their work, and on this page is a chart.<br>
The more votes your work gets on your page, the higher it will rank in your personal chart.<br>
This is a good indicator for an artist on which direction, they should be heading.<br></p><br><br>
<h3>THE END USER</h3><br><br>
<p>
Without you TalnetHunt doesn’t exist.<br>

Use TalentHunt as a place to discover new talent and be the first to bring this talent to the surface.<br>

Register with detail, the art types you are interested in, and only this art will be brought to your attention.<br>

Create or be part of communities that share your passion of all things art, and share what you have discovered.<br>

Vote to encourage, or comment to discourage, it’s up to you.<br></p><br><br>
</div>
<footer class="section footer-classic context-dark bg-dark mt-5" style="background: #2d3246;">
    <div class="container">
        <div class="row row-30">
            <div class="col-md-4 col-xl-5">
                <div class="pr-xl-4"><a class="brand" href="index.html">
                        </a>
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
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/script.js"></script>

<script src="boots/js/jquery.js"></script>
<script src="boots/js/ajaxlibs.js"></script>
<script src="boots/js/popper.js"></script>
</html>