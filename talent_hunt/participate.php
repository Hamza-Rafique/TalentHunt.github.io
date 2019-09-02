<?php
include "db.php";
$conn=connect();
session_start();
$user_id=$_SESSION['logged_in']['id'];
if ($_SESSION['logged_in']['id']==2234){
    header("location:admin_panel/compitions.php");
}
if (isset($_POST['voting'])){
    $img_id=$_POST['vote'];
    $cmp_id=$_POST['cmp'];
    $sql="INSERT INTO `voting`( `user_id`, `cmp_id`, `img`) VALUES ($user_id,$cmp_id,$img_id)";
    $res=mysqli_query($conn,$sql);

}

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Like & Dislike System</title>
    <link rel="stylesheet" type="text/css" href="new_boot/css/font.css">


    <link type="text/css" rel="stylesheet" href="boots/boots4.css">

    <style type="text/css">

        #g{
            color: white;
            text-align: center;
            font-family: sans-serif;
            font-size:  30px;
            font-weight: bold;
        }
        #glyph{
            color: white;
            height: 500px;
            width: 500px;
        }
        .col-md{
            margin-top: 80px;
            box-shadow: -1px 1px 60px 10px black;
            background: rgb(0,0,0,0.4);
        }
        label{
            margin-top: 35px;
            font-size: 20px;
        }
        .fas{
            margin-top: 35px;
        }
        .hh2{
            background: transparent;
            border-radius: 0px;
            border: 0px;
            border-bottom: 1px solid white;
            font-size:18px;
            margin-top: 35px;
            height: 40px;
            margin-left: 45px;
        }
        .img-jmbo{
            background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),
            url('rk/slid1.jpg'); background-size: 100%,100%;
        }
        .container{
            margin-left: 50px;
        }


    </style>

</head>
<body id="g">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <span href="" class="navbar-brand">TalentHunt<img src="rk/logo.png" width="100px"></span>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarid">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarid">
            <ul class="navbar-nav text-center ml-5">
                <li class="nav-item ">
                    <a href="index.php" class="nav-link">Home</a>
                </li>


            </ul>

        </div>
</nav>
<?php

$sql="SELECT * FROM `users` WHERE `id`=$user_id";
$res=mysqli_query($conn,$sql);

