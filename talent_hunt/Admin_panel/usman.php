<?php
include "db1.php";
if (isset($_POST['cat_value'])){
    $id=$_POST['value_menu'];
    $conn=connect();
    $sql="SELECT * FROM `my_menu` WHERE `parent_id`='$id'";
    $res=mysqli_query($conn,$sql);
    $html="";
    while ($row=mysqli_fetch_array($res)){
        $html.='<option value="'.$row['id'].'">'.$row['title'].'</option>';
    }
    echo $html;
}
?>

