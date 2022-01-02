<?php
    $connection = mysqli_connect("localhost", "S4540263", "ABC1234", "S4540263");
    
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>