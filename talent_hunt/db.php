<?php

function connect(){
	$connection = mysqli_connect('localhost', 'root', '', 'search_engine_tl');
	if(!$connection){
		die('Failed to connect db');
	}
	return $connection;
}


/**
 *
 */
function display_cat($id){
    if (isset($_SESSION['logged_in'])){

        $user_id=$_SESSION['logged_in']['id'];

    }
    $connection = connect();
    $sql = "SELECT* FROM my_menu WHERE `parent_id`='$id'";
    $html='';
    $result = mysqli_query($connection, $sql);

    if(mysqli_num_rows($result)) {












        while ($row = mysqli_fetch_assoc($result)) {
            $html .=' <div class="card mt-5 ml-lg-3" style="width: 400px; display: inline-block; margin-right: 5px;">';
            $html .='<a href=""><img src="video/' . $row['image'] . '" class="card-img" height="250px;"></a>';
            $html .='<div class="card-body">';
            $html .='<h5 class="card-header text-center bg-dark "><a class="text-white" href="subcategory.php?subcat='.$row['id'].'"><span>'.$row['title'].'</span></a></h5>';


            $html .='</div>';
            $html .='</div>';





        }

        echo $html;
        }
}//end of display_cat()

function display_sub($id)
{
    $id1=$id;
    if (isset($_SESSION['logged_in'])) {

        $user_id = $_SESSION['logged_in']['id'];
        $connection = connect();
        $html = '';
        $parent='';
        $sql0="SELECT * FROM `my_menu` WHERE `id`='$id'";
        $res=mysqli_query($connection,$sql0);
        if(mysqli_num_rows($res)){
            while ($row0=mysqli_fetch_assoc($res)){
                $parent=$row0['parent_id'];

            }
        }
        $sql0="SELECT * FROM `my_menu` WHERE `parent_id`='$parent'";
        $res=mysqli_query($connection,$sql0);
        if(mysqli_num_rows($res)){
            $html .='<div class="btn-group-vertical " style="width: 100%;">';
            while ($row0=mysqli_fetch_assoc($res)){
                if($row0['id']==$id){
                    $html.='<button class="btn btn-success"><a>'.$row0['title'].'</a></button>';
                }else{
                    $html.='<button class="btn btn-dark">'.$row0['title'].'</button>';
                }


            }
            $html.='</div>';
        }





        $sql = "SELECT q.*,  SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes 
FROM questions q LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result)) {


            while ($row = mysqli_fetch_assoc($result)) {

                if ($row['sub_category'] == $id) {
                    $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px; color:white;">';


                    $temp = $row['user_id'];
                    $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                    $result1 = mysqli_query($connection, $sql1);


                    while ($row1 = mysqli_fetch_assoc($result1)) {

                        $value=$row1['id'];

                        $html .='';
                        $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                    }

                    $html .= '<p>' . $row['description'] . '</p>';

                    $filename = $row['title'];
                    $fileExt = explode('.', $filename);
                    $fileActulExt = strtolower(end($fileExt));
                    if ($fileActulExt == "jpg") {
                        $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                    } else {
                        $html .= '<video class="cart-img" src="pics/' . $row['title'] . '" 
                       height="250px" width="235px" controls="controls"></video>';

                    }

                    $category = $row['categories'];
                    $sql2 = "SELECT * FROM my_menu WHERE `id`='$category'";
                    $res = mysqli_query($connection, $sql2);
                    while ($row3 = mysqli_fetch_assoc($res)) {
                        $html .= '<span>' . $row3['title'] . '/</span>';
                    }
                    $sub = $row['sub_category'];
                    $sql2 = "SELECT * FROM my_menu WHERE `id`='$sub'";
                    $res = mysqli_query($connection, $sql2);
                    while ($row3 = mysqli_fetch_assoc($res)) {
                        $html .= '<span>' . $row3['title'] . '</span>';
                    }


                    $html .= '<div class="footer-icons">';
                    $html .= '<ul class="questions">';
                    $rr = $row['id'];
                    $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `likes`='1' && `question_id`='$rr'";
                    $result1 = mysqli_query($connection, $sql1);

                    if (mysqli_num_rows($result1)) {

                        $html .= '<li>';
                        $html .= '<a href="" class="likes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-up"></i>';
                        $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';


                    } else {
                        $html .= '<li>';
                        $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-up"></i>';
                        $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';
                    }


                    $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `dislikes`='1' && `question_id`='$rr'";
                    $result1 = mysqli_query($connection, $sql1);

                    if (mysqli_num_rows($result1)) {

                        $html .= '<li>';
                        $html .= '<a href="" class="dislikes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-down"></i>';
                        $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';


                    } else {
                        $html .= '<li>';
                        $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-down"></i>';
                        $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';
                    }
                    $html .= '<hr>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    $html .= '</div>';
                }


            }//end of while

            echo $html;


        } else {


            echo "no record exist";

        }

    }//end of if session

    else {



        $connection = connect();
        $html = '';


        $sql = "SELECT q.*,  SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes 
FROM questions q LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result)) {


            while ($row = mysqli_fetch_assoc($result)) {

                if ($row['sub_category'] == $id) {
                    $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px; color:white;">';


                    $temp = $row['user_id'];
                    $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                    $result1 = mysqli_query($connection, $sql1);


                    while ($row1 = mysqli_fetch_assoc($result1)) {

                        $value=$row1['id'];

                        $html .='';
                        $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                    }
                    $html .= '<p>' . $row['description'] . '</p>';

                    $filename = $row['title'];
                    $fileExt = explode('.', $filename);
                    $fileActulExt = strtolower(end($fileExt));
                    if ($fileActulExt == "jpg") {
                        $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                    } else {
                        $html .= '<video class="cart-img" src="pics/' . $row['title'] . '" 
                       height="250px" width="235px" controls="controls"></video>';

                    }

                    $category = $row['categories'];
                    $sql2 = "SELECT * FROM my_menu WHERE `id`='$category'";
                    $res = mysqli_query($connection, $sql2);
                    while ($row3 = mysqli_fetch_assoc($res)) {
                        $html .= '<span>' . $row3['title'] . '/</span>';
                    }
                    $sub = $row['sub_category'];
                    $sql2 = "SELECT * FROM my_menu WHERE `id`='$sub'";
                    $res = mysqli_query($connection, $sql2);
                    while ($row3 = mysqli_fetch_assoc($res)) {
                        $html .= '<span>' . $row3['title'] . '</span>';
                    }


                    $html .= '<div class="footer-icons">';
                    $html .= '<ul class="questions">';

                        $html .= '<li>';
                        $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-up"></i>';
                        $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';

                        $html .= '<li>';
                        $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-down"></i>';
                        $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';
                    }
                    $html .= '<hr>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    $html .= '</div>';
                }


            }//end of while

            echo $html;


        }



}//end of display_sub()
function display_profile(){
    if (isset($_SESSION['logged_in'])){

        $user_id=$_SESSION['logged_in']['id'];


    }
    $connection = connect();
    $sql="SELECT * FROM `users` WHERE `id`='$user_id'";
    $result=mysqli_query($connection,$sql);
    if (mysqli_num_rows($result)){
        $row=mysqli_fetch_assoc($result);
        $html='';
        $html .= '<img src="profiles/'.$row['picture'].'" width="60px" height="60px" style="border-radius:60%;">';
        $html .= '<span style="color: white;font-weight: bold;font-size: large">&nbsp'.$row['name'].'</span>';
        echo $html;
    }

}//end of display profiles function
function display_posts($id_get){
    if (isset($_SESSION['logged_in'])){

        $user_id=$_SESSION['logged_in']['id'];
        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes 
FROM questions q LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)) {


            while ($row = mysqli_fetch_assoc($result)) {



    if ($row['user_id']==$id_get){
        $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px;color: white;">';

        $html .= '<p>' . $row['description'] . '</p><p> <span style="margin-left: 20px;">'.$row['time_of_add'].'</span></p>';
        $filename=$row['title'];
        $fileExt = explode('.', $filename);
        $fileActulExt = strtolower(end($fileExt));
        if($fileActulExt=="jpg"){
            $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
        }
        else{
            $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

        }


        $category=$row['categories'];
        $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
        $res=mysqli_query($connection,$sql2);
        while ($row3=mysqli_fetch_assoc($res)){
            $html .='<span>'.$row3['title'].'/</span>';
        }
        $sub=$row['sub_category'];
        $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
        $res=mysqli_query($connection,$sql2);
        while ($row3=mysqli_fetch_assoc($res)){
            $html .='<span>'.$row3['title'].'</span>';
        }



        $html .= '<div class="footer-icons">';
        $html .= '<ul class="questions">';
        $rr = $row['id'];
        $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `likes`='1' && `question_id`='$rr'";
        $result1 = mysqli_query($connection, $sql1);

        if (mysqli_num_rows($result1)) {

            $html .= '<li>';
            $html .= '<a href="" class="likes" data-id="' . $row['id'] . '">';
            $html .= '<i class="fa fa-thumbs-up"></i>';
            $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
            $html .= '</a>';
            $html .= '</li>';


        } else {
            $html .= '<li>';
            $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
            $html .= '<i class="fa fa-thumbs-up"></i>';
            $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
            $html .= '</a>';
            $html .= '</li>';
        }


        $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `dislikes`='1' && `question_id`='$rr'";
        $result1 = mysqli_query($connection, $sql1);

        if (mysqli_num_rows($result1)) {

            $html .= '<li>';
            $html .= '<a href="" class="dislikes" data-id="' . $row['id'] . '">';
            $html .= '<i class="fa fa-thumbs-down"></i>';
            $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
            $html .= '</a>';
            $html .= '</li>';


        } else {
            $html .= '<li>';
            $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
            $html .= '<i class="fa fa-thumbs-down"></i>';
            $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
            $html .= '</a>';
            $html .= '</li>';
        }




        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';

    }


            }//end of while

            echo $html;




        }else {


            echo "no record exist";

        }

    }//end of if session






}//end of display_posts function
function display_posts_buy(){

    if (isset($_SESSION['logged_in'])){

        $user_id=$_SESSION['logged_in']['id'];
        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q 
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY time_of_add DESC";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)) {
            $num=0;
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['categories']==7||$row['categories']==11){


                    if($num<5){




                        $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px; color:white;">';


                        $temp=$row['user_id'];
                        $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                        $result1 = mysqli_query($connection, $sql1);


                        while($row1=mysqli_fetch_assoc($result1)){

                            $value=$row1['id'];

                            $html .='';
                            $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                        }
                        $html .= '<p>' . $row['description'] . '</p>';

                        $filename=$row['title'];
                        $fileExt = explode('.', $filename);
                        $fileActulExt = strtolower(end($fileExt));
                        if($fileActulExt=="jpg"){
                            $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                        }
                        else{
                            $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

                        }
                        if ($row['categories']==7||$row['categories']==11){
                            if ($_SESSION['logged_in']['id']!=$row['user_id']){
                                $product=$row['id'];
                                $user=$_SESSION['logged_in']['id'];
                                $sql_cart="SELECT * FROM `cart` WHERE `p_id`=$product AND `user_id`=$user";
                                $res_cart=mysqli_query($connection,$sql_cart);
                                if(mysqli_num_rows($res_cart)>0){
                                    $html .='<button name="cart" 
                                        class="btn btn-success ">added to cart</button>';
                                }
                                else{
                                    $html .='<a  href="cart_add.php?id='.$row['id'].'"><button name="cart" 
                                        class="btn btn-success ">add to cart</button></a>';
                                }
                            }
                        }

                        $category=$row['categories'];
                        $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
                        $res=mysqli_query($connection,$sql2);
                        while ($row3=mysqli_fetch_assoc($res)){
                            $html .='<span>'.$row3['title'].'/</span>';
                        }
                        $sub=$row['sub_category'];
                        $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
                        $res=mysqli_query($connection,$sql2);
                        while ($row3=mysqli_fetch_assoc($res)){
                            $html .='<span>'.$row3['title'].'</span>';
                        }




                        $html .= '<div class="footer-icons">';
                        $html .= '<ul class="questions">';
                        $rr = $row['id'];
                        $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `likes`='1' && `question_id`='$rr'";
                        $result1 = mysqli_query($connection, $sql1);

                        if (mysqli_num_rows($result1)) {

                            $html .= '<li>';
                            $html .= '<a id="a_like" href="" class="likes" data-id="' . $row['id'] . '">';
                            $html .= '<i class="fa fa-thumbs-up"></i>';
                            $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                            $html .= '</a>';
                            $html .= '</li>';


                        } else {
                            $html .= '<li>';
                            $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                            $html .= '<i class="fa fa-thumbs-up"></i>';
                            $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                            $html .= '</a>';
                            $html .= '</li>';
                        }


                        $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `dislikes`='1' && `question_id`='$rr'";
                        $result1 = mysqli_query($connection, $sql1);

                        if (mysqli_num_rows($result1)) {

                            $html .= '<li>';
                            $html .= '<a href="" class="dislikes" data-id="' . $row['id'] . '">';
                            $html .= '<i class="fa fa-thumbs-down"></i>';
                            $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                            $html .= '</a>';
                            $html .= '</li>';


                        } else {
                            $html .= '<li>';
                            $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                            $html .= '<i class="fa fa-thumbs-down"></i>';
                            $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                            $html .= '</a>';
                            $html .= '</li>';
                        }

                        $html .= '</ul>';
                        $html .= '</div>';
                        $html .= '</div>';


                    }
                    $num=$num+1;

                }
            }//end of row

            echo $html;


        }//end of if

        else {


            echo "no record exist";

        }

    }//end of if session

    else{
        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q 
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY time_of_add DESC";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)) {




            $num=0;

            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['categories']==7||$row['categories']==11){

                    if($num<5){

                        $html .= '<div class="card mt-3 bg-dark " style="width: 240px; display: inline-block; margin-right: 
                                    15px; color: white">';
                        $temp=$row['user_id'];
                        $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                        $result1 = mysqli_query($connection, $sql1);


                        while($row1=mysqli_fetch_assoc($result1)){

                            $value=$row1['id'];

                            $html .='';
                            $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                        }


                        $html .= '<p>' . $row['description'] . '</p>';

                        $filename=$row['title'];
                        $fileExt = explode('.', $filename);
                        $fileActulExt = strtolower(end($fileExt));
                        if($fileActulExt=="jpg"){
                            $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                        }
                        else{
                            $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

                        }

                        $category=$row['categories'];
                        $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
                        $res=mysqli_query($connection,$sql2);
                        while ($row3=mysqli_fetch_assoc($res)){
                            $html .='<span>'.$row3['title'].'/</span>';
                        }
                        $sub=$row['sub_category'];
                        $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
                        $res=mysqli_query($connection,$sql2);
                        while ($row3=mysqli_fetch_assoc($res)){
                            $html .='<span>'.$row3['title'].'</span>';
                        }

                        $html .= '<div class="footer-icons">';
                        $html .= '<ul class="questions">';




                        $html .= '<li>';
                        $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-up"></i>';
                        $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';



                        ;





                        $html .= '<li>';
                        $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-down"></i>';
                        $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';



                        $html .= '</ul>';
                        $html .= '</div>';
                        $html .= '</div>';


                    }
                    $num++;

                }
            }

            echo $html;


        }else {


            echo "no record exist";

        }

    }//end of else session





}//end of display_posts_buy
function display_questions(){

    if (isset($_SESSION['logged_in'])){

        $user_id=$_SESSION['logged_in']['id'];
        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q 
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY time_of_add DESC";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)) {
            $num=0;
            while ($row = mysqli_fetch_assoc($result)) {

                if($num<5){




                    $html .= '<div class="card mt-3 " style="background: #c7254e;width: 240px; display: inline-block; margin-right: 15px; color:white;">';


                    $temp=$row['user_id'];
                    $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                    $result1 = mysqli_query($connection, $sql1);


                    while($row1=mysqli_fetch_assoc($result1)){

                        $value=$row1['id'];

                        $html .='';
                        $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                    }
                    $html .= '<p>' . $row['description'] . '</p>';

                    $filename=$row['title'];
                    $fileExt = explode('.', $filename);
                    $fileActulExt = strtolower(end($fileExt));
                    if($fileActulExt=="jpg"){
                        $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                    }
                    else{
                        $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

                    }

                    $category=$row['categories'];
                    $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
                    $res=mysqli_query($connection,$sql2);
                    while ($row3=mysqli_fetch_assoc($res)){
                        $html .='<span>'.$row3['title'].'/</span>';
                    }
                    $sub=$row['sub_category'];
                    $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
                    $res=mysqli_query($connection,$sql2);
                    while ($row3=mysqli_fetch_assoc($res)){
                        $html .='<span>'.$row3['title'].'</span>';
                    }
                    if ($row['categories']==7||$row['categories']==11){
                        if ($_SESSION['logged_in']['id']!=$row['user_id']){
                            $product=$row['id'];
                            $user=$_SESSION['logged_in']['id'];
                            $sql_cart="SELECT * FROM `cart` WHERE `p_id`=$product AND `user_id`=$user";
                            $res_cart=mysqli_query($connection,$sql_cart);
                            if(mysqli_num_rows($res_cart)>0){
                                $html .='<button name="cart" 
                                        class="btn btn-success ">added to cart</button>';
                            }
                            else{
                                $html .='<a  href="cart_add.php?id='.$row['id'].'"><button name="cart" 
                                        class="btn btn-success ">add to cart</button></a>';
                            }



                        }
                    }







                    $html .= '<div class="footer-icons">';
                    $html .= '<ul class="questions">';
                    $rr = $row['id'];
                    $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `likes`='1' && `question_id`='$rr'";
                    $result1 = mysqli_query($connection, $sql1);

                    if (mysqli_num_rows($result1)) {

                        $html .= '<li>';
                        $html .= '<a id="a_like" href="" class="likes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-up"></i>';
                        $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';


                    } else {
                        $html .= '<li>';
                        $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-up"></i>';
                        $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';
                    }


                    $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `dislikes`='1' && `question_id`='$rr'";
                    $result1 = mysqli_query($connection, $sql1);

                    if (mysqli_num_rows($result1)) {

                        $html .= '<li>';
                        $html .= '<a href="" class="dislikes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-down"></i>';
                        $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';


                    } else {
                        $html .= '<li>';
                        $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-down"></i>';
                        $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';
                    }

                    $html .= '</ul>';
                    $html .= '</div>';
                    $html .= '</div>';


                }
                $num=$num+1;
            }//end of row

            echo $html;


    }//end of if

    else {


            echo "no record exist";

        }

    }//end of if session

        else{
            $connection = connect();
            $html = '';


            $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q 
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY time_of_add DESC";

            $result = mysqli_query($connection, $sql);

            if(mysqli_num_rows($result)) {




                $num=0;

                while ($row = mysqli_fetch_assoc($result)) {
                    if($num<5){

                        $html .= '<div class="card mt-3 bg-dark " style="width: 240px; display: inline-block; margin-right: 
                                    15px; color: white">';
                        $temp=$row['user_id'];
                        $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                        $result1 = mysqli_query($connection, $sql1);


                        while($row1=mysqli_fetch_assoc($result1)){

                            $html .='<form action="info.php" method="post">';
                            $value=$row1['id'];
                            $html .='<input type="hidden" value="'.$value.'" name="detail">';
                            $html .= '<button class="btn-dark" name="info_link"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;"></button>'.'&nbsp<b>'. $row1['name'].'</b>
                    ';

                            $html .='</form>';
                        }


                        $html .= '<p>' . $row['description'] . '</p>';

                        $filename=$row['title'];
                        $fileExt = explode('.', $filename);
                        $fileActulExt = strtolower(end($fileExt));
                        if($fileActulExt=="jpg"){
                            $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                        }
                        else{
                            $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

                        }

                        $category=$row['categories'];
                        $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
                        $res=mysqli_query($connection,$sql2);
                        while ($row3=mysqli_fetch_assoc($res)){
                            $html .='<span>'.$row3['title'].'/</span>';
                        }
                        $sub=$row['sub_category'];
                        $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
                        $res=mysqli_query($connection,$sql2);
                        while ($row3=mysqli_fetch_assoc($res)){
                            $html .='<span>'.$row3['title'].'</span>';
                        }

                        $html .= '<div class="footer-icons">';
                        $html .= '<ul class="questions">';




                        $html .= '<li>';
                        $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-up"></i>';
                        $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';



                        ;





                        $html .= '<li>';
                        $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                        $html .= '<i class="fa fa-thumbs-down"></i>';
                        $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                        $html .= '</a>';
                        $html .= '</li>';



                        $html .= '</ul>';
                        $html .= '</div>';
                        $html .= '</div>';


                    }
                    $num++;
                }

                echo $html;


            }else {


                echo "no record exist";

            }

        }//end of else session





}//end of display_qustions


