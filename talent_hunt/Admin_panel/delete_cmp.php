<?php
session_start();
include "db.php";
$conn=connect();
$id=$_GET['cmp_id'];
$sql="DELETE  FROM `add_cmp` WHERE `id`=$id";
$res=mysqli_query($conn,$sql);
header("location:competitions.php");
