<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Update Profile</title>
    <script src="js/validateform3.js"></script>
</head>
<body>
    <?php
        error_reporting(E_ALL & ~E_NOTICE);//non visualizza warning della session_start() duplicata
        session_start();
        if(!isset($_SESSION["login"])){
            echo '
            <script>
                alert("PRIMA DEVI FARE IL LOGIN");
            </script>';
            header("refresh:0; url= /sawproject/_index.php");
            exit;
        }
        
        include("common/header.php");
        
    ?>
 
    <div class="maincontent">
        <form action="php/Fupdate.php" method="POST" onsubmit="return validateForm3()">
            <fieldset class="IN">
                <legend>Aggiorna i Tuoi Dati</legend>
                <div class="pwmail">
                    <input type="text" id="misura_maglie" name="misura_maglie" placeholder="Che misura di maglie porti?">
                    <input type="text" id="misura_pantaloni" name="misura_pantaloni" placeholder="Che misura di pantaloni porti?">
                    <input type="text" id="misura_scarpe" name="misura_scarpe" placeholder="Che misura di scarpe porti?">
                    Sei:
                    Uomo<input type="radio" name="sesso" id="sesso" value="1">
                    Donna<input type="radio" name="sesso" id="sesso" value="2">
                    Altro<input type="radio" name="sesso" id="sesso" value="0">

                </div>  

                <input class="submit" type="submit" value="Modifica!">
            </fieldset>
            
            
        </form>
    </div>

    <?php
        include("common/footer.php");
    ?>
</body>
</html>