function authenticate($user){
	$connection = connect();

	$email = $user['email'];
	$password = $user['password'];

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	if(mysqli_num_rows($result)){

		$row = mysqli_fetch_assoc($result);


			return $row;


	}
	return false;
}


function get_qustion_status($arg){

	$connection  = connect();
	$user_id     = $_SESSION['logged_in']['id'];
	$question_id = $arg['id'];
	$action      = $arg['action'];

	$sql = "SELECT likes AS liked, dislikes AS disliked FROM question_likes WHERE question_id=$question_id AND user_id=$user_id";

	$result = mysqli_query($connection, $sql);
	if(mysqli_num_rows($result)){
		return mysqli_fetch_assoc($result);
	}
	return false;

}

function update_action($arg, $like=NULL, $dislike=NULL){

	$connection  = connect();
	$user_id     = $_SESSION['logged_in']['id'];
	$question_id = $arg['id'];
	$action      = $arg['action'];
	$sql         = '';
	$html        = '';

	if($like == 'decrement' AND empty($dislike)){
		$sql = "DELETE FROM question_likes WHERE question_id=$question_id AND user_id=$user_id";
	}
	else if($like === 'decrement' AND $dislike === 'increment'){
		$sql = "UPDATE question_likes SET likes=likes-1, dislikes=dislikes+1 WHERE question_id=$question_id AND user_id=$user_id";
	}
	else if(empty($like) AND $dislike === 'decrement'){
		$sql = "DELETE FROM question_likes WHERE question_id=$question_id AND user_id=$user_id";
	}

	else if($like === 'increment' AND $dislike === 'decrement'){
		$sql = "UPDATE question_likes SET likes=likes+1, dislikes=dislikes-1 WHERE question_id=$question_id AND user_id=$user_id";
	}
	else if(empty($like) AND empty($dislike)){
		//$sql = "INSERT INTO question_likes(question_id, user_id, ".$action.") VALUES($question_id, $user_id, 1)";

		if($action === 'likes'){
			$sql = "INSERT INTO question_likes(question_id, user_id, likes) VALUES($question_id, $user_id, 1)";
		}
		else if($action === 'dislikes'){
			$sql = "INSERT INTO question_likes(question_id, user_id, dislikes) VALUES($question_id, $user_id, 1)";
		}
	}

	mysqli_query($connection, $sql);
	if(mysqli_affected_rows($connection)){
		return fetch_updated_row( $question_id );
	}
	return false;
}

