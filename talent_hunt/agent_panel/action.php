
<?php
include 'db.php';
$conn=connect();
if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="SELECT * FROM `users` WHERE `email`='$email' && `password`=$password";
    $res=mysqli_query($conn,$sql);
    if (mysqli_num_rows($res)>0){
        session_start();
        $row=mysqli_fetch_assoc($res);
        $id=$row['id'];
        $_SESSION["agent"] = "$id";

        header("location:index.php?found");

    }
    else{
        header("location:index.php?not_found");
    }


}
if (isset($_GET['allot_id'])){
    $id=$_GET['allot_id'];
    $sql_update="UPDATE `allot` SET `status`='completed' WHERE `allot_id`=$id";
    $res_update=mysqli_query($conn,$sql_update);
    header("location:carts.php?completed");
}
