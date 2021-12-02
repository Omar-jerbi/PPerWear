<?php
    include_once("../db/connection.php");//$connection

    $m = mysqli_real_escape_string($connection ,strtolower(trim($_POST["email"])));
    $pw =  trim($_POST["pass"]);
    
    $stmt = mysqli_prepare($connection, "SELECT * from utenti where email = ?");
    mysqli_stmt_bind_param($stmt, 's', $m);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if(mysqli_affected_rows($connection) == 0){
        echo '<script>
            alert("Dati errati, riprova!");
            </script>';
            header("refresh:0; url= ../login.php");
    }else{
        $arr = mysqli_fetch_array($res);
        
        $pwdb = $arr[4];
        if(!password_verify($pw, $pwdb)){
            echo '<script>
            alert("Dati errati, riprova!");
            </script>';
            header("refresh:0; url= ../login.php");
        }else{
            session_start();
            
            $_SESSION["login"] = true;
            $_SESSION["firstname"] = $arr[1];
            $_SESSION["lastname"] =$arr[2];
            $_SESSION["email"] = $arr[3];


            echo '<script>
            alert("Ciao '.$_SESSION["firstname"].'! VERRAI REINDIRIZZATO ALLA HOME DEL SITO");
            </script>';
            header("refresh:0; url= ../_index.php");            
        }
    }
?>