function fetch_updated_row($question_id){
	$connection = connect();
	$html       = '';
    $user_id=$_SESSION['logged_in']['id'];
	$sql = "SELECT question_id, SUM(likes) AS likes, SUM(dislikes) AS dislikes FROM question_likes WHERE question_id=$question_id";

	$result = mysqli_query($connection, $sql);
	if(mysqli_num_rows($result)){

		$row = mysqli_fetch_assoc($result);

		//$html .= '<ul class="questions">';
        $sql1="SELECT * FROM `question_likes` WHERE `question_id`='$question_id' && `user_id`='$user_id' && `likes`=1";
        $result1=mysqli_query($connection,$sql1);
        if (mysqli_num_rows($result1)) {
            $html .= '<li>';
            $html .= '<a href="" class="likes" data-id="'.$question_id.'">';
            $html .= '<i class="fa fa-thumbs-up"></i>';
            $html .= '<span class="like-counter">'.$row['likes'].'</span>';
            $html .= '</a>';
            $html .= '</li>';

            $html .= '<li>';
            $html .= '<a href="" class="empty dislikes" data-id="'.$question_id.'">';
            $html .= '<i class="fa fa-thumbs-down"></i>';
            $html .= '<span class="like-counter">'.$row['dislikes'].'</span>';
            $html .= '</a>';
            $html .= '</li>';
        }
        else{
            $sql1="SELECT * FROM `question_likes` WHERE `question_id`='$question_id' && `user_id`='$user_id' && `dislikes`=1";
            $result1=mysqli_query($connection,$sql1);
            if (mysqli_num_rows($result1)) {
                $html .= '<li>';
                $html .= '<a href="" class="empty likes" data-id="'.$question_id.'">';
                $html .= '<i class="fa fa-thumbs-up"></i>';
                $html .= '<span class="like-counter">'.$row['likes'].'</span>';
                $html .= '</a>';
                $html .= '</li>';

                $html .= '<li>';
                $html .= '<a href="" class="dislikes" data-id="'.$question_id.'">';
                $html .= '<i class="fa fa-thumbs-down"></i>';
                $html .= '<span class="like-counter">'.$row['dislikes'].'</span>';
                $html .= '</a>';
                $html .= '</li>';
            }
            else{
                $html .= '<li>';
                $html .= '<a href="" class="empty likes" data-id="'.$question_id.'">';
                $html .= '<i class="fa fa-thumbs-up"></i>';
                $html .= '<span class="like-counter">'.$row['likes'].'</span>';
                $html .= '</a>';
                $html .= '</li>';

                $html .= '<li>';
                $html .= '<a href="" class="empty dislikes" data-id="'.$question_id.'">';
                $html .= '<i class="fa fa-thumbs-down"></i>';
                $html .= '<span class="like-counter">'.$row['dislikes'].'</span>';
                $html .= '</a>';
                $html .= '</li>';

            }

        }




		//$html .= '</ul>';

		return $html;

	}
}

