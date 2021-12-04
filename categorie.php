<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Categorie</title>
    <script src="js/addcategoriemaglie.js"></script>
</head>
<body>
    <?php
        include("common/header.php");
    ?>

    <div class="maincontent">
        <ul class="maincategorie">
            <li id="maglie" onmouseover="addcategorie('magliehidden')" onmouseout="remcategorie('magliehidden')">Maglie
                <ul id="magliehidden" hidden>
                    <li>Tshirt</li>
                    <li>Maglioni</li>
                    <li>Camicie</li>
                </ul>

            </li>
            <li id="pantaloni" onmouseover="addcategorie('pantalonihidden')" onmouseout="remcategorie('pantalonihidden')">Pantaloni
                <ul id="pantalonihidden" hidden>
                    <li>Jeans</li>
                    <li>Chino</li>
                    <li>Bermuda</li>
                </ul>


            </li>
            <li id="scarpe" onmouseover="addcategorie('scarpehidden')" onmouseout="remcategorie('scarpehidden')">Scarpe
                <ul id="scarpehidden" hidden>
                    <li>Sneakers</li>
                    <li>Stivali</li>
                    <li>Mocassini</li>
                </ul>

 
            </li>
        </ul>
    </div>

    <?php
        include("common/footer.php");
    ?>   
</body>
</html>