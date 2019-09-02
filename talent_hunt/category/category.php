<?php
if (isset($_REQUEST['cat'])){
    $id=$_REQUEST['cat'];
    $conn=mysqli_connect("localhost","root","","search_engine_tl");
    $query="SELECT * FROM `my_menu` WHERE `parent_id`='$id'";
    $res=mysqli_query($conn,$query);
    if (mysqli_num_rows($res)>0){
        while ($row=mysqli_fetch_array($res)){
            echo '<a href="subcategory.php?subcat='.$row['id'].'">'.$row['title'].'</a>'.'<br>';

        }
    }else{
        echo "There is no subcategory here";
    }
}

