<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Mocassini</title>
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
                $dir = '../img/scarpe/mocassini/1';
                elementicatalogoBuilder($dir, "scarpascelta");    
                $dir = '../img/scarpe/mocassini/2';
                elementicatalogoBuilder($dir, "scarpascelta");  
            }else{
                if($_SESSION["sesso"] == 1){
                    $dir = '../img/scarpe/mocassini/1';
                    elementicatalogoBuilder($dir, "scarpascelta");
                }elseif($_SESSION["sesso"] == 2){
                    $dir = '../img/scarpe/mocassini/2';
                    elementicatalogoBuilder($dir, "scarpascelta");
                }else{
                    $dir = '../img/scarpe/mocassini/1';
                    elementicatalogoBuilder($dir, "scarpascelta");    
                    $dir = '../img/scarpe/mocassini/2';
                    elementicatalogoBuilder($dir, "scarpascelta");         
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