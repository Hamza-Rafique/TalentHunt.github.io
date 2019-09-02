<?php
session_start();
if (isset($_GET['value'])){
    $id=$_GET['value'];
}
include('includes/header.php');
include('includes/navbar.php');
?>





<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?php
        if (isset($_GET['check_id'])){
            $cart_id=$_GET['check_id'];
            check_cart($cart_id);
        }
        ?>


    </div>
</div>
</div>

</div>

<!-- /.container-fluid -->

<?php
include('includes/scripts.php');

?>
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/script.js"></script>
<script src="public/js/add_post_js.js"></script>
