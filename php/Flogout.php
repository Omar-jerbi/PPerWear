<?php
    session_start();
    if(!isset($_SESSION["login"])){
        echo '
        <script>
            alert("NON SEI LOGGATO");
        </script>';
        header("refresh:0; url= ../_index.php");
        exit;
    }else{
        $_SESSION = array();
        session_destroy();

        echo '
        <script>
            alert("Verrai reindirizzato alla home come utente non registrato");
        </script>';

        setcookie(session_name(),'',time() - 42000);
        header("Refresh:1; url=../_index.php");       
    }

?>

