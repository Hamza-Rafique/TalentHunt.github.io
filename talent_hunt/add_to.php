
<?php

session_start();
include "db.php";
$conn=connect();
if (isset($_GET['cmp_id'])){
    $cmp_id=$_GET['cmp_id'];
}

$user_id=$_SESSION['logged_in']['id'];


if (isset($_POST['upload_file'])) {
    $cmp=$_POST['cmp_id'];
    $file = $_FILES['file'];

$filename = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size']/1024/1024;
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.', $filename);
$fileActulExt = strtolower(end($fileExt));

$allowed = array('jpeg', 'jpg', 'png');

if (in_array($fileActulExt, $allowed)) {
if ($fileError === 0) {

$fileNameNew = uniqid('', true) . "." . $fileActulExt;
$fileDestinatioin = 'profiles/' . $fileNameNew;
move_uploaded_file($fileTmpName, $fileDestinatioin);
    $sql="INSERT INTO `add_to`(`cmp_id`, `user_id`,`status`) VALUES ('$cmp','$user_id','$fileNameNew')";
    $res=mysqli_query($conn,$sql);

    if ($res){
        $sql1="SELECT * FROM `add_to` WHERE `cmp_id`=$cmp";
        $res1=mysqli_query($conn,$sql1);

        $row=mysqli_num_rows($res1);
        if ($row==5){
            $start_time=time();
            $end_time=time()+(24*60*60);
            $sql2="UPDATE `add_cmp` SET `start` = '$start_time', `end` = '$end_time' WHERE `id` = '$cmp';";
            $res2=mysqli_query($conn,$sql2);
        }
        header("location:participate.php?data_inserted=success");
    }
    else{
        header("location:add_to.php?data_inserted=Failed");
    }
}
}
}

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


            <form class="form-group" name="form" method="post" action="add_to.php" enctype="multipart/form-data">
                <div class="alert alert-error"></div>
                <?php require_once 'db.php';

                ?>
                <div class="row">
                    <div class="col-md-4">
                        <form class="border-white" style="border: 12px solid white; padding: 15px; border-radius: 30px;" action="add_to.php" method="POST" enctype="multipart/form-data" >
                            <input type="hidden" name="cmp_id" value="<?php echo $cmp_id ?>">
                            <textarea class="form-control btn-white" name="description" placeholder="Your Post Description here"></textarea>

                            <label>Add your Art</label>
                           <input type="file" name="file">
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


