<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Update Profile</title>
    <script src="js/validateupdate.js"></script>
</head>

<body>
    <?php
    error_reporting(E_ALL & ~E_NOTICE); //non visualizza warning della session_start() duplicata
    session_start();
    if (!isset($_SESSION["login"])) {
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
    <form action="php/Fupdate.php" method="POST" onsubmit="return validate()">
        <fieldset class="IN">
            <legend>Aggiorna i Tuoi Dati</legend>
            <div class="inputs">
                
                <div class="sesso">
                    Sesso:
                    Altro<input type="radio" name="sesso" id="sesso" value="0" checked>
                    --- Uomo<input type="radio" name="sesso" id="sesso" value="1">
                    --- Donna<input type="radio" name="sesso" id="sesso" value="2">
                </div>
                
                
                <div class="maglie">
                    Che misura di maglie porti?
                    <select name="misura_maglie" id="misura_maglie">
                        <option value="0">Scegli la misura</option>
                        <option value="1">S</option>
                        <option value="2">M</option>
                        <option value="3">L</option>
                        <option value="4">XL</option>
                    </select>
                </div>
                
                
                <div class="pantaloni">
                    Che misura di pantaloni porti?
                    <select name="misura_pantaloni" id="misura_pantaloni">
                        <option value="0">Scegli la misura</option>
                        <option value="-1"><30</option>
                        <?php
                                for($i = 31; $i<80; $i++){
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                                ?>
                            <option value="1">>80</option>
                        </select>
                    </div>
                    
                    
                    <div class="scarpe">
                        Che misura di scarpe porti?
                        <select name="misura_scarpe" id="misura_scarpe">
                            <option value="0">Scegli la misura</option>
                            <option value="-1"><30</option>
                            <?php
                                for($i = 31; $i<50; $i++){
                                    echo "<option value=".$i.">".$i."</option>";
                                }
                                ?>
                            <option value="1">>50</option>
                        </select>
                    </div>
                    
                    
                    
                    <div class="telefono">
                        Il tuo numero di telefono:
                        <input type="tel" name="tel" id="tel" placeholder="Non c'è bisogno del prefisso">
                    </div>
                    
                    <div class="addr">
                        Il tuo indirizzo:
                        <input type="text" name="addr1" id="addr1" placeholder="Città/Provincia" size = "15">
                        <input type="text" name="addr2" id="addr2" placeholder="CAP" size = "6">
                        <input type="text" name="addr3" id="addr3" placeholder="Via/Numero Civico" size = "25">
                    </div>
                    
                    <div class="pagamento">
                        Metodo di pagamento:
                        <select name="#" id="#" disabled="disabled">
                            <option value="#">UNDER CONSTRUCTION</option>
                        </select>
                    </div>
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