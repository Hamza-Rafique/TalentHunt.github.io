<?php
session_start();
if (isset($_GET['value'])){
    $id=$_GET['value'];
}
include('includes/header.php');
include('includes/navbar.php');
?>


<style>
    .container-fluid{
        color: white;background: #1b1e21;
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
    label{
        margin-top: 35px;
        font-size: 20px;
    }

</style>



<div class="container-fluid">

    <!-- DataTales Example -->

        <?php
        add_agents();
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