function debug($arg){
	echo '<pre>';
	print_r($arg);
	echo '</pre>';
	exit;
}
function show_menu(){
    $conn=connect();

    $menus="";
    $menus=generate_multi_level_menus($conn);
    return $menus;
}
function get_subcategory(){
    if (isset($_POST['cat'])){
        $vari=$_POST[''];
    }
}
get_subcategory();
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
                    $menuu.='<li style="list-style-type: none;"><a  class="dropdown-item" href="category.php?cat='.$row['id'].'">'.$row['title'].'</a>';

                }
            }

        }
        $menuu.='<ul>'.generate_multi_level_menus($connection,$row['id']).'</ul>';
        $menuu.="</li>";
    }
    return $menuu;
}


function recent(){
    if (isset($_SESSION['logged_in'])){


        $user_id=$_SESSION['logged_in']['id'];

        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY time_of_add DESC ";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)) {


            while ($row = mysqli_fetch_assoc($result)) {



                $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px;color: white;">';


                $temp=$row['user_id'];
                $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                $result1 = mysqli_query($connection, $sql1);


                while($row1=mysqli_fetch_assoc($result1)){

                    $value=$row1['id'];

                    $html .='';
                    $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                }
                $html .= '<p>' . $row['description'] . '</p>';
                $filename=$row['title'];
                $fileExt = explode('.', $filename);
                $fileActulExt = strtolower(end($fileExt));
                if($fileActulExt=="jpg"){
                    $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                }
                else{
                    $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

                }

                $category=$row['categories'];
                $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
                $res=mysqli_query($connection,$sql2);
                while ($row3=mysqli_fetch_assoc($res)){
                    $html .='<span>'.$row3['title'].'/</span>';
                }
                $sub=$row['sub_category'];
                $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
                $res=mysqli_query($connection,$sql2);
                while ($row3=mysqli_fetch_assoc($res)){
                    $html .='<span>'.$row3['title'].'</span>';
                }

                if ($row['categories']==7||$row['categories']==11){
                    if ($_SESSION['logged_in']['id']!=$row['user_id']){
                        $product=$row['id'];
                        $user=$_SESSION['logged_in']['id'];
                        $sql_cart="SELECT * FROM `cart` WHERE `p_id`=$product AND `user_id`=$user";
                        $res_cart=mysqli_query($connection,$sql_cart);
                        if(mysqli_num_rows($res_cart)>0){
                            $html .='<button name="cart" 
                                        class="btn btn-success ">added to cart</button>';
                        }
                        else{
                            $html .='<a  href="cart_add.php?id='.$row['id'].'"><button name="cart" 
                                        class="btn btn-success ">add to cart</button></a>';
                        }
                    }
                }




                $html .= '<div class="footer-icons">';
                $html .= '<ul class="questions">';
                $rr = $row['id'];
                $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `likes`='1' && `question_id`='$rr'";
                $result1 = mysqli_query($connection, $sql1);

                if (mysqli_num_rows($result1)) {

                    $html .= '<li>';
                    $html .= '<a id="a_like" href="" class="likes" data-id="' . $row['id'] . '">';
                    $html .= '<i class="fa fa-thumbs-up"></i>';
                    $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                    $html .= '</a>';
                    $html .= '</li>';


                } else {
                    $html .= '<li>';
                    $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                    $html .= '<i class="fa fa-thumbs-up"></i>';
                    $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                    $html .= '</a>';
                    $html .= '</li>';
                }


                $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `dislikes`='1' && `question_id`='$rr'";
                $result1 = mysqli_query($connection, $sql1);

                if (mysqli_num_rows($result1)) {

                    $html .= '<li>';
                    $html .= '<a href="" class="dislikes" data-id="' . $row['id'] . '">';
                    $html .= '<i class="fa fa-thumbs-down"></i>';
                    $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                    $html .= '</a>';
                    $html .= '</li>';


                } else {
                    $html .= '<li>';
                    $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                    $html .= '<i class="fa fa-thumbs-down"></i>';
                    $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                    $html .= '</a>';
                    $html .= '</li>';
                }

                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';



            }
            $html .='       <div class="row">';
            $html .='</div>';

            echo $html;


        }//end of if

        else {


            echo "no record exist";

        }

    }//end of if session

    else{

        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q 
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY time_of_add DESC ";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)) {






            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px;color: white;;">';
                $temp=$row['user_id'];
                $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                $result1 = mysqli_query($connection, $sql1);


                while($row1=mysqli_fetch_assoc($result1)){

                    $value=$row1['id'];

                    $html .='';
                    $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                }


                $html .= '<p>' . $row['description'] . '</p>';

                $filename=$row['title'];
                $fileExt = explode('.', $filename);
                $fileActulExt = strtolower(end($fileExt));
                if($fileActulExt=="jpg"){
                    $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                }
                else{
                    $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

                }
                $category=$row['categories'];
                $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
                $res=mysqli_query($connection,$sql2);
                while ($row3=mysqli_fetch_assoc($res)){
                    $html .='<span>'.$row3['title'].'/</span>';
                }
                $sub=$row['sub_category'];
                $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
                $res=mysqli_query($connection,$sql2);
                while ($row3=mysqli_fetch_assoc($res)){
                    $html .='<span>'.$row3['title'].'</span>';
                }


                $html .= '<div class="footer-icons">';
                $html .= '<ul class="questions">';




                $html .= '<li>';
                $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                $html .= '<i class="fa fa-thumbs-up"></i>';
                $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                $html .= '</a>';
                $html .= '</li>';



                ;





                $html .= '<li>';
                $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                $html .= '<i class="fa fa-thumbs-down"></i>';
                $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                $html .= '</a>';
                $html .= '</li>';



                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';

            }
            $html .='       <div class="row">';
            $html .='  <form action="action.php" method="post">';
            $html .='        <div class="btn-group-lg mt-lg-5" style="margin-left: 200px">';
            $html .='              <button class="btn btn-dark" name="recent">See all recent uploads</button>';
            $html .='            <button class="btn btn-outline-dark" name="performers">See top performers</button>';

            $html .='            <button class="btn btn-outline-dark" name="trending">See trending items</button>';
            $html .='        </div>';
            $html .='    </form>';
            $html .='</div>';
            echo $html;


        }else {


            echo "no record exist";

        }

    }//end of else session


}
function trending($user){
    if (isset($_SESSION['logged_in'])){

        $user_id=$_SESSION['logged_in']['id'];
        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY likes DESC";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)) {


            while ($row = mysqli_fetch_assoc($result)) {



                $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px;color:white;">';


                $temp=$row['user_id'];
                $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                $result1 = mysqli_query($connection, $sql1);


                while($row1=mysqli_fetch_assoc($result1)){

                    $value=$row1['id'];

                    $html .='';
                    $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                }
                $html .= '<p>' . $row['description'] . '</p>';
                $filename=$row['title'];
                $fileExt = explode('.', $filename);
                $fileActulExt = strtolower(end($fileExt));
                if($fileActulExt=="jpg"){
                    $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                }
                else{
                    $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

                }

                $category=$row['categories'];
                $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
                $res=mysqli_query($connection,$sql2);
                while ($row3=mysqli_fetch_assoc($res)){
                    $html .='<span>'.$row3['title'].'/</span>';
                }
                $sub=$row['sub_category'];
                $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
                $res=mysqli_query($connection,$sql2);
                while ($row3=mysqli_fetch_assoc($res)){
                    $html .='<span>'.$row3['title'].'</span>';
                }

                if ($row['categories']==7||$row['categories']==11){
                    if ($_SESSION['logged_in']['id']!=$row['user_id']){
                        $product=$row['id'];
                        $user=$_SESSION['logged_in']['id'];
                        $sql_cart="SELECT * FROM `cart` WHERE `p_id`=$product AND `user_id`=$user";
                        $res_cart=mysqli_query($connection,$sql_cart);
                        if(mysqli_num_rows($res_cart)>0){
                            $html .='<button name="cart" 
                                        class="btn btn-success ">added to cart</button>';
                        }
                        else{
                            $html .='<a  href="cart_add.php?id='.$row['id'].'"><button name="cart" 
                                        class="btn btn-success ">add to cart</button></a>';
                        }
                    }
                }






                $html .= '<div class="footer-icons">';
                $html .= '<ul class="questions">';
                $rr = $row['id'];
                $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `likes`='1' && `question_id`='$rr'";
                $result1 = mysqli_query($connection, $sql1);

                if (mysqli_num_rows($result1)) {

                    $html .= '<li>';
                    $html .= '<a id="a_like" href="" class="likes" data-id="' . $row['id'] . '">';
                    $html .= '<i class="fa fa-thumbs-up"></i>';
                    $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                    $html .= '</a>';
                    $html .= '</li>';


                } else {
                    $html .= '<li>';
                    $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                    $html .= '<i class="fa fa-thumbs-up"></i>';
                    $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                    $html .= '</a>';
                    $html .= '</li>';
                }


                $sql1 = "SELECT * FROM `question_likes` WHERE `user_id`='$user_id' && `dislikes`='1' && `question_id`='$rr'";
                $result1 = mysqli_query($connection, $sql1);

                if (mysqli_num_rows($result1)) {

                    $html .= '<li>';
                    $html .= '<a href="" class="dislikes" data-id="' . $row['id'] . '">';
                    $html .= '<i class="fa fa-thumbs-down"></i>';
                    $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                    $html .= '</a>';
                    $html .= '</li>';


                } else {
                    $html .= '<li>';
                    $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                    $html .= '<i class="fa fa-thumbs-down"></i>';
                    $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                    $html .= '</a>';
                    $html .= '</li>';
                }

                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';

            }
            $html .='       <div class="row">';

            $html .='</div>';

            echo $html;


        }//end of if

        else {


            echo "no record exist";

        }

    }//end of if session

    else{
        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY likes DESC";

        $result = mysqli_query($connection, $sql);

        if(mysqli_num_rows($result)) {






            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px;color: white">';
                $temp=$row['user_id'];
                $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                $result1 = mysqli_query($connection, $sql1);


                while($row1=mysqli_fetch_assoc($result1)){

                    $value=$row1['id'];

                    $html .='';
                    $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                }


                $html .= '<p>' . $row['description'] . '</p>';

                $filename=$row['title'];
                $fileExt = explode('.', $filename);
                $fileActulExt = strtolower(end($fileExt));
                if($fileActulExt=="jpg"){
                    $html .= '<img class="cart-img" src="profiles/' . $row['title'] . '"  height="250px" width="235px" >';
                }
                else{
                    $html .= '<video class="cart-img" src="pics/'.$row['title'].'" 
                       height="250px" width="235px" controls="controls"></video>' ;

                }

                $category=$row['categories'];
                $sql2="SELECT * FROM my_menu WHERE `id`='$category'";
                $res=mysqli_query($connection,$sql2);
                while ($row3=mysqli_fetch_assoc($res)){
                    $html .='<span>'.$row3['title'].'/</span>';
                }
                $sub=$row['sub_category'];
                $sql2="SELECT * FROM my_menu WHERE `id`='$sub'";
                $res=mysqli_query($connection,$sql2);
                while ($row3=mysqli_fetch_assoc($res)){
                    $html .='<span>'.$row3['title'].'</span>';
                }


                $html .= '<div class="footer-icons">';
                $html .= '<ul class="questions">';




                $html .= '<li>';
                $html .= '<a href="" class="empty likes" data-id="' . $row['id'] . '">';
                $html .= '<i class="fa fa-thumbs-up"></i>';
                $html .= '<span class="like-counter">' . $row['likes'] . '</span>';
                $html .= '</a>';
                $html .= '</li>';



                ;





                $html .= '<li>';
                $html .= '<a href="" class="empty dislikes" data-id="' . $row['id'] . '">';
                $html .= '<i class="fa fa-thumbs-down"></i>';
                $html .= '<span class="like-counter">' . $row['dislikes'] . '</span>';
                $html .= '</a>';
                $html .= '</li>';



                $html .= '</ul>';
                $html .= '</div>';
                $html .= '</div>';

            }
            $html .='       <div class="row">';
            $html .='  <form action="action.php" method="post">';
            $html .='        <div class="btn-group-lg mt-lg-5" style="margin-left: 200px">';
            $html .='              <button class="btn btn-outline-dark" name="recent">See all recent uploads</button>';
            $html .='            <button class="btn btn-outline-dark" name="performers">See top performers</button>';

            $html .='            <button class="btn btn-dark" name="trending">See trending items</button>';
            $html .='        </div>';
            $html .='    </form>';
            $html .='</div>';

            echo $html;


        }else {


            echo "no record exist";

        }

    }//end of else session

}
function show_users()
{
    $html = '';
    $connection = connect();
    $html = '';


    $sql = "SELECT * FROM `users`";

    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result)) {


        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<div class="card mt-3 bg-dark ml-5" style="height: 85px; width: 800px; display: inline-block; margin-right: 15px;color: white">';
            $html .= '<span>' . $row['id'] . '</span>';
            $value=$row['id'];



            $html .= '<img class" cart-title" src="profiles/' . $row['picture'] . '"
                    width="50px" height="50px" style="border-radius:50%;"></button>'.'&nbsp<b>'. $row['name'].'</b>
                   <span class="ml-lg-5">'.$row['email'].'</span><a name="link" href="info.php?value='.$value.'"><span 
                   class="btn btn-success mt-3" style="float: right" >view profile</span></a>';



            $html .= '</div>';
            $html .='';

        }
        echo $html;
    }
}//end of show_users




