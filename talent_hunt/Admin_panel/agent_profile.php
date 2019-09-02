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
            agent_profile($id);
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