<?php
    $connection = mysqli_connect("localhost", "root", "", "dbprova");
    
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>