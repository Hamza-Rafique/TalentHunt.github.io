
<?php
include 'db.php';
$conn=connect();
if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `users` WHERE `email`='$email' && `password`=$password && `occupation`='admin'";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res)>0){
        session_start();
        $row=mysqli_fetch_assoc($res);
        $id=$row['id'];
        $_SESSION["logged_in"]["id"] = "$id";

        header("location:index.php?found");

    }
    else{
        header("location:index.php?not_found");
    }


}if (isset($_POST['signup_agent'])){

    $name=$_POST['name'];

    $email=$_POST['Mail'];
    $occupation="agent";
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
                $fileDestinatioin='../profiles/'.$fileNameNew;
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


    $sql = "INSERT INTO `users`( `name`, `email`,`occupation`, `password`, `repassword`, `picture`, `gender`, `time`)
                                  VALUES ( '$name', '$email','$occupation','$password', '$repassword', '$fileNameNew', '$gender', NOW())";

    $res=mysqli_query($conn,$sql);

    if($res){
        echo '<script>alert("accout has created"); </script>';
        header("location:index.php?data_inserted=success");
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
if (isset($_POST['add_cat'])){
    $name=$_POST['name'];
    $sql="INSERT INTO `my_menu`(`title`, `parent_id`, `cat_type`) VALUES ('$name',2,'category')";
    $res1 = mysqli_query($conn, $sql);

        header("location:index.php");


}
if (isset($_POST['add_sub_cat'])){
    $category=$_POST['category'];
    $sub_category=$_POST['sub_cat'];
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
    $fileDestinatioin = '../Video/' . $fileNameNew;
    move_uploaded_file($fileTmpName, $fileDestinatioin);


    $sql = "INSERT INTO `my_menu`(`title`, `parent_id`, `cat_type`,`image`) VALUES ('$sub_category',$category,'sub_category','$fileNameNew')";
    $res1 = mysqli_query($conn, $sql);

    header("location:index.php");
}

}
}
if (isset($_POST['alloting'])){
    $cart=$_POST['cart'];
    $agent=$_POST['agent'];
    $connection = connect();
    $sql_cart="INSERT INTO `allot`(`cart_id`, `agent_id`,`status`) VALUES ($cart,$agent,'alloted')";
    $res=mysqli_query($conn,$sql_cart);

    header("location:all_carts.php?inserted=success");

}

if (isset($_POST['add_competition'])){
    $name=$_POST['name'];
    $category = $_POST['category'];
    $sub_category = $_POST['sub_category'];
    $sql="INSERT INTO `add_cmp`(`name`, `cat`, `sub_cat`) VALUES ('$name',$category,$sub_category)";
    $res1 = mysqli_query($conn, $sql);

    if ($res1) {
        header("location:compitions.php?data_inserted=success");

    } else {
        header("location:adcompetition.php?data_inserted=fail");
    }

}

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


</body>
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/script.js"></script>

<script src="boots/js/jquery.js"></script>
<script src="boots/js/ajaxlibs.js"></script>
<script src="boots/js/popper.js"></script>
</html>
