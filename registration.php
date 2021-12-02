<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Registration</title>
    <script src="/sawproject/js/validateform.js"></script>
</head>
<body>
    <?php
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
        <form action="/sawproject/php/Fregistration.php" method="post" onsubmit="return validateForm()">
            <fieldset class="IN">
                <legend>Nome e Cognome</legend>
                
                <div class="names">
                    <input type="text" id="firstname" name="firstname" placeholder="Nome">
                    
                    <input type="text" id="lastname" name="lastname" placeholder="Cognome">
                </div>
                
                <!-- <img src="img/user_default.png" alt="" class="logos"> -->
            </fieldset>
            
            <fieldset class="IN">
                <legend>E-mail e Password</legend>
                <div class="pwmail">
                    <input type="email" id="email" name="email" placeholder="E-mail">
                        
                    <input type="password" id="pass" name="pass" placeholder="Password">
                        
                    <input type="password" id="confirm" name="confirm" placeholder="Conferma Password">
                </div>  
                
                <!-- <img src="img/pngegg.png" alt="" class="logos"> -->

                <input class="submit" type="submit" value="Registrati!">
            </fieldset> 
        </form>
    </div>

    <?php
        include("common/footer.php");
    ?>
</body>
</html>