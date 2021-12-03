<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Novità</title>
</head>


<body>
    <?php
        include("common/header.php");
    ?>

    <div class="maincontent">

    <h1>Seleziona un articolo per ogni categoria</h1>

        <ul class="maglie">
            <h1>Scegli una maglia!</h1>
            <?php 
                include("listamaglie.php");
            ?>
        </ul>

        <ul class="pantaloni">
            <h1>qui andranno i pantaloni</h1>
        </ul>

        <ul class="scarpe">
            <h1>qui andranno le scarpe</h1>
        </ul>

    </div>

    <?php
        include("common/footer.php");
    ?>   
</body>
</html>