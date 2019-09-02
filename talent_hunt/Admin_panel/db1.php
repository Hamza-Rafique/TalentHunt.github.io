<?php

function connect(){
    $connection = mysqli_connect('localhost', 'root', '', 'search_engine_tl');
    if(!$connection){
        die('Failed to connect db');
    }
    return $connection;
}