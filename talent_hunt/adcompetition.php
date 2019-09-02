<?php
session_start();
include "db.php";
$conn=connect();

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
        .col-md-6{
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

            </ul>

        </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6 ">


            <form class="form-group" name="form" method="post" action="action.php" enctype="multipart/form-data">
                <div class="alert alert-error"></div>
                <div class="row">

                    <label >&nbsp Competition Name</label>
                    <div class="col-md-7">
                        <input id="name" class="hh2 text-white" type="text" class="form-control text-white"
                               placeholder="Enter name"  name="name">
                    </div>
                </div>










                <?php require_once 'db.php';

                ?>
                <div class="row">
                    <div class="col-md-4">
                        <form class="border-white" style="border: 12px solid white; padding: 15px; border-radius: 30px;" action="action.php" method="POST" enctype="multipart/form-data" >
                            <textarea class="form-control btn-white" name="description" placeholder="Your Post Description here"></textarea>
                            <?php
                            $sql="SELECT * FROM `my_menu` WHERE `cat_type`='category'";
                            $res=mysqli_query($conn,$sql);
                            echo '<select class="btn-dark mt-1" name="category" onchange="getValue(this.value)" >';
                            echo "<option>Select Category</option>";
                            while ($row=mysqli_fetch_array($res)) {
                                echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                            }
                            echo "</select>";
                            ?>
                            <select name="sub_category" class="btn-dark" id="get_data">
                                <option value="">Select Sub Category</option>
                            </select>
                            <input type="text" name="rate" id="rate">
                            <button type="submit" class="btn-dark mt-1" name="upload_file">UPLOAD</button>

                        </form >
                    </div>
                </div>
        </div>


        </form>

    </div>
</div>


<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/script.js"></script>
<script src="public/js/add_post_js.js"></script>

</body>
</html>
