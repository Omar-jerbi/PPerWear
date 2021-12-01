<?php
    if($_POST["firstname"] == "" || $_POST["lastname"] == "" ||$_POST["email"] == ""||$_POST["pass"] == ""||$_POST["confirm"] == ""){
        echo "
        <h1>
            MANCANO ALCUNI DATI
        </h1>
        ";
        echo '<a href="../registration.php">RIPROVA</a>';
    }
?>
