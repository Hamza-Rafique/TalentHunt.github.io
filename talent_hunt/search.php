<html>
<link rel="stylesheet" type="text/css" href="new_boot/css/font.css">
<link rel="stylesheet" href="public/css/style_new.css">
<link rel="stylesheet" href="public/css/footer.css">

<link type="text/css" rel="stylesheet" href="boots/boots4.css">
<link rel="stylesheet" href="con.css" type="text/css">

<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <span href="" class="navbar-brand">TalentHunt<img src="rk/logo.png" width="100px"></span>
        <a href="profile.php" id="profile"  >
            <?php
            include 'db.php';
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
                    <a href="#" class="nav-link" >About </a>
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
<?php

if (isset($_POST['search'])){

 $keyword=$_POST['keyword'];

 $connection=connect();
 $sql="SELECT * FROM `users` WHERE `name`LIKE '$keyword'";
 $res=mysqli_query($connection,$sql);
 if (mysqli_num_rows($res)){
     while ($row=mysqli_fetch_assoc($res)) {
         $html ='';
         $html .= '<div class="card mt-3 bg-dark ml-lg-5" style="width: 800px;height: 100px; display: inline-block; margin-right: 15px;color:white;">';





             $value = $row['id'];

             $html .= '';
             $html .= '<a  href="info.php?info_id=' . $value . '"><img class" cart-title" src="profiles/' . $row['picture'] . '"
                    width="60px" height="60px" style="border-radius:50%;">' . '&nbsp<b class="text-white">' . $row['name'] . '</b></a>
                    ';
             $html .= '<div></div>';


         echo $html;
     }
 }else{
     echo "no resluts";
 }
}?>
</body>
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/script.js"></script>

<script src="boots/js/jquery.js"></script>
<script src="boots/js/ajaxlibs.js"></script>
<script src="boots/js/popper.js"></script>
</html>
