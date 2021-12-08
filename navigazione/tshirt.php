<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -T-shirt</title>
    <script src="../js/addcategoriecat.js"></script>
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
    <form action="#" method="post">
        <ul>
        <?php
            if(!isset($_SESSION["sesso"])){
                $dir = '../img/maglie/tshirt/1';
                elementicatalogoBuilder($dir);    
                $dir = '../img/maglie/tshirt/2';
                elementicatalogoBuilder($dir);  
            }else{
                if($_SESSION["sesso"] == 1){
                    $dir = '../img/maglie/tshirt/1';
                    elementicatalogoBuilder($dir);
                }elseif($_SESSION["sesso"] == 2){
                    $dir = '../img/maglie/tshirt/2';
                    elementicatalogoBuilder($dir);
                }else{
                    $dir = '../img/maglie/tshirt/1';
                    elementicatalogoBuilder($dir);    
                    $dir = '../img/maglie/tshirt/2';
                    elementicatalogoBuilder($dir);         
                }
            }
         
        ?>
        </ul>
    </form>
    
</div>


    <?php
        include("../common/footer.php");
    ?>   
</body>
</html>