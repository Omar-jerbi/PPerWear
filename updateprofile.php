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
                            <option value="0">Scegli il range di misure</option>
                            <option value="-1"><30</option>
                            <option value="3040">30-40</option>
                            <option value="4050">40-50</option>
                            <option value="5060">50-60</option>
                            <option value="6070">60-70</option>
                            <option value="7080">70-80</option>
                            <option value="1">>80</option>
                        </select>
                    </div>


                    <div class="scarpe">
                        Che misura di scarpe porti?
                        <select name="misura_scarpe" id="misura_scarpe">
                            <option value="0">Scegli il range di misure</option>
                            <option value="-1"><30</option>
                            <option value="3035">30-35</option>
                            <option value="3538">35-38</option>
                            <option value="3841">38-41</option>
                            <option value="41">41-43</option>
                            <option value="4346">43-46</option>
                            <option value="1">>46</option>
                        </select>
                    </div>



                    <div class="telefono">
                        Il tuo numero di telefono:
                        <input type="tel" name="tel" id="tel" placeholder="Non c'è bisogno del prefisso">
                    </div>

                    <div class="addr">
                        Il tuo indirizzo:
                        <input type="text" name="addr" id="addr" placeholder="città/provincia/cap/via/numero_civico" size = "28">
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