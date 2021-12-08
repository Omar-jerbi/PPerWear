<?php
    if(!isset($_COOKIE["magliascelta"])){//quando si accede a questo file direttamnete tramite l'url
        header("Location: ../_index.php");    
        exit; 
    }

    $articolidainserire = $_COOKIE["magliascelta"]."|".$_COOKIE['pantalonescelto']."|".$_COOKIE['scarpascelta'];
    $tagliedainserire = $_COOKIE["misuramaglia"]."|".$_COOKIE["misurapantaloni"]."|".$_COOKIE["misurascarpe"];

    include("connection.php");

    $stmt = mysqli_prepare($connection, "INSERT INTO `ordini` (`idordine`, `articoli`, `taglie`) VALUES (NULL, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ss', $articolidainserire, $tagliedainserire);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if(mysqli_affected_rows($connection) == 0){
        echo "<h1>Ci dispiace! qualcosa è andato storto...</h1>";
        
        exit;
    }else{
        
        echo "<h1>CONGRATULAZIONI! In pochi giorni riceverai il tuo Wear presso l'indirizzo che ci hai fornito</h1>";
        
        $idordine = mysqli_insert_id($connection);
        $idutente = $_SESSION["idutente"];
        
        $stmt = mysqli_prepare($connection, "INSERT INTO `ordiniutenti` (`idutente`, `idordine`) VALUES (?, ?)");
        mysqli_stmt_bind_param($stmt, 'ii', $idutente, $idordine);
        mysqli_stmt_execute($stmt);
        
        //annullamento cookie carrello
        setcookie("carrello", "", time() - 3600, '/');
        setcookie("magliascelta", "", time() - 3600, '/');
        setcookie("pantalonescelto", "", time() - 3600, '/');
        setcookie("scarpascelta", "", time() - 3600, '/');
        setcookie("misuramaglia", "", time() - 3600, '/');
        setcookie("misurapantaloni", "", time() - 3600, '/');
        setcookie("misurascarpe", "", time() - 3600, '/');

    }
?>
