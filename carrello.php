<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Carrello</title>
</head>


<style>
    img{
        width: 200px;
        height: 200px;
    }
</style>


<body>
    <?php
        include("common/header.php");
    ?>

    <div class="maincontent">

        <?php
            if(!isset($_COOKIE["carrello"])){
                echo "carrello vuoto";
                //aggiungi roba carina
                include("common/footer.php");
                exit;
            }
        ?>

        <div class="maglia">
            <h2>La maglia che riceverai questo mese:</h2>
            <img src="<?php echo $_COOKIE['magliascelta']  ?>" alt="">
        </div>
        

        <div class="pantalone">
            <h2>I pantaloni che riceverai questo mese:</h2>
            <img src="<?php echo $_COOKIE['pantalonescelto']  ?>" alt="">
        </div>

        <div class="scarpa">
            <h2>Le scarpe che riceverai questo mese:</h2>
            <img src="<?php echo $_COOKIE['scarpascelta']  ?>" alt="">
        </div>

            <a href="conferma.php">Conferma!</a>


    </div>

    <?php
        include("common/footer.php");
    ?>   
</body>
</html>