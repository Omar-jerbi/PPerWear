<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -T-shirt</title>
    <script src="../js/validateSelezioneMaglia.js"></script>
</head>


<style>
    img{
        height: 500px;
        width: 400px;
    }
</style>

<body>
    <?php
        include("../common/header.php");
        include("../php/FvarieAux.php");
    ?>

<div class="maincontent">
    <form action="#" method="post" onsubmit="return validateSelezioneMaglia()">
        <ul>
        <?php
            if(!isset($_SESSION["sesso"])){
                $dir = '../img/maglie/tshirt/1';
                elementicatalogoBuilder($dir, "magliascelta");    
                $dir = '../img/maglie/tshirt/2';
                elementicatalogoBuilder($dir, "magliascelta");  
            }else{
                if($_SESSION["sesso"] == 1){
                    $dir = '../img/maglie/tshirt/1';
                    elementicatalogoBuilder($dir, "magliascelta");
                }elseif($_SESSION["sesso"] == 2){
                    $dir = '../img/maglie/tshirt/2';
                    elementicatalogoBuilder($dir, "magliascelta");
                }else{
                    $dir = '../img/maglie/tshirt/1';
                    elementicatalogoBuilder($dir, "magliascelta");    
                    $dir = '../img/maglie/tshirt/2';
                    elementicatalogoBuilder($dir, "magliascelta");         
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