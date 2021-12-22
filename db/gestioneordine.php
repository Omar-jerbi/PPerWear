<?php
    if(!isset($_COOKIE["magliascelta"])){//quando si accede a questo file direttamnete tramite l'url
        header("Location: ../_index.php");    
        exit; 
    }


    include("connection.php");
    
    
    $canary = 0;//se una insert fallisce = 1 (articolo non è presente su db)
    mysqli_begin_transaction($connection);/***************/
     
        $stmt = mysqli_prepare($connection, "INSERT INTO `ordini` (`idordine`, `articolo`, `taglia`) VALUES (NULL, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'si', $_COOKIE["magliascelta"], $_COOKIE["misuramaglia"]);
        
        if(!mysqli_stmt_execute($stmt)){
            $canary = 1;
        }else{
            $idordine = mysqli_insert_id($connection);//ultimo id auto_increment generato
    
            $stmt = mysqli_prepare($connection, "INSERT INTO `ordini` (`idordine`, `articolo`, `taglia`) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, 'isi', $idordine, $_COOKIE["pantalonescelto"], $_COOKIE["misurapantaloni"]);
            if(!mysqli_stmt_execute($stmt)){
                $canary = 1;
            }else{
                mysqli_stmt_bind_param($stmt, 'isi', $idordine, $_COOKIE["scarpascelta"], $_COOKIE["misurascarpe"]);
                if(!mysqli_stmt_execute($stmt)){
                    $canary = 1;
                }
            }
    
        }
        
    if($canary == 0){
        echo "<h1>CONGRATULAZIONI! In pochi giorni riceverai il tuo Wear presso l'indirizzo che ci hai fornito</h1>";
        $idutente = $_SESSION["idutente"];
    
        $stmt = mysqli_prepare($connection, "INSERT INTO `ordiniutenti` (`idutente`, `idordine`) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, 'ii', $idutente, $idordine);
        mysqli_stmt_execute($stmt);
        
        
        mysqli_commit($connection);/***************/
    }else{
        echo "<h1>Ci dispiace! qualcosa è andato storto...</h1>";
        
        mysqli_rollback($connection);/***************/
    }


    //annullamento cookie carrello
    setcookie("carrello", "", time() - 3600, '/');
    setcookie("magliascelta", "", time() - 3600, '/');
    setcookie("pantalonescelto", "", time() - 3600, '/');
    setcookie("scarpascelta", "", time() - 3600, '/');
    setcookie("misuramaglia", "", time() - 3600, '/');
    setcookie("misurapantaloni", "", time() - 3600, '/');
    setcookie("misurascarpe", "", time() - 3600, '/');


?>
