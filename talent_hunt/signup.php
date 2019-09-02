<?php
session_start();  
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
        background: url(pics/b.jpg);
        background-size: cover;
        background-attachment: fixed;
      }
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
      .col-md-6{
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
                <li class="nav-item ">
                    <a href="login.php" class="nav-link">Login</a>
                </li>
            </ul>

        </div>
</nav>
	
	<div class="container">
     <div class="row">
       <div class="col-md-3">

       </div>
       <div class="col-md-6 ">
         <h3 id="g">Registration Form</h3>

         <form class="form-group" name="form" method="post" action="action.php" enctype="multipart/form-data">
           <div class="alert alert-error"></div>
            <div class="row">

        <label class=" fa fa-user label col-md-3 control-label">&nbsp Name</label>
        <div class="col-md-7">
          <input id="name" class="hh2 text-white" type="text" class="form-control text-white" placeholder="Enter your name"  name="name">
        </div>
      </div>

        <div class="row">

        <label class=" fa fa-envelope label col-md-3 control-label">&nbspE-mail</label>
        <div class="col-md-7">
          <input class="hh2 text-white" id="mail" type="Email" class="form-controltext-white" placeholder="Enter your mail" name="Mail">
        </div>
      </div>

      <div class="row">

        <label class=" fa fa-key label col-md-3 control-label">&nbspPassword</label>
        <div class="col-md-5 ml-3">
          <input id="password" class="hh2 text-white"  type="password" class="hh2 form-control  "
                 placeholder="Enter your Password" name="password">
        </div>
      </div>

      <div class="row">

        <label class=" fa fa-check label col-md-3 control-label">&nbspConfirm</label>
        <div class="col-md-7">
          <input class="hh2 text-white" id="confirm" type="password" class="form-control text-white"
                 placeholder="Confirm your password" name="confirm">
        </div>
      </div>

      <div class="row">
        <label class="col-md-3 control-label">&nbspGender</label>
        <div class="col-md-7" style="font-size: 20px;">
          <span class="fas fa-male "> Male</span>
          <input type="radio" value="male"  name="gender">
          <span class="fas fa-female "> Female</span>
          <input type="radio" value="femal"  name="gender">
        </div>
      </div>
      <hr>


      <div class="row">
        <label class="far fa-image col-md-2 control-label" area-hidden="true">&nbsp Profile</label>
        <div class="col-md-8 mt-20" >
          <input type="file" id="hh" name="file">
        </div>
      </div>

      <div class="row ">
        <div class="btn-group-lg btn-block  mt-3">
          <input type="submit" class="btn-item btn btn-outline-success" name="signup" onclick="return validate();">

          <input type="reset" class="btn-item btn btn-outline-danger" name="reset">

        </div>
      </div>
      <span class="h6">Already have an account?</span>
      <button class="btn btn-outline-primary"><a href="login.php">Login</a></button>
       </div>


         </form>

     </div>
   </div>


	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/script.js"></script>
    <script>
        function validate() {

            var name1=document.getElementById('name').value;
            var mail1=document.getElementById('mail').value;
            var password1=document.getElementById('password').value;
            var confirm=document.getElementById('confirm').value;
            var mail=document.forms["form"]["Mail"].value;
            var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
            if(name1==""){
                alert('enter your name1');
                return false;
            }
            else if(mail1==""){
                alert('enter your mail');
                return false;
            }
            else if(!regex.test(mail))
            {
                //alert("Enter a valid email");
                document.getElementById('ferror').innerHTML="enter a valid email address";
                return false;
            }
            else if(password1==""){
                alert('enter your password');
                return false;
            }
            else if(password1.length<8){
                alert('password must be greater than 7 letters');
                return false;
            }
            else if(confirm==""){
                alert('confirm your password');
                return false;
            }
            else if(password1!=confirm){
                alert('password does not match');
                return false;
            }
            else if (document.form.gender[0].checked==false&&document.form.gender[1].checked==false) {
                alert('please select your gender');
                return false;
            }



        }
    </script>

</body>
</html>
