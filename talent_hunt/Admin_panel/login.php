<?php
session_start();
include('includes/header.php');
?>




    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-6 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>


                                        <form class="user" action="action.php" method="POST">

                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                            </div>

                                            <input type="submit" name="login" class="btn btn-primary btn-user btn-block"> Login </input>
                                            <hr>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>


<?php
include('includes/scripts.php');
?>