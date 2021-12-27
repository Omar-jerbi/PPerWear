<?php
    if(!isset($_POST["firstname"])||!isset($_POST["lastname"])||!isset($_POST["email"])||!isset($_POST["pass"])||!isset($_POST["confirm"])){//quando si accede a questo file direttamnete tramite l'url
        header("Location: ../_index.php");    
        exit;
    }

    if($_POST["firstname"] == "" || $_POST["lastname"] == "" ||$_POST["email"] == ""||$_POST["pass"] == ""||$_POST["confirm"] == ""){
        echo"
        <script>
            alert('ERRORE DATI MANCANTI');
        </script>
        ";
        header("refresh:0; url= ../formregistration.php");
        exit;
    }
    elseif($_POST["pass"] != $_POST["confirm"]){
        echo"
        <script>
            alert('CONFERMA PASSWORD ERRATA');
        </script>
        ";
        header("refresh:0; url= ../formregistration.php");
        exit;
    }
    else {
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo"
            <script>
                alert('ERRORE FORMATO EMAIL');
            </script>
            ";
            header("refresh:0; url= ../formregistration.php");
            exit;
        }
    }



    
    include("/xampp/htdocs/sawproject/db/connection.php");//$connection

    $f = mysqli_real_escape_string($connection, htmlspecialchars($_POST["firstname"]));
    $l = mysqli_real_escape_string($connection, htmlspecialchars($_POST["lastname"]));
    $m = mysqli_real_escape_string($connection ,htmlspecialchars($_POST["email"]));
    $pw =  password_hash((trim($_POST["pass"])), PASSWORD_DEFAULT);



    $stmt = mysqli_prepare($connection, "SELECT * from utenti where email = ?");
    mysqli_stmt_bind_param($stmt, 's', $m);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
 
  
    if(mysqli_affected_rows($connection) != 0){
        echo '<script>
            alert("utente già registrato");
            </script>';
            header("refresh:0; url= ../formregistration.php");
            exit;
    }else{
        $stmt = mysqli_prepare($connection, "INSERT INTO `utenti`(`firstname`, `lastname`, `email`, `pass`) VALUES (?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'ssss', $f, $l, $m, $pw);
        mysqli_stmt_execute($stmt);

        session_start();
        
        $_SESSION["idutente"] = mysqli_insert_id($connection);
        $_SESSION["login"] = true;
        $_SESSION["firstname"] = $_POST["firstname"];
        $_SESSION["lastname"] = $_POST["lastname"];
        $_SESSION["email"] = $_POST["email"];

        echo '<script>
        alert("Benvenuto in PayPerWear! Completa il tuo profilo per iniziare ad utilizzare il servizio");
        </script>';

        header("refresh:0; url= ../updateprofile.php");
        exit;
    }
?>
