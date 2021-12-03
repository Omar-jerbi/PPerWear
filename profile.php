<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Profile</title>
</head>
<body>
    <?php
        error_reporting(E_ALL & ~E_NOTICE);//non visualizza warning della session_start() duplicata
        session_start();
        if(!isset($_SESSION["login"])){
            echo '
            <script>
                alert("PRIMA DEVI FARE IL LOGIN");
            </script>';
            header("refresh:0; url= /sawproject/_index.php");
            exit;    
        }
        
        include("common/header.php");
    ?>

    <div class="maincontent">

    <div class="greetings">
        Ciao <?php echo ucwords($_SESSION["firstname"]);?>! Questi sono i dati che ci hai fornito. <br>
        Ricorda che puoi cambiarli in qualsiasi momento aggiornando il tuo profilo!
    </div>




    </div>

    <?php
        include("common/footer.php");
    ?>    
</body>
</html>