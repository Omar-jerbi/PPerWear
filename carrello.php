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

            if(isset($_COOKIE["magliascelta"])){
                echo'
                <div id="maglia">
                <h2>La maglia che riceverai questo mese:</h2>
                <img src='.$_COOKIE["magliascelta"].' alt="">
                <h3>Taglia:  
                '.($_COOKIE['misuramaglia'] == "1" ? "S" : ($_COOKIE['misuramaglia'] == "2" ? "M" : ($_COOKIE['misuramaglia'] == "3" ? "L" : ($_COOKIE['misuramaglia'] == "4" ? "XL" : "NO MISURA")))).'
                </h3>
                </div>
                ';
            }

            if(isset($_COOKIE['pantalonescelto'])){
                echo'
                <div id="pantalone">
                <h2>I pantaloni che riceverai questo mese:</h2>
                <img src='.$_COOKIE["pantalonescelto"].' alt="">
                <h3>Taglia: '.($_COOKIE["misurapantaloni"] == "0" ? "NO MISURA" : $_COOKIE["misurapantaloni"]).'</h3>
                </div>
                ';
            }

            if(isset($_COOKIE["scarpascelta"])){
                echo'
                <div id="scarpa">
                <h2>Le scarpe che riceverai questo mese:</h2>
                <img src='.$_COOKIE['scarpascelta'].' alt="">
                <h3>Taglia: '.($_COOKIE["misurascarpe"] == "0" ? "NO MISURA" : $_COOKIE["misurascarpe"]).'</h3>
                </div>
                ';
            }

            if(isset($_SESSION["login"])){
                if(isset($_SESSION["misura_pantaloni"])){//misura_pantaloni (della sessione (legato a utente)) solo per verif che utente loggato con tutte le info
                    if(isset($_COOKIE["misurascarpe"])&&$_COOKIE["misurascarpe"] == "0" ||isset($_COOKIE["misuramaglia"])&&$_COOKIE['misuramaglia'] == "0" ||isset($_COOKIE["misurapantaloni"])&&$_COOKIE["misurapantaloni"] == "0"){
                        echo"<h3>Assicurati di aver inserito la misura per ogni articolo selezionato</h3>";    
                    }else{
                        echo'<a href="conferma.php">Conferma!</a>';  //OK!
                    }
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

addButton(m);
addButton(p);
addButton(s);

function addButton(elem){
    if(elem != null){
        let b = document.createElement("input");
        b.id = 'b'+elem.id;
        b.type = 'button';
        b.value = 'Elimina Articolo';

        elem.append(b);
        
        b.addEventListener("click", () =>{
            switch (elem.id) {
                case 'maglia':
                    document.cookie = "misuramaglia=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    document.cookie = "magliascelta=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    
                    break;
                case 'pantalone':
                    document.cookie = "misurapantaloni=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    document.cookie = "pantalonescelto=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    break;
                case 'scarpa':
                    document.cookie = "misurascarpe=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    document.cookie = "scarpascelta=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    break;
                }

                let x = document.cookie.split('=');

                if(x[2] == 'pieno'){
                    document.cookie = "carrello=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }


            location.reload();
        });
    }
}
</script>

