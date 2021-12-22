<?php
error_reporting(E_ALL & ~E_NOTICE);//non visualizza warning della session_start() duplicata
session_start();

    $currentdate = date_create(date("Y-m-d H:i:s"));

    include("../db/connection.php");
    $stmt = mysqli_prepare($connection, "SELECT * FROM ordiniutenti WHERE idutente = ? order by data desc");
    mysqli_stmt_bind_param($stmt, 'i', $_SESSION["idutente"]);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    $arr = mysqli_fetch_array($res);
    
    if(!$arr){ //no ordini fatti
        echo 'OK';
        exit;        
    }else{
        $lastorder_date = $arr[2];
    
        $diff = date_diff($currentdate, date_create($lastorder_date))->format("%a");
    
    
        if((int)$diff >=25){//deve avere fatto l'ultimo ordine almeno 25 giorni fa
            echo 'OK';
            exit;
        }else{
            echo 'KO';
            exit;
        }
    }

?>