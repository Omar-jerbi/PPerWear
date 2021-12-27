<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Categorie</title>
    <script src="../js/addcategoriecat.js"></script>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/categ.css">
</head>

<body>
    <?php
    include("../common/header.php");
    ?>

    <div class="maincontent">
        <ul class="maincategorie">
            <li id="maglie" onmouseover="addcategorie('magliehidden')" onmouseout="remcategorie('magliehidden')">
                Maglie
                <ul id="magliehidden" hidden>
                    <li><a class="mh1" href="tshirt.php">Tshirt</a></li>
                    <li><a class="mh2" href="maglioni.php">Maglioni</a></li>
                    <li><a class="mh3" href="camicie.php">Camicie</a></li>
                </ul>
            </li>



            <li id="pantaloni" onmouseover="addcategorie('pantalonihidden')" onmouseout="remcategorie('pantalonihidden')">
                Pantaloni
                <ul id="pantalonihidden" hidden>
                    <li><a href="jeans.php">Jeans</a></li>
                    <li><a href="chino.php">Chino</a></li>
                    <li><a href="bermuda.php">Bermuda</a></li>
                </ul>
            </li>



            <li id="scarpe" onmouseover="addcategorie('scarpehidden')" onmouseout="remcategorie('scarpehidden')">
                Scarpe
                <ul id="scarpehidden" hidden>
                    <li><a href="sneakers.php">Sneakers</a></li>
                    <li><a href="stivali.php">Stivali</a></li>
                    <li><a href="mocassini.php">Mocassini</a></li>
                </ul>
            </li>

        </ul>
    </div>

    <?php
    include("../common/footer.php");
    ?>
</body>

</html>