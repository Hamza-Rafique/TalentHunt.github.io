<?php

session_start();
if (isset($_SESSION['logged_in'])){

    $user_id=$_SESSION['logged_in']['id'];


}
include "db.php";
$conn=connect();
if (isset($_GET['allot_id'])){
    $id=$_GET['allot_id'];
    $sql_update="UPDATE `allot` SET `status`='completed' WHERE `allot_id`=$id";
    $res_update=mysqli_query($conn,$sql_update);
}




$query_img_user="SELECT * FROM `users` WHERE `id`='$user_id'";
$res_img_user=mysqli_query($conn,$query_img_user);
$row_img_user=mysqli_fetch_array($res_img_user);



?>

<!DOCTYPE html>
<html>
<head>

    <title></title>
    <link rel="stylesheet" type="text/css" href="new_boot/css/font.css">
    <link rel="stylesheet" href="public/css/style_new.css">

    <link type="text/css" rel="stylesheet" href="boots/boots4.css">
    <link rel="stylesheet" href="con.css" type="text/css">


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
                <li class="nav-item">
                    <a href="../index.php" class="nav-link">Home</a>
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
                    <a href="compitions.php " class="nav-link">Competitions</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
</nav>

<div class="container-fluid">


    <div class="row ">
        <div class="col-12">
            <div class="card card-inverse" style="background-image: url(pics/lapi.jpg);width: auto;height: 500px; border-color: #333;">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <h2 class="card-title ">Name: <?php echo $row_img_user['name'];?></h2>



                        </div>
                        <div class="col-md-4 col-sm-4 text-center">
                            <img class="btn-md" src="../profiles/<?php echo $row_img_user['picture'];?>"
                                 width="200px" height="200px" alt="" style="border-radius:50%;">
                        </div>

                    </div>
                </div>
                <div class="mt-5">

                    <?php
                    $html = '';

                    $agent=$_SESSION['logged_in']['id'];
                    $sql = "SELECT * FROM `allot` WHERE `agent_id`=$agent";

                    $result = mysqli_query($conn, $sql);
                    $html .='<table class="table ">';

                    $html .='<thead>';
                    $html .='<tr>';

                    $html .='<th scope="col">Product</th>';
                    $html .='<th scope="col">Category</th>';
                    $html .='<th scope="col">Price</th>';

                    $html .='<th scope="col">Seller</th>';
                    $html .='<th scope="col">Buyer</th>';
                    $html .='<th scope="col">Action</th></tr>';



                    $html .='</thead>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        if ($row['status']=='alloted'){
                            $cart=$row['cart_id'];
                            $sql_cart="SELECT * FROM `cart` WHERE `c_id`=$cart";
                            $res_cart=mysqli_query($conn, $sql_cart);
                            while ($row_cart=mysqli_fetch_assoc($res_cart)){
                                $html .= '<tr><td><img height="70px" width="70px" src="../profiles/'.$row_cart['p_image'].' "></td>';
                                //to check category
                                $cat_id=$row_cart['p_id'];
                                $sql_cat="SELECT * FROM `questions` WHERE `id`=$cat_id";
                                $res_cat=mysqli_query($conn, $sql_cat);
                                $row_cat=mysqli_fetch_assoc($res_cat);

                                $category=$row_cat['categories'];
                                $sub_category=$row_cat['sub_category'];
                                $sql_category="SELECT * FROM `my_menu` WHERE `id`=$category";
                                $res_category=mysqli_query($conn, $sql_category);
                                $row_category=mysqli_fetch_assoc($res_category);


                                $html .= '<td><span>'.$row_category['title'].'</span></td>';
                                $html .= '<td><span>'.$row_cart['p_rate'].'</span></td>';
                                $owner=$row_cart['p_owner'];
                                $sql_owner="SELECT * FROM `users` where `id`=$owner";
                                $res_owner=mysqli_query($conn, $sql_owner);
                                while ($row_owner=mysqli_fetch_assoc($res_owner)){
                                    $html .= '<td><img src="../profiles/'.$row_owner['picture'].'" 
                                width="40px" height="40px" style="border-radius:60%;">&nbsp'.$row_owner['name'].'</td>';
                                }
                                $seller=$row_cart['user_id'];
                                $sql_seller="SELECT * FROM `users` where `id`=$seller";
                                $res_seller=mysqli_query($conn, $sql_seller);
                                while ($row_seller=mysqli_fetch_assoc($res_seller)){
                                    $html .= '<td><img src="../profiles/'.$row_seller['picture'].'" 
                                width="40px" height="40px" style="border-radius:60%;">&nbsp'.$row_seller['name'].'</td>';
                                }



                            }


                            $html .='<td><a class="btn btn-success">Check </a><a class="btn btn-primary" 
                                    href="agent.php?allot_id='.$row['allot_id'].'">Complete</a></td></tr>';
                        }

                    }//end of while
                    $html .='</table>';
                    echo $html;
                    ?>



                </div>
            </div>

        </div>

        <script src="public/js/jquery-3.2.1.min.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
        <script src="public/js/script.js"></script>
        <script src="public/js/add_post_js.js"></script>

</body>
</html>