function show_performers()
{
    $html = '';
    $html = '<button class="btn btn success">these are best performers</button>';


    if (isset($_SESSION['logged_in'])) {

        $user_id = $_SESSION['logged_in']['id'];
        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY likes DESC";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result)) {


            while ($row = mysqli_fetch_assoc($result)) {


                $html .= '<div class="card mt-3 bg-dark ml-lg-5"  style="width: 500px; display: inline-block; 
                            margin-right: 15px;color:white;height: 100px">';


                $temp = $row['user_id'];
                $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                $result1 = mysqli_query($connection, $sql1);


                while ($row1 = mysqli_fetch_assoc($result1)) {

                    $value=$row1['id'];

                    $html .='';
                    $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                    $category = $row['categories'];
                    $sql2 = "SELECT * FROM my_menu WHERE `id`='$category'";
                    $res = mysqli_query($connection, $sql2);
                    while ($row3 = mysqli_fetch_assoc($res)) {
                        $html .= '<span>' . $row3['title'] . '</span>';
                    }

                }


                $html .= '</div>';
                $html .= '</div>';

            }

            $html .= '</div>';

            echo $html;


        }//end of if

        else {


            echo "no record exist";

        }

    }//end of if session

    else {
        $connection = connect();
        $html = '';


        $sql = "SELECT q.*, SUM(ql.likes) AS likes, SUM(ql.dislikes) AS dislikes FROM questions q
                LEFT JOIN question_likes ql ON ql.question_id=q.id GROUP BY q.id ORDER BY likes DESC";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result)) {


            while ($row = mysqli_fetch_assoc($result)) {
                $html .= '<div class="card mt-3 bg-dark" style="width: 240px; display: inline-block; margin-right: 15px;color: white">';
                $temp = $row['user_id'];
                $sql1 = "SELECT * FROM `users` WHERE `id`='$temp'";
                $result1 = mysqli_query($connection, $sql1);


                while ($row1 = mysqli_fetch_assoc($result1)) {

                    $value=$row1['id'];

                    $html .='';
                    $html .= '<a href="info.php?info_id='.$value.'"><img class" cart-title" src="profiles/' . $row1['picture'] . '"
                    width="30px" height="30px" style="border-radius:50%;">'.'&nbsp<b class="text-white">'. $row1['name'].'</b></a>
                    ';
                }


                $category = $row['categories'];
                $sql2 = "SELECT * FROM my_menu WHERE `id`='$category'";
                $res = mysqli_query($connection, $sql2);
                while ($row3 = mysqli_fetch_assoc($res)) {
                    $html .= '<span>' . $row3['title'] . '</span>';
                }


                echo $html;


            }


        }//end of else session


}

    $html .='       <div class="row">';

    $html .='</div>';

    echo $html;
}//end of show_performers

