<?php
        //quando si accede a questo file direttamnete tramite l'url
    if(!isset($_POST["magliascelta"])&&!isset($_POST["pantalonescelto"])&&!isset($_POST["scarpascelta"])){
        header("Location: ../_index.php");    
        exit;
    }
    

    $ms = isset($_POST["magliascelta"]) ? $_POST["magliascelta"]: null;
    $ps = isset($_POST["pantalonescelto"]) ? $_POST["pantalonescelto"] : null;
    $ss = isset($_POST["scarpascelta"]) ? $_POST["scarpascelta"] : null;
    
    //echo  $_POST["img/maglia1_jpg"]; 
    ///////IMPORTANTISSIMO " . " in name -> " _ "
    //es ...name="aa.jpg"   --->  $_POST["aa_jpg"]
    
    if($ms != null)$ValOFms = str_replace(".", "_", $ms);
    if($ps != null)$ValOFps = str_replace(".", "_", $ps);
    if($ss != null)$ValOFss = str_replace(".", "_", $ss);


    if($ms != null)$tagliams = $_POST[$ValOFms];
    if($ps != null)$tagliaps = $_POST[$ValOFps];
    if($ss != null)$tagliass = $_POST[$ValOFss];
    


    setcookie("carrello", 'pieno', 0 ,'/');

    if($ms != null)setcookie('magliascelta', $ms, 0, '/');
    if($ps != null)setcookie('pantalonescelto', $ps, 0, '/');
    if($ss != null)setcookie('scarpascelta', $ss, 0, '/');

    if($ms != null)setcookie('misuramaglia', $tagliams, 0, '/');
    if($ps != null)setcookie('misurapantaloni', $tagliaps, 0, '/');
    if($ss != null)setcookie('misurascarpe', $tagliass, 0, '/');

    header("Location: ../carrello.php?controllodata=si");
?>