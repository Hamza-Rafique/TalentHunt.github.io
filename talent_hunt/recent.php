<?php
if (isset($_GET['recent'])) {
    session_start();
    include 'db.php';
    recent();
}