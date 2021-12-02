<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Storico</title>
</head>
<body>
    <?php
        if(!isset($_SESSION["login"])){
            echo '
            <script>
            alert("PRIMA DEVI FARE IL LOGIN");
            </script>';
            header("refresh:0; url= /sawproject/_index.php");
            exit;
        }
        
        include("../common/header.php");
    ?>

    <div class="maincontent">

    </div>

    <?php
        include("../common/footer.php");
    ?>
</body>
</html>