function display_cart(){


    if (isset($_SESSION['logged_in'])){
        $connection = connect();
        $html = '';
        $html = '';


        $sql = "SELECT * FROM `cart`";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result)) {


            if($_SESSION['logged_in']['id']==2234){
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




                    $html .= '<tr><td><img class" cart-title"  src="profiles/' . $row['p_image'] . '"
                    width="80px" height="80px" style="border-radius:50%;">'.'&nbsp</td>';


                    $cat=$row['c_id'];
                    $sql_cat="SELECT * FROM `my_menu` WHERE `id`=$cat";
                    $res_cat=mysqli_query($connection,$sql_cat);
                    while ($row_cat=mysqli_fetch_assoc($res_cat)){
                        $html .= '<td><span class="ml-3">' . $row_cat['title'] . '</span></td>';
                    }



                    $html.=' <td><span>'.$row['p_rate'].'</span></td>';

                    $value=$row['p_owner'];
                    $sql1="SELECT * FROM `users` WHERE `id`=$value";
                    $res1=mysqli_query($connection,$sql1);
                    if(mysqli_num_rows($res1)){
                        while ($row1=mysqli_fetch_assoc($res1)){
                            $html .='<td><span >'.$row1['name'].'</span></td>';
                        }
                    }
                    $value=$row['user_id'];
                    $sql1="SELECT * FROM `users` WHERE `id`=$value";
                    $res1=mysqli_query($connection,$sql1);
                    if(mysqli_num_rows($res1)){
                        while ($row1=mysqli_fetch_assoc($res1)){
                            $html .='<td><span >'.$row1['name'].'</span></td>';
                        }
                    }


                    $html .='<td><a href="cart.php?delete='.$cat.'"  
                    class="btn btn-danger text-white"><span class="fa fa-trash"></span> </a>
                    <a href="cart.php?delete='.$cat.'" class="btn btn-primary">Allot</a></td></tr>';


                }






        $html .='</table>';





            }else{
                $total_cast=0;
                $html .='<table class="table ">';

                $html .='<thead>';
                $html .='<tr>';


                $html .='<th scope="col">Product</th>';
                $html .='<th scope="col">Category</th>';
                $html .='<th scope="col">Price</th>';

                $html .='<th scope="col">Seller</th>';
                $html .='<th scope="col">Action</th></tr>';

                $html .='</thead>';
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['user_id']==$_SESSION['logged_in']['id']){






                        $html .= '<tr><td><img class" cart-title"  src="profiles/' . $row['p_image'] . '"
                    width="80px" height="80px" style="border-radius:50%;">'.'&nbsp</td>';


                        $cat=$row['c_id'];
                        $sql_cat="SELECT * FROM `my_menu` WHERE `id`=$cat";
                        $res_cat=mysqli_query($connection,$sql_cat);
                        while ($row_cat=mysqli_fetch_assoc($res_cat)){
                            $html .= '<td><span class="ml-3">' . $row_cat['title'] . '</span></td>';
                        }


                        $total_cast=$total_cast+$row['p_rate'];
                        $html.=' <td><span>'.$row['p_rate'].'</span></td>';

                        $value=$row['p_owner'];
                        $sql1="SELECT * FROM `users` WHERE `id`=$value";
                        $res1=mysqli_query($connection,$sql1);
                        if(mysqli_num_rows($res1)){
                            while ($row1=mysqli_fetch_assoc($res1)){
                                $html .='<td><span >'.$row1['name'].'</span></td>';
                            }
                        }


                        $html .='<td><a href="cart.php?delete='.$cat.'"  class="btn btn-danger text-white"><span class="fa fa-trash"></span> </a></td></tr>';


                    }



                }
                $html .='<tr><td colspan="4"><span style="float: right">Total Cast: '.$total_cast.'</span></td></tr>';
            }
            $html .='</table>';

            echo $html;
        }


    }else{
        header("location:login.php");
    }
}//end of display cart
function cart_admin(){


    if (isset($_SESSION['logged_in'])){
        $html = '';
        $connection = connect();
        $html = '';


        $sql = "SELECT * FROM `cart`";

        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result)) {


            while ($row = mysqli_fetch_assoc($result)) {

                $html .= '<div class="card mt-3 bg-dark" style="width: 800px; display: inline-block; margin-right: 15px;color: white">';




                $html .= '<img class" cart-title"  src="profiles/' . $row['p_image'] . '"
                    width="80px" height="80px" style="border-radius:50%;">'.'&nbsp';

                $html .= '<span class="ml-3">' . $row['p_name'] . '</span>';
                $html.=' <span class="ml-lg-5">price = '.$row['p_rate'].'</span>';



                $html .= '</div>';


            }

            echo $html;
        }


    }else{
        header("location:login.php");
    }
}//end of cart admin