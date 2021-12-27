<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Registration</title>
    <script src="js/validateformregistration.js"></script>
    <script src="js/fetchAPImailverif.js"></script>
</head>
<body>
    <?php
        error_reporting(E_ALL & ~E_NOTICE);//non visualizza warning della session_start() duplicata
        session_start();
        if(isset($_SESSION["login"])){
            echo '
            <script>
            alert("SEI GIà LOGGATO");
            </script>';
            header("refresh:0; url= /sawproject/_index.php");
            exit;
        }
        
        include("common/header.php");
    ?>


    <div class="maincontent">
        <form action="php\Fregistration.php" method="post" onsubmit="return validateForm()">
            <fieldset class="IN">
                <legend>Nome e Cognome</legend>
                
                <div class="names">
                    <input type="text" id="firstname" name="firstname" placeholder="Nome" required pattern="[A-Z a-zè'òéàù]{1,30}">
                    
                    <input type="text" id="lastname" name="lastname" placeholder="Cognome" required pattern="[A-Z a-zè'òéàù]{1,30}">
                </div>
                
                
            </fieldset>
            
            <fieldset class="IN">
                <legend>E-mail e Password</legend>
                <div class="pwmail">
                    <input type="email" id="email" name="email" placeholder="E-mail" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$" onchange="return mailVerif()">
                        
                    <input type="password" id="pass" name="pass" placeholder="Password" required>
                        
                    <input type="password" id="confirm" name="confirm" placeholder="Conferma Password" required>
                </div>  
                
             

                <input id="submit" name="submit" class="submit" type="submit" value="Registrati!">
            </fieldset> 
        </form>
    </div> 

    <?php
        include("common/footer.php");
    ?>
</body>
</html>