<?php
function Connection(){
    $conn=mysqli_connect("localhost","root","","search_engine_tl");
    if (!$conn){
        die("Error In Connection To DB");
    }
    return $conn;
}
function show_menu(){
    $conn=Connection();
    $menus="";
    $menus=generate_multi_level_menus($conn);
    return $menus;
}
function generate_multi_level_menus($connection,$parent_id=null){
    $sql="";
    $menuu="";
    if (is_null($parent_id)){
        $sql="SELECT * FROM `my_menu` WHERE `parent_id` IS NULL ";

    }else{

        $sql="SELECT * FROM `my_menu` WHERE `parent_id` ='$parent_id'";
    }
    $result=mysqli_query($connection,$sql);
    while ($row=mysqli_fetch_assoc($result)){
        if ($row['page']){
            if ($row['cat_type']){
                if ($row['cat_type']=='category'){
                    $menuu.='<li><a href="category.php?cat='.$row['id'].'">'.$row['title'].'</a>';
                }elseif ($row['cat_type']=='sub_category'){
                    $menuu.='<li><a href="subcategory.php?subcat='.$row['id'].'">'.$row['title'].'</a>';
                }
            }else{
                $menuu.='<li><a href="#">'.$row['title'].'</a>';
            }

        }else{
            $menuu.='<li><a href="#">'.$row['title'].'</a>';
        }
        $menuu.='<ul>'.generate_multi_level_menus($connection,$row['id']).'</ul>';
        $menuu.="</li>";
    }
    return $menuu;
}