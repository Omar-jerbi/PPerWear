<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>PayPerWear -Congratulazioni!</title>
</head>
<body>
    <?php
        error_reporting(E_ALL & ~E_NOTICE);//non visualizza warning della session_start() duplicata
        session_start();
        if(!isset($_SESSION["login"]) || !isset($_COOKIE["carrello"])){
            echo '
            <script>
                alert("ACCESSO NEGATO");
            </script>';
            header("refresh:0; url= /sawproject/_index.php");
            exit;    
        }

        include("common/header.php");
        ?>

    <div class="maincontent">
        <h1>Stiamo elaborando la tua richiesta...</h1>
        <h1>..</h1>
        <h1>.</h1>
        
        <?php
        include("db/gestioneordine.php");
        ?>
    </div>
    
    <?php
        include("common/footer.php");
    ?>
</body>
</html>