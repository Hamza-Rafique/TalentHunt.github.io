<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>





    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <?php
            show_agents();
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