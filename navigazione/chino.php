<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Chino</title>
    <script src="../js/addcategoriecat.js"></script>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<style>
    img{
        height: 500px;
        width: 400px;
    }
</style>

<body>
    <?php
        include("../php/FvarieAux.php");
        include("../common/header.php");
    ?>

    <div class="maincontent">
    <form action="../php/Fselezionearticoli.php" method="post">
        <ul>
        <?php
            if(!isset($_SESSION["sesso"])){
                $dir = '../img/pantaloni/chino/1';
                elementicatalogoBuilder($dir, "pantalonescelto");    
                $dir = '../img/pantaloni/chino/2';
                elementicatalogoBuilder($dir, "pantalonescelto");  
            }else{
                if($_SESSION["sesso"] == 1){
                    $dir = '../img/pantaloni/chino/1';
                    elementicatalogoBuilder($dir, "pantalonescelto");
                }elseif($_SESSION["sesso"] == 2){
                    $dir = '../img/pantaloni/chino/2';
                    elementicatalogoBuilder($dir, "pantalonescelto");
                }else{
                    $dir = '../img/pantaloni/chino/1';
                    elementicatalogoBuilder($dir, "pantalonescelto");    
                    $dir = '../img/pantaloni/chino/2';
                    elementicatalogoBuilder($dir, "pantalonescelto");         
                }
            }
        ?>
        <input type="submit" value="Aggiungi articolo al carrello!">
        </ul>
    </form>
    </div>

    <?php
        include("../common/footer.php");
    ?> 
    
</body>
</html>