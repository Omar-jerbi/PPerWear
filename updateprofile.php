<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Update Profile</title>
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

    </div>

    <?php
        include("common/footer.php");
    ?>
</body>
</html>