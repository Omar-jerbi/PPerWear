<?php
    if(!isset($_POST["magliascelta"])){//quando si accede a questo file direttamnete tramite l'url
        header("Location: ../_index.php");    
        exit;
    }
    
    $ms = $_POST["magliascelta"];
    $ps = $_POST["pantalonescelto"];
    $ss = $_POST["scarpascelta"];
    
    $tagliams = $_POST["misuramaglia"];
    $tagliaps = $_POST["misurapantaloni"];
    $tagliass = $_POST["misurascarpe"];
    
    setcookie("carrello", 'pieno', 0 ,'/');

    setcookie('magliascelta', $ms, 0, '/');
    setcookie('pantalonescelto', $ps, 0, '/');
    setcookie('scarpascelta', $ss, 0, '/');

    setcookie('misuramaglia', $tagliams, 0, '/');
    setcookie('misurapantaloni', $tagliaps, 0, '/');
    setcookie('misurascarpe', $tagliass, 0, '/');

    header("Location: ../carrello.php");
?>