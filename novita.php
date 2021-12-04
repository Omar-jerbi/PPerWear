<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Novità</title>
</head>

<style>
    img{
        width: 500px;
        height: 400;
        display: block;
    }

    .maglie > li, .pantaloni >li , .scarpe > li{
        display: inline-block;
        text-align: center;
    }


</style>


<body>
    <?php
        include("common/header.php");
    ?>

    <div class="maincontent">
        <form action="php/Fselezionearticoli.php" method="post">
            <h1>Selezione di Wears speciali per questo periodo speciale</h1>

                <ul class="maglie">
                    <h1>Scegli una maglia!</h1>
                    <?php 
                        include("listamaglie.php");
                    ?>
                </ul>

                <ul class="pantaloni">
                    <h1>Scegli un paio di pantaloni!</h1>
                    <?php
                        include("listapantaloni.php")
                    ?>
                </ul>

                <ul class="scarpe">
                    <h1>Scegli un paio di scarpe!</h1>
                    <?php 
                        include("listascarpe.php")
                    ?>
                </ul>

                <input type="submit" value="Conferma selezione">
        </form>
    </div>

    <?php
        include("common/footer.php");
    ?>   
</body>
</html>