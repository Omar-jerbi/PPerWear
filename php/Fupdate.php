<?php
    if(!isset($_POST["firstname"])){//quando si accede a questo file direttamnete tramite l'url
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

    include("/xampp/htdocs/sawproject/db/connection.php");//$connection

    $id = $_SESSION["idutente"];
    
    $f = mysqli_real_escape_string($connection, htmlspecialchars($_POST["firstname"]));
    $l = mysqli_real_escape_string($connection, htmlspecialchars($_POST["lastname"]));
    $m = mysqli_real_escape_string($connection ,htmlspecialchars($_POST["email"]));

    error_reporting(E_ERROR | E_PARSE);//rimuove warning presenti durante esecuzione test
    $mm = mysqli_real_escape_string($connection, htmlspecialchars($_POST["misura_maglie"]));
    $mp = mysqli_real_escape_string($connection, htmlspecialchars($_POST["misura_pantaloni"]));
    $ms = mysqli_real_escape_string($connection ,htmlspecialchars($_POST["misura_scarpe"]));
    $tel = mysqli_real_escape_string($connection ,htmlspecialchars($_POST["tel"]));
    $addr1 = mysqli_real_escape_string($connection ,htmlspecialchars($_POST["addr1"]));
    $addr2 = mysqli_real_escape_string($connection ,htmlspecialchars($_POST["addr2"]));
    $addr3 = mysqli_real_escape_string($connection ,htmlspecialchars($_POST["addr3"]));
    $s = $_POST["sesso"];


    //input check
    if(!isset($f)||!isset($l)||!isset($m)){
        echo '<script>
        alert("ERRORE");
        </script>';
        header("refresh:0; url= ../updateprofile.php");
    }


    $addr = $addr1.'/'.$addr2.'/'.$addr3;

    $stmt = mysqli_prepare($connection, "UPDATE `utenti` SET `firstname` = ?,  `lastname` = ? ,`email` = ?, `sesso` = ?, `misura_pantaloni` = ?, `misura_scarpe` = ?, `misura_maglie` = ?, `tel` = ?, `addr` = ? WHERE `id` = ?");
    $sint = intval($s);
    $mpint = intval($mp);
    $msint = intval($ms);
    $mmint = intval($mm);
    mysqli_stmt_bind_param($stmt, 'sssiiiissi', $f,$l, $m, $sint, $mpint, $msint, $mmint, $tel, $addr, $id);

    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    
    if(mysqli_affected_rows($connection) == 0){
        echo '<script>
            alert("ERRORE");
            </script>';
            header("refresh:0; url= ../updateprofile.php");
    }else{

        //cookie di sessione con informazioni dell'utente
        $_SESSION["firstname"] = $f;
        $_SESSION["lastname"] = $l;
        $_SESSION["email"] = $m; 
        $_SESSION["sesso"] = $sint; 
        $_SESSION["misura_pantaloni"] = $mpint;
        $_SESSION["misura_scarpe"] = $msint;
        $_SESSION["misura_maglie"] = $mmint == 1 ? 'S' :($mmint == 2 ? 'M' :( $mmint == 3 ? 'L': 'XL'));
        $_SESSION["tel"] = $tel;
        $_SESSION["addr"] = $addr;

        echo '<script>
            alert("Hai aggiornato i tuoi dati!");
            </script>';
            header("refresh:0; url= ../showprofile.php");  
            exit;      
    }

?>