while ($row=mysqli_fetch_array($res)) {
    if ($row['occupation'] == 'artist') {


        ?>
        <div class="container" style='color: dodgerblue;'>
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md ">
                    <?php


                    $sql = "SELECT * FROM `add_cmp`";
                    $res = mysqli_query($conn, $sql);
                    $html = '';
                    $html .= '<table class="table" >';
                    $html .= '<thead>';
                    $html .= '<tr>';

                    $html .= "<br><th style='color: white' scope=\"col\" >name</th>  
                        <th style='color: white' scope=\"col\">category </th> 
                         <th style='color: white' scope=\"col\">sub_category</th>
                    <th style='color: white'>action</th>
                    <th style='color: white'>status</th>";
                    $html .= '</tr>';
                    $id = $_SESSION['logged_in']['id'];


                    while ($row = mysqli_fetch_array($res)) {
                        $cat = $row['cat'];
                        $sub_cat = $row['sub_cat'];
                        $sql1 = "SELECT * FROM `my_menu` WHERE `id`=$cat";
                        $res1 = mysqli_query($conn, $sql1);

                        while ($row1 = mysqli_fetch_array($res1)) {


                            $sql2 = "SELECT * FROM `my_menu` WHERE `id`=$sub_cat";
                            $res2 = mysqli_query($conn, $sql2);

                            while ($row2 = mysqli_fetch_array($res2)) {
                                $html .= '<tr><td>' . $row['name'] . '</td><td>' . $row1['title'] . '</td><td>' . $row2['title'] .
                                    '</td>';

                                $cmp_id = $row['id'];
                                $sql3 = "SELECT * FROM add_to WHERE `user_id`='$id' AND `cmp_id`='$cmp_id'";

                                $res3 = mysqli_query($conn, $sql3);


                                if (mysqli_num_rows($res3) > 0) {
                                    $html .= '<td> <a  
                                class="btn btn-danger ml-2" disabled="disabled">Participated</a></td>';
                                } else {
                                    $html .= '<td> <a  href="add_to.php?cmp_id=' . $row['id'] . '"
                                class="btn btn-primary ml-2">Participate</a></td>';
                                }
                            }


                        }
                        $cmp_id = $row['id'];
                        $sql4 = "SELECT * FROM `add_to` WHERE `cmp_id`=$cmp_id";
                        $res4 = mysqli_query($conn, $sql4);

                        if ($row4 = mysqli_num_rows($res4) == 5) {

                            $html .= '<td> <a   disabled="disabled"
                                class="btn btn-danger ml-2">Full</a></td>';
                        } else {
                            $html .= '<td> <a   disabled="disabled"
                                class="btn btn-primary ml-2 text-success">' . mysqli_num_rows($res4) . ' Participants</a></td>';
                        }
                    }

                    echo $html;
                    ?>


                </div>

            </div>

        </div>


        <?php
    }
}
        ?>



                <div class="col-md- " style="width: ">
                    <?php
                    $sql1="SELECT * FROM `add_cmp`";
                    $res1=mysqli_query($conn,$sql1);
                    $html='';
                    while ($row1=mysqli_fetch_array($res1)) {
                        $now_time=time();
                        if ($now_time>$row1['end']){
                            $cmp_id=$row1['id'];

                            $sql2="SELECT * FROM `add_to` WHERE `cmp_id`='$cmp_id'";
                            $res2=mysqli_query($conn,$sql2);
                            $value=0;
                            while ($row5=mysqli_fetch_array($res2)){
                                if($row5['user_id']==$_SESSION['logged_in']['id']){
                                    $value++;
                                }
                            }

                            if($value==0){
                                if (mysqli_num_rows($res2)==5){
                                    $current_time=time();
                                    $expire_time=$row1['end'];
                                    $remain_time=$expire_time-$current_time;
                                    $hours=floor($remain_time/3600);
                                    $minutes=floor(($remain_time/60)%60);
                                    $seconds=$remain_time%60;
                                    $html .='<table class="table bg-white">';

                                    $html .='<thead>';
                                    $html .='<tr>
                                                <th  style="font-size: 15px">End in: '.$hours.'houres'.$minutes.'minutes'.$seconds.'seconds</th>
                                                <th style="background: #1b1e21;color: white" colspan="3">
                                           '.$row1['name'].'</th>
                                           </tr>';
                                    $html .='<tr>';
                                    $html .='<th scope="col">Art1</th>';
                                    $html .='<th scope="col">Art2</th>';
                                    $html .='<th scope="col">Art3</th>';
                                    $html .='<th scope="col">Art4</th>';
                                    $html .='<th scope="col">Art5</th></tr>';
                                    $html .='<tr>';
                                    $res2=mysqli_query($conn,$sql2);
                                    while ($row2=mysqli_fetch_array($res2)) {
                                        $img=$row2['status'];




                                        $html .='<form action="participate.php" method="post">';
                                        $img_id=$row2['id'];
                                        $sql3="SELECT * FROM `voting` WHERE `img`=$img_id";
                                        $res3=mysqli_query($conn,$sql3);

                                        $html .='<td ><img height="150" width="150" class="ml-2" src="profiles/'.$img.'">';
                                        $html .='<input name="vote"  class="form-check-input" value="'.$row2['id'].'" type="radio">';
                                        $html .='<span style="margin-top: 50px; color: #1b1e21; font-size: small;margin-top: 400px">
                                        votes '.mysqli_num_rows($res3).'</span>';
                                        $html .='<input name="cmp" value="'.$row2['cmp_id'].'" type="hidden"></td>';


                                        $cmp_id=$row2['cmp_id'];
                                    }
                                    $html .='</tr>';
                                    $sql4="SELECT * FROM `voting` WHERE `user_id`=$user_id AND `cmp_id`=$cmp_id";
                                    $res4=mysqli_query($conn,$sql4);
                                    if (mysqli_num_rows($res4)>0){
                                        $html .='<input name="voting" disabled="disabled" class="btn-danger" value="voted" type="submit">';
                                    }else

                                        $html .='<tr><td style="background: #1b1e21" colspan="5"><input name="voting" class="btn-success" value="vote" type="submit"></td></tr>';
                                    $html .='</table>';
                                    $html .='</form>';
                                }
                            }
                        }//end of time condition
                        else{
                            $cmp=$row1['id'];
                            $sql_img="SELECT * FROM `add_to` WHERE `cmp_id`=$cmp";
                            $res_img=mysqli_query($conn,$sql_img);
                            $max_votes=0;
                            while($row_img=mysqli_fetch_assoc($res_img)){
                                $img=$row_img['id'];
                                $sql_votes="SELECT * FROM `voting` WHERE `img`=$img AND `cmp_id`=$cmp";
                                $res_votes=mysqli_query($conn,$sql_votes);
                                $votes=mysqli_num_rows($res_votes);
                                if ($votes>$max_votes){
                                    $max_votes=$votes;
                                    $img_winner=$row_img['id'];
                                }


                            }
                            $html .='<p>votes ='.$cmp.'</p>';
                            $html .='<p>img ='.$img_winner.'</p>';
                            //to show genere
                            $sql_gen="SELECT * FROM `add_cmp` WHERE `id`=$cmp";
                            $res_gen=mysqli_query($conn,$sql_gen);
                            while ($row_gen=mysqli_fetch_assoc($res_gen)){
                                $html .='<p>Competition '.$row_gen['name'].'</p>';
                            }

                            //to show competition
                            $sql_cmp="SELECT * FROM `add_cmp` WHERE `id`=$cmp";
                            $res_cmp=mysqli_query($conn,$sql_cmp);
                            while ($row_cmp=mysqli_fetch_assoc($res_cmp)){
                                $html .='<p>Competition '.$row_cmp['name'].'</p>';
                            }

                            //to show winner image
                            $sql_win="SELECT * FROM `add_to` WHERE `id`=$img_winner";
                            $res_win=mysqli_query($conn,$sql_win);
                            while ($row_win=mysqli_fetch_assoc($res_win)){
                                $html .='winner<img src="profiles/'.$row_win['status'].'">';
                            }
                            $html .='<p>votes ='.$max_votes.'</p>';


                        }


                    }//end of while outer
                    echo $html;

                    ?>
                </div>





    <script src="public/js/jquery-3.2.1.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/script.js"></script>
    <script src="public/js/add_post_js.js"></script>


</body>
</html>
