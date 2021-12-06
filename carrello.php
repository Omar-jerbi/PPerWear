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

    .carrellovuoto{
        width: 500px;
        height: auto;       
    }
</style>


<body>
    <?php
        include("common/header.php");
    ?>

    <div class="maincontent">

        <?php
            if(!isset($_COOKIE["carrello"])){

                include("carrellovuoto.php");

                include("common/footer.php");
                exit;
            }
        ?>

        <div class="maglia">
            <h2>La maglia che riceverai questo mese:</h2>
            <img src="<?php echo $_COOKIE['magliascelta']  ?>" alt="">
            <h3>Taglia: <?php echo $_COOKIE['misuramaglia']?></h3>
        </div>
        

        <div class="pantalone">
            <h2>I pantaloni che riceverai questo mese:</h2>
            <img src="<?php echo $_COOKIE['pantalonescelto']  ?>" alt="">
            <h3>Taglia: <?php echo $_COOKIE['misurapantaloni']?></h3>
        </div>

        <div class="scarpa">
            <h2>Le scarpe che riceverai questo mese:</h2>
            <img src="<?php echo $_COOKIE['scarpascelta']  ?>" alt="">
            <h3>Taglia: <?php echo $_COOKIE['misurascarpe']?></h3>
        </div>

        <?php
            if(isset($_SESSION["login"])){
                if(isset($_SESSION["misura_pantaloni"])){
                    echo'<a href="conferma.php">Conferma!</a>'; //utente loggato con tutte le info
                }else{
                    echo"<h3>Aggiorna il tuo profilo per confermare l'ordine</h3>";
                }
            }else{
                echo"<h3>Per confermare la tua selezione devi prima fare il login!</h3>";
            }
        ?>
            


    </div>

    <?php
        include("common/footer.php");
    ?>   
</body>
</html>