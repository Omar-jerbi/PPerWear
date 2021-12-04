<?php
    if(!isset($_POST["misura_maglie"])){//quando si accede a questo file direttamnete tramite l'url
        header("Location: ../_index.php");    
        exit;
    }

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
    $tel = mysqli_real_escape_string($connection ,strtolower(trim($_POST["tel"])));
    $addr = mysqli_real_escape_string($connection ,strtolower(trim($_POST["addr"])));
    $s = $_POST["sesso"];

    $stmt = mysqli_prepare($connection, "UPDATE `utenti` SET `sesso` = ?, `misura_pantaloni` = ?, `misura_scarpe` = ?, `misura_maglie` = ?, `tel` = ?, `addr` = ? WHERE `email` = ?");
    $sint = intval($s);
    $mpint = intval($mp);
    $msint = intval($ms);
    $mmint = intval($mm);
    mysqli_stmt_bind_param($stmt, 'iiiisss', $sint, $mpint, $msint, $mmint, $tel, $addr, $mail);

    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    if(mysqli_affected_rows($connection) == 0){
        echo '<script>
            alert("ERRORE");
            </script>';
            header("refresh:0; url= ../updateprofile.php");
    }else{

        $_SESSION["sesso"] = $sint; 
        $_SESSION["misura_pantaloni"] = $mpint;
        $_SESSION["misura_scarpe"] = $msint;
        $_SESSION["misura_maglie"] = $mmint == 1 ? 'S' :($mmint == 2 ? 'M' :( $mmint == 3 ? 'L': 'XL'));
        $_SESSION["tel"] = $tel;
        $_SESSION["addr"] = $addr;

        echo '<script>
            alert("Hai aggiornato i tuoi dati!");
            </script>';
            header("refresh:0; url= ../profile.php");        
    }

?>