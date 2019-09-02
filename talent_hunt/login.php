<?php
session_start();
if(isset($_SESSION['logged_in'])){
	header('location: index.php');
}  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="new_boot/css/font.css">
    <link rel="stylesheet" href="public/css/style_new.css">

    <link type="text/css" rel="stylesheet" href="boots/boots4.css">
    <link rel="stylesheet" href="con.css" type="text/css">
</head>
<body>

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
                    <a href="signup.php" class="nav-link">Signup</a>
                </li>
            </ul>

        </div>
</nav>


		<div  class="row offset-4">
			<div class="col-lg-5 col-lg-offset-4">
				<h2>Login here</h2>
				<form action="auth.php" method="post">
					<div class="form-group">
						<label for="email">Email address</label>
						<input type="text" class="form-control" name="email" id="email"  placeholder="Email">
					</div>

					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password"  placeholder="Password">
					</div>
					<button type="submit" onclick="return validate();" name="submit" class="btn btn-primary btn-block">Login</button>
				</form>
	

			</div>
		</div>



	<script src="public/js/jquery-3.2.1.min.js"></script>
	<script src="public/js/bootstrap.min.js"></script>
	<script src="public/js/script.js"></script>
<script>
    function validate() {
        var mail=document.getElementById('email').value;
        var password=document.getElementById('password').value;
        if(mail==""){
            alert('enter your mail');
            return false;
        }
        else if(password==""){
            alert('enter your passowrd');
            return false;
        }
    }

</script>
</body>
</html>