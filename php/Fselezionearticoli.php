<?php
    $ms = $_POST["magliascelta"];
    $ps = $_POST["pantalonescelto"];
    $ss = $_POST["scarpascelta"];
    
    setcookie("carrello", 'pieno', 0 ,'/');
    setcookie('magliascelta', $ms, 0, '/');
    setcookie('pantalonescelto', $ps, 0, '/');
    setcookie('scarpascelta', $ss, 0, '/');

    header("Location: ../carrello.php");
?>