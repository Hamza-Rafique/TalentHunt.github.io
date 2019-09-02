<?php
session_start();
if (isset($_SESSION['logged_in'])){

    $user_id=$_SESSION['logged_in']['id'];


}
include "db.php";
$conn=connect();



$query_img_user="SELECT * FROM `users` WHERE `id`='$user_id'";
$res_img_user=mysqli_query($conn,$query_img_user);
$row_img_user=mysqli_fetch_array($res_img_user);



?>

<!DOCTYPE html>
<html>
<head>

	<title></title>
    <link rel="stylesheet" type="text/css" href="new_boot/css/font.css">
    <link rel="stylesheet" href="public/css/style_new.css">

    <link type="text/css" rel="stylesheet" href="boots/boots4.css">
    <link rel="stylesheet" href="con.css" type="text/css">

    <style type="text/css">
        .img-jmbo{
            background-image: linear-gradient(rgba(0,0,0,0.8),rgba(0,0,0,0.8)),
            url('rk/slid1.jpg'); background-size: 100%,100%;
        }
        .container{
            margin-left: 50px;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
        <span href="" class="navbar-brand">TalentHunt<img src="rk/logo.png" width="100px"></span>
        <a href="profile.php" id="profile"  >
            <?php
            if(isset($_SESSION['logged_in'])){
                display_profile();}
            ?>


        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarid">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarid">
            <ul class="navbar-nav text-center ml-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About </a>
                </li>

                <?php
                $html='';
                if (!isset($_SESSION['logged_in'])){
                    $html .='<li class=\"nav-item\">';
                    $html .='<a href="login.php" class="nav-link">Sign In</a>';
                    $html .='</li>';
                    $html .=' <li class="nav-item">';
                    $html .='<a href="signup.php" class="nav-link">Creat Account</a>';
                    $html .='</li>';
                }
                else{
                    $html .='<li class=\"nav-item\">';
                    $html .='<a href="logout.php" class="nav-link">logout</a>';
                    $html .='</li>';
                }
                echo $html;
                ?>





                <li class="nav-item">
                    <a href="#" class="nav-link">Competitions</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
</nav>

  <div class="container-fluid">


  <div class="row">
      <div class="col-12">
     <div class="card card-inverse" style="background-color: #333; border-color: #333;">
            <div class="card-block">
			  <div class="row">
            				<div class="col-md-8 col-sm-8">
					<h2 class="card-title text-white">Name: <?php echo $row_img_user['name'];?></h2>



				</div>
			  <div class="col-md-4 col-sm-4 text-center">
					<img class="btn-md" src="profiles/<?php echo $row_img_user['picture'];?>"
          width="200px" height="200px" alt="" style="border-radius:50%;">
				</div>
				<p class="text-white" style="margin-left:100px;"><strong>Make a post </strong>

				</p>
        <div class="col-md-4">
       <form class="border-white" style="border: 12px solid white; padding: 15px; border-radius: 30px;" action="action.php" method="POST" enctype="multipart/form-data" >
           <textarea class="form-control btn-white" name="description" placeholder="Your Post Description here"></textarea>
          <input class="text-white btn-primary mt-1" type="file" name="file">
           <?php
           $sql="SELECT * FROM `my_menu` WHERE `cat_type`='category'";
           $res=mysqli_query($conn,$sql);
           echo '<select class="btn-dark mt-1" name="category" onchange="getValue(this.value)" >';
           echo "<option>Select Category</option>";
           while ($row=mysqli_fetch_array($res)) {
               echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
           }
           echo "</select>";
           ?>
            <select name="sub_category" class="btn-dark" id="get_data">
                <option value="">Select Sub Category</option>
            </select>
            <input type="text" name="rate" id="rate">
          <button type="submit" class="btn-dark mt-1" name="upload_file">UPLOAD</button>

        </form >
        </div>
              </div>
            </div>
        <div>

            <?php require_once 'db.php';
            display_posts($user_id);
            ?>





  </div>
  </div>
</div>
      <script src="public/js/jquery-3.2.1.min.js"></script>
      <script src="public/js/bootstrap.min.js"></script>
      <script src="public/js/script.js"></script>
      <script src="public/js/add_post_js.js"></script>

</body>
</html>
