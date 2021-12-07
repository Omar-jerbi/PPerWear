<?php
    if(!isset($_POST["magliascelta"])){//quando si accede a questo file direttamnete tramite l'url
        header("Location: ../_index.php");    
        exit;
    }
    
    $ms = $_POST["magliascelta"];
    $ps = $_POST["pantalonescelto"];
    $ss = $_POST["scarpascelta"];
    
    //echo  $_POST["img/maglia1_jpg"]; 
    ///////IMPORTANTISSIMO " . " in name -> " _ "
    //es ...name="aa.jpg"   --->  $_POST["aa_jpg"]
    
    $ValOFms = str_replace(".", "_", $ms);
    $ValOFps = str_replace(".", "_", $ps);
    $ValOFss = str_replace(".", "_", $ss);


    $tagliams = $_POST[$ValOFms];
    $tagliaps = $_POST[$ValOFps];
    $tagliass = $_POST[$ValOFss];
    


    setcookie("carrello", 'pieno', 0 ,'/');

    setcookie('magliascelta', $ms, 0, '/');
    setcookie('pantalonescelto', $ps, 0, '/');
    setcookie('scarpascelta', $ss, 0, '/');

    setcookie('misuramaglia', $tagliams, 0, '/');
    setcookie('misurapantaloni', $tagliaps, 0, '/');
    setcookie('misurascarpe', $tagliass, 0, '/');

    header("Location: ../carrello.php");
?>