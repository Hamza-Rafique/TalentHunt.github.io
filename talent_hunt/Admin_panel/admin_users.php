<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>





    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                   <?php
                    if (isset($_GET['show'])){
                        show_users();
                    }
                    if (isset($_POST['carts'])){
                        cart_admin();
                    }
                    ?>


                </div>
            </div>
        </div>

    </div>

    <!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>