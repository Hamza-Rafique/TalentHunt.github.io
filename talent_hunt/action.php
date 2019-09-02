<html>
<head>
    <link rel="stylesheet" type="text/css" href="new_boot/css/font.css">
    <link rel="stylesheet" href="public/css/style_new.css">
    <link rel="stylesheet" href="public/css/footer.css">

    <link type="text/css" rel="stylesheet" href="boots/boots4.css">
    <link rel="stylesheet" href="con.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <span href="" class="navbar-brand">TalentHunt<img src="rk/logo.png" width="100px"></span>
        <a href="profile.php" id="profile"  >
            <?php
            include 'db.php';
            session_start();
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
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About </a>
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

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
</nav>

<?php

$conn=connect();


if (isset($_POST['signup'])){

    $name=$_POST['name'];

    $email=$_POST['Mail'];

    $sql="SELECT * FROM `users` WHERE email='$email'";
    $res=mysqli_query($conn,$sql);


    if(mysqli_num_rows($res)){

        echo "account has already created on this email";


        header("location:signup.php?data_inserted=exist");
        die();
    }
    else
        echo "no account";
    $password=$_POST['password'];
    $repassword=$_POST['confirm'];
    $gender=$_POST['gender'];


    $file=$_FILES['file'];

    $filename=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];
    $fileType=$_FILES['file']['type'];

    $fileExt=explode('.', $filename);
    $fileActulExt = strtolower(end($fileExt));

    $allowed=array('jpeg','jpg','png');

    if (in_array($fileActulExt, $allowed)) {
        if ($fileError===0) {
            if ($fileSize<1000000) {
                $fileNameNew=uniqid('',true).".".$fileActulExt;
                $fileDestinatioin='profiles/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestinatioin);


                //show


                // header("location: form1.php?upload success");
            }
            else{
                echo "your file is too big";
            }
        }
        else{
            echo "there was an error in uploading the file";
        }
    }
    else{
        echo "you cannot upload files of this type";
    }
    // echo $name." ".$email." ".$password." ".$repassword." ".$gender." ".$about." ".$fileNameNew;
    // die();


    $sql = "INSERT INTO `users`( `name`, `email`, `password`, `repassword`, `picture`, `gender`, `time`)
                                  VALUES ( '$name', '$email','$password', '$repassword', '$fileNameNew', '$gender', NOW())";

    $res=mysqli_query($conn,$sql);
    //echo "hamza joshan";
    if($res){
        echo '<script>alert("accout has created"); </script>';
        header("location:login.php?data_inerted=success");
        //  echo "inserted";
    }else{
        header("location:signup.php?data_inserted=fail");
    }
}

if (isset($_POST['img_upload'])) {
    echo "image upload";
}
$connection=connect();
if (isset($_POST['upload_file'])) {

    if (isset($_SESSION['logged_in'])) {

        $user_id = $_SESSION['logged_in']['id'];


    }


    $query_user = "SELECT * FROM `users` WHERE `id`='$user_id'";
    $res_user = mysqli_query($connection, $query_user);
    $row_user = mysqli_fetch_assoc($res_user);

    $about = $_POST['about'];//2

    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    $description = $_POST['description'];//3
    $rate=$_POST['rate'];//4
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


            //show
            $sql1 = "INSERT INTO `questions`(`title`, `description`, `user_id`, `categories`, `time_of_add`,`sub_category`,`rate`)
    VALUES ('$fileNameNew','$description','$user_id','$category',NOW(),'$sub_category','$rate')";

            $res1 = mysqli_query($conn, $sql1);
            //echo "hamza joshan";
            if ($res1) {
                header("location:profile.php?data_inserted=success");
                //  echo "inserted";
            } else {
                header("location:profile.php?data_inserted=fail");
            }
        } // header("location: form1.php?upload success");


        else {
            echo "there was an error in uploading the file";
        }
    } else {
        if ((strtolower($fileType) != "video/mpg") && (strtolower($fileType) != "video/wma") && (strtolower($fileType) != "video/mov")
            && (strtolower($fileType) != "video/flv") && (strtolower($fileType) != "video/mp4") && (strtolower($fileType) != "video/avi")
            && (strtolower($fileType) != "video/qt") && (strtolower($fileType) != "video/wmv") && (strtolower($fileType) != "video/wmv"))
        {
            $message= "Video Format Not Supported !";

        }else
        {
            $file = $_FILES['file'];

            $filename = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size']/1024/1024;
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileExt = explode('.', $filename);
            $fileActulExt = strtolower(end($fileExt));
            $fileNameNew = uniqid('', true) . "." . $fileActulExt;
            $fileDestinatioin = 'pics/' . $fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestinatioin);
            echo $fileNameNew;

            $sql1 = "INSERT INTO `questions`(`title`, `description`, `user_id`, `categories`, `time_of_add`,`sub_category`,`rate`)
    VALUES ('$fileNameNew','$description','$user_id','$category',NOW(),'$sub_category','$rate')";

            $res1 = mysqli_query($conn, $sql1);

            if ($res1) {
                header("location:profile.php?data_inerted=success");

            } else {
                header("location:profile.php?data_inserted=fail");
            }
            $message="Video Uploaded Successfully!";
        }


    }
}

if (isset($_GET['recent'])) {

    ?>
    <div class="row">
        <h1  class="section-title ml-5">Recent Uploads<i class="fa fa-chevron-down scroll-down-right"></i></h1>
    </div>
<?php
    recent();
}
if(isset($_GET['trending'])){
    ?>
    <div class="row">
        <h1  class="section-title ml-5">Trending Posts<i class="fa fa-chevron-down scroll-down-right"></i></h1>
    </div>
    <?php
    trending($_POST);

}

if(isset($_GET['performers'])){
    ?>
    <div class="row">
        <h1  class="section-title ml-5">Top Performers<i class="fa fa-chevron-down scroll-down-right"></i></h1>
    </div>
    <?php
    show_performers();
}
?>
<div class="row">

    <div class="btn-group-lg mt-lg-5" style="margin-left: 200px">
        <a href="action.php?recent" class="btn btn-outline-dark">See All Recent Uploads</a>
        <a href="action.php?performers" class="btn btn-outline-dark">See top performers</a>

        <a href="action.php?trending" class="btn btn-outline-dark"> See trending items</a>
    </div>

</div>
<footer class="section footer-classic context-dark bg-dark mt-5" style="background: #2d3246;">
    <div class="container">
        <div class="row row-30">
            <div class="col-md-4 col-xl-5">
                <div class="pr-xl-4">
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
