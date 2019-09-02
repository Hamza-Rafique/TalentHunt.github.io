<?php
function connect(){
    $connection = mysqli_connect('localhost', 'root', '', 'search_engine_tl');
    if(!$connection){
        die('Failed to connect db');
    }
    return $connection;
}
function display_profile(){
    if (isset($_SESSION['agent'])){

        $user_id=$_SESSION['agent'];


    }
    $connection = connect();
    $sql="SELECT * FROM `users` WHERE `id`='$user_id'";
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result)){
        $row=mysqli_fetch_assoc($result);
        $html='';
        $html .= '<img src="../profiles/'.$row['picture'].'" width="60px" height="60px" style="border-radius:60%;">';
        $html .= '<span style="color: white;font-weight: bold;font-size: large">&nbsp'.$row['name'].'</span>';

        echo $html;
    }

}//end of display profiles function
function display_cart(){
    $conn=connect();
    $html = '';

    $agent=$_SESSION['agent'];
    $sql = "SELECT * FROM `allot` WHERE `agent_id`=$agent";

    $result = mysqli_query($conn, $sql);
    $html .='<table class="table ">';

    $html .='<thead>';
    $html .='<tr>';

    $html .='<th scope="col">Product</th>';
    $html .='<th scope="col">Category</th>';
    $html .='<th scope="col">Price</th>';

    $html .='<th scope="col">Seller</th>';
    $html .='<th scope="col">Buyer</th>';
    $html .='<th scope="col">Action</th></tr>';



    $html .='</thead>';
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['status']=='alloted'){
            $cart=$row['cart_id'];
            $sql_cart="SELECT * FROM `cart` WHERE `c_id`=$cart";
            $res_cart=mysqli_query($conn, $sql_cart);
            while ($row_cart=mysqli_fetch_assoc($res_cart)){
                $html .= '<tr><td><img height="70px" width="70px" src="../profiles/'.$row_cart['p_image'].' "></td>';
                //to check category
                $cat_id=$row_cart['p_id'];
                $sql_cat="SELECT * FROM `questions` WHERE `id`=$cat_id";
                $res_cat=mysqli_query($conn, $sql_cat);
                $row_cat=mysqli_fetch_assoc($res_cat);

                $category=$row_cat['categories'];
                $sub_category=$row_cat['sub_category'];
                $sql_category="SELECT * FROM `my_menu` WHERE `id`=$category";
                $res_category=mysqli_query($conn, $sql_category);
                $row_category=mysqli_fetch_assoc($res_category);


                $html .= '<td><span>'.$row_category['title'].'</span></td>';
                $html .= '<td><span>'.$row_cart['p_rate'].'</span></td>';
                $owner=$row_cart['p_owner'];
                $sql_owner="SELECT * FROM `users` where `id`=$owner";
                $res_owner=mysqli_query($conn, $sql_owner);
                while ($row_owner=mysqli_fetch_assoc($res_owner)){
                    $html .= '<td><img src="../profiles/'.$row_owner['picture'].'" 
                                width="40px" height="40px" style="border-radius:60%;">&nbsp'.$row_owner['name'].'</td>';
                }
                $seller=$row_cart['user_id'];
                $sql_seller="SELECT * FROM `users` where `id`=$seller";
                $res_seller=mysqli_query($conn, $sql_seller);
                while ($row_seller=mysqli_fetch_assoc($res_seller)){
                    $html .= '<td><img src="../profiles/'.$row_seller['picture'].'" 
                                width="40px" height="40px" style="border-radius:60%;">&nbsp'.$row_seller['name'].'</td>';
                }



            }


            $html .='<td><a href="check.php?check_id='.$cart.'" class="btn btn-success">Check </a><a class="btn btn-primary" 
                                    href="action.php?allot_id='.$row['allot_id'].'">Complete</a></td></tr>';
        }

    }//end of while
    $html .='</table>';
    echo $html;
}
function check_cart($cart){
    $html ='';
    $conn=connect();
    $sql_cart="SELECT * FROM `cart` WHERE `c_id`=$cart";
    $res_cart=mysqli_query($conn, $sql_cart);
    $html .='<table class="table ">';
    $html .='<caption><a class="btn btn-primary" 
                                    href="action.php?allot_id='.$cart.'">Complete</a></caption>';
    $html .='<thead>';
    $html .='<tr>';

    $html .='<th scope="col">Product</th>';
    $html .='<th scope="col">Category</th>';
    $html .='<th scope="col">Price</th>';

    $html .='<th scope="col">Seller</th>';
    $html .='<th scope="col">Buyer</th>';




    $html .='</thead>';
    while ($row_cart=mysqli_fetch_assoc($res_cart)){
        $html .= '<tr><td><img height="70px" width="70px" src="../profiles/'.$row_cart['p_image'].' "></td>';
        //to check category
        $cat_id=$row_cart['p_id'];
        $sql_cat="SELECT * FROM `questions` WHERE `id`=$cat_id";
        $res_cat=mysqli_query($conn, $sql_cat);
        $row_cat=mysqli_fetch_assoc($res_cat);

        $category=$row_cat['categories'];
        $sub_category=$row_cat['sub_category'];
        $sql_category="SELECT * FROM `my_menu` WHERE `id`=$category";
        $res_category=mysqli_query($conn, $sql_category);
        $row_category=mysqli_fetch_assoc($res_category);


        $html .= '<td><span>'.$row_category['title'].'</span></td>';
        $html .= '<td><span>'.$row_cart['p_rate'].'</span></td>';
        $owner=$row_cart['p_owner'];
        $sql_owner="SELECT * FROM `users` where `id`=$owner";
        $res_owner=mysqli_query($conn, $sql_owner);
        while ($row_owner=mysqli_fetch_assoc($res_owner)){
            $html .= '<td><img src="../profiles/'.$row_owner['picture'].'" 
                                width="40px" height="40px" style="border-radius:60%;">&nbsp'.$row_owner['name'].'<br>
                                <p>'.$row_owner['email'].'</p></td>';
        }
        $seller=$row_cart['user_id'];
        $sql_seller="SELECT * FROM `users` where `id`=$seller";
        $res_seller=mysqli_query($conn, $sql_seller);
        while ($row_seller=mysqli_fetch_assoc($res_seller)){
            $html .= '<td><img src="../profiles/'.$row_seller['picture'].'" 
                                width="40px" height="40px" style="border-radius:60%;">&nbsp'.$row_seller['name'].'<br>
                                <p>'.$row_seller['email'].'</p></td>';
        }



    }






$html .='</table>';


echo $html;

}
