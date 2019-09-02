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
       display_cart();
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
<script src="public/js/jquery-3.2.1.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/script.js"></script>
<script src="public/js/add_post_js.js"></script>
