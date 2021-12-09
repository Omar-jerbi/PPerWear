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

        <?php 
        if(isset($_COOKIE["magliascelta"])){
            echo'
            <div id="maglia">
            <h2>La maglia che riceverai questo mese:</h2>
            <img src='.$_COOKIE["magliascelta"].' alt="">
            <h3>Taglia:  
            '.($_COOKIE['misuramaglia'] == "1" ? "S" : ($_COOKIE['misuramaglia'] == "2" ? "M" : ($_COOKIE['misuramaglia'] == "3" ? "L" : "XL"))).'
            </h3>
            </div>
            ';
        }
        ?>
        
        <?php 
        if(isset($_COOKIE['pantalonescelto'])){
            echo'
            <div id="pantalone">
            <h2>I pantaloni che riceverai questo mese:</h2>
            <img src='.$_COOKIE["pantalonescelto"].' alt="">
            <h3>Taglia: '.$_COOKIE["misurapantaloni"].'</h3>
            </div>
            ';
        }
        ?>

        <?php 
        if(isset($_COOKIE["scarpascelta"])){
            echo'
            <div id="scarpa">
            <h2>Le scarpe che riceverai questo mese:</h2>
            <img src='.$_COOKIE['scarpascelta'].' alt="">
            <h3>Taglia: '.$_COOKIE['misurascarpe'].'</h3>
            </div>
            ';
        }
        ?>

        <?php
            if(isset($_SESSION["login"])){
                if(isset($_SESSION["misura_pantaloni"])){//misura_pantaloni solo per verif che utente loggato con tutte le info
                    echo'<a href="conferma.php">Conferma!</a>';
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

<script>
let m = document.getElementById("maglia");
let p = document.getElementById("pantalone");
let s = document.getElementById("scarpa");

if(m!=null){
    let bm = document.createElement("input");
    bm.id='bm';
    bm.type = "button";
    bm.value = "ELIMINA";
    
    m.append(bm);
}
if(p!=null){
    let bp = document.createElement("input");
    bp.is='bp';
    bp.type = "button";
    bp.value = "ELIMINA";
    
    p.append(bp);
}
if(s!=null){
    let bs = document.createElement("input");
    bs.type = "button";
    bs.value = "ELIMINA";
    
    s.append(bs);
}

bm.addEventListener("click", () => alert("bella"));

</script>

