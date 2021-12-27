<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Congratulazioni!</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
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
        <h1>...</h1>
        <h1>..</h1>
        <h1>.</h1>
        <br>
        <br>
        <?php
            $i = 0;
            if(!isset($_COOKIE["magliascelta"])){
                $i++;
                echo '<h1>Non hai selezionato nessuna maglia</h1>';
            }
            
            if(!isset($_COOKIE["pantalonescelto"])){
                $i++;
                echo '<h1>Non hai selezionato nessun pantalone</h1>';
            }
            
            if(!isset($_COOKIE["scarpascelta"])){
                $i++;
                echo '<h1>Non hai selezionato nessun paio di scarpe</h1>';
            }

            if($i == 0)
                include("db/gestioneordine.php");
        ?>
    </div>
    
    <?php
        include("common/footer.php");
    ?>
</body>
</html>