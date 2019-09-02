<?php
session_start();


if (isset($_GET['value'])){
    $user_id=$_GET['value'];

}


include('includes/header.php');
include('includes/navbar.php');
?>

    <div class="container-fluid">

        <!-- DataTales Example -->


        <?php
        all_competitions();
        ?>

    </div>

    </div>

    </div>

    <!-- /.container-fluid -->

<?php
include('includes/scripts.php');

?>