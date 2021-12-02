<?php
    session_start();
    if(!isset($_SESSION["login"])){
        echo '
        <script>
            alert("NON SEI LOGGATO");
        </script>';
        header("refresh:0; url= ../_index.php");
        exit;
    }

    include_once("../db/connection.php");//$connection

    $mail = $_SESSION["email"];
    $mm = mysqli_real_escape_string($connection, strtolower(trim($_POST["misura_maglie"])));
    $mp = mysqli_real_escape_string($connection, strtolower(trim($_POST["misura_pantaloni"])));
    $ms = mysqli_real_escape_string($connection ,strtolower(trim($_POST["misura_scarpe"])));
    $s = $_POST["sesso"];

    $stmt = mysqli_prepare($connection, "UPDATE `utenti` SET `sesso` = ?, `misura_pantaloni` = ?, `misura_scarpe` = ?, `misura_maglie` = ? WHERE `email` = ?");
    $sint = intval($s);
    $mpint = intval($mp);
    $msint = intval($ms);
    $mmint = intval($mm);
    mysqli_stmt_bind_param($stmt, 'iiiis', $sint, $mpint, $msint, $mmint, $mail);

    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    if(mysqli_affected_rows($connection) == 0){
        echo '<script>
            alert("ERRORE");
            </script>';
            header("refresh:0; url= ../updateprofile.php");
    }else{
        echo '<script>
            alert("HOORAY!!!");
            </script>';
            header("refresh:0; url= ../profile.php");        
    }

?>