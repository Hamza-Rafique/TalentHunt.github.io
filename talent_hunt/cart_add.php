<?php
if (isset($_GET['id'])){
    session_start();
    include 'db.php';
    $connection=connect();
    $id1=$_GET['id'];
    $sql="SELECT * FROM `questions` WHERE `id`=$id1";
    $res=mysqli_query($connection,$sql);
    if (mysqli_num_rows($res)){
        while ($row=mysqli_fetch_assoc($res)){
            $p_id=$id1;
            $u_id=$_SESSION['logged_in']['id'];
            $p_rate=$row['rate'];
            $p_pic=$row['title'];
            $p_own=$row['user_id'];
            $p_name=$row['description'];
        }
    }


    $sql1="SELECT * FROM `cart` WHERE `user_id`=$u_id && `p_id`=$p_id";

    $result = mysqli_query($connection, $sql1);
    if(mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            header("location:index.php?already added to cart");
        }
    }else{
        $sql="INSERT INTO `cart`( `p_id`, `p_name`, `user_id`, `p_image`, `p_rate`,`p_owner`)
                    VALUES ($p_id,'$p_name',$u_id,'$p_pic',$p_rate,$p_own)";
        $res=mysqli_query($connection,$sql);
        if($res){

            echo "<script>
                alert('inserted to cart');
            </script>";
            header("location:index.php?added to cart");
        }else{
            echo "some problem occured";
        }
    }
}