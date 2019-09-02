<?php
include "db.php";
class BID
{
    private $conn, $res, $row, $sql;

    function __construct()
    {
        $this->conn = connect();
    }
    public function Add_bid_post(){
        if (isset($_POST["bidnow"])) {
            session_start();
            $owner_id = $_SESSION['user_id'];
            $prodcut_status=0;
            $f_name = basename($_FILES["pic"]["name"]);
            $f_tmp = $_FILES["pic"]["tmp_name"];
            $f_extension = explode('.', $f_name);
            $f_extension = strtolower(end($f_extension));
            $f_new = uniqid() . '.' . $f_extension;
            $store = "profiles/" . $f_new;

            $bamount = $_POST["bamount"];
            $address = $_POST["address"];
            $start_time=time();
            $expire_time=time()+(24*3600);
            //echo $f_new.$bname.$bamount.$address.$start_time;
           // die();
           // $sql = "insert into adspost(rent,advance,address,image)Values('$rent','$advance','$address','$f_new')";
            $this->sql = "INSERT INTO `bid_products` (`owner_id`, `image`,`cat_id`,`sub_cat_id`, `start_time`,`expire_time`, `bidding_amount`, `address`) VALUES ('$owner_id', '$f_new','11','49', '$start_time','$expire_time' , '$bamount', '$address');";
            if (mysqli_query($this->conn, $this->sql)) {
                if (move_uploaded_file($f_tmp, $store)) {
                    header("location:adspost.php");

                } else {
                    header("location:adspost.php");

                }
            }else{
                header("location:adspost.php?data_inserted=fail");
            }
        }

    }
    public function add_bid_amount(){
        if (isset($_REQUEST['bid_id'])&&isset($_REQUEST['amount_bid'])){
            $id=$_REQUEST['bid_id'];
            $amount=$_REQUEST['amount_bid'];
            session_start();
            $user_id=$_SESSION['user_id'];
            $this->sql="INSERT INTO `bidding_details` (`b_id`, `bid_amount`, `cust_id`) VALUES ( '$id', '$amount', '$user_id');";
            $this->res=mysqli_query($this->conn,$this->sql);
            if ($this->res){
                header('location:bidding.php?bid_placed=success');
            }else{
                header('location:bidding.php?bid_placed=fail');
            }
        }

    }
}
$obj_bid=new BID();
$obj_bid->Add_bid_post();
$obj_bid->add_bid_amount();