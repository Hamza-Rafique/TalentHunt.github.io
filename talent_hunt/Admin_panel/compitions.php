<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Like & Dislike System</title>
    <link rel="stylesheet" type="text/css" href="new_boot/css/font.css">


    <link type="text/css" rel="stylesheet" href="boots/boots4.css">

    <style type="text/css">

        #g{
            color: white;
            text-align: center;
            font-family: sans-serif;
            font-size:  30px;
            font-weight: bold;
        }
        #glyph{
            color: white;
            height: 500px;
            width: 500px;
        }
        .col-md{
            margin-top: 80px;

            box-shadow: -1px 1px 60px 10px black;
            background: rgb(0,0,0,0.4);
        }
        label{
            margin-top: 35px;
            font-size: 20px;
        }
        .fas{
            margin-top: 35px;
        }
        .hh2{
            background: transparent;
            border-radius: 0px;
            border: 0px;
            border-bottom: 1px solid white;
            font-size:18px;
            margin-top: 35px;
            height: 40px;
            margin-left: 45px;
        }
        .img-jmbo{
            background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),
            url('rk/slid1.jpg'); background-size: 100%,100%;
        }
        .container{
            margin-left: 50px;

        }


    </style>

</head>
<body id="g">
<?php
$user_id=$_SESSION['logged_in']['id'];
if ($user_id==2234){
    ?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <span href="" class="navbar-brand">TalentHunt<img src="rk/logo.png" width="100px"></span>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarid">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarid">
            <ul class="navbar-nav text-center ml-5">
                <li class="nav-item ">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item " >
                    <a href="adcompetition.php" class="nav-link" style="color: #c69500">Add Competition</a>
                </li>

            </ul>

        </div>
</nav>

<div class="container" >
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md ">
            <?php
            include "db.php";
            $conn=connect();
            echo "All competitions";
            $sql="SELECT * FROM `add_cmp`";
            $res=mysqli_query($conn,$sql);
            $html='';
            $html .='<table class="table">';
            $html .='<thead>';
            $html .='<tr>';

            $html .="<br><th scope=\"col\">name</th>  <th scope=\"col\">category </th>  <th scope=\"col\">sub_category</th><th>action</th> ";
            $html .='</tr>';


            while ($row=mysqli_fetch_array($res)) {
                $cat=$row['cat'];
                $sub_cat=$row['sub_cat'];
                $sql1="SELECT * FROM `my_menu` WHERE `id`=$cat";
                $res1=mysqli_query($conn,$sql1);

            while ($row1=mysqli_fetch_array($res1)) {
                $sql2 = "SELECT * FROM `my_menu` WHERE `id`=$sub_cat";
                $res2 = mysqli_query($conn, $sql2);

                while ($row2=mysqli_fetch_array($res2)) {
                $html .= '<tr><td>' . $row['name'] . '</td><td>' . $row1['title'] . '</td><td>' . $row2['title'] . '</td><td><a  href="delete_cmp.php?cmp_id=' . $row['id'] . '" class="btn btn-danger ml-2">Delete</a></td>';
            }}
            }
            echo $html;
            ?>



        </div>
    </div>

    <?php

}
else{
    header("location:../login.php?sign_in");
}
?>


<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/script.js"></script>
<script src="public/js/add_post_js.js"></script>

</body>
</html>
