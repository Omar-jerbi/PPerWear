<?php
    include("../db/connection.php");
    
    $stmt = mysqli_prepare($connection, "SELECT * from utenti where email = ?");
    mysqli_stmt_bind_param($stmt, 's', $_POST["email"]);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    
    if(mysqli_affected_rows($connection) != 0){
        echo 'KO';
        exit;//ESSENZIALE!!!!
    }else{
        echo 'OK';
        exit;
    }


?>

