<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Login</title>
    <script src="/sawproject/js/validateform2.js"></script>
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
            header("refresh:0; url= _index.php");
            exit;
        }

        include("common/header.php");       
    ?>



    <div class="maincontent">
        <form action="php/Flogin.php" method="POST" onsubmit="return validateForm2()">
            <fieldset class="IN">
                <legend>Login</legend>
                <div class="pwmail">
                    <input type="email" id="email" name="email" placeholder="E-mail">
                        
                    <input type="password" id="pass" name="pass" placeholder="Password">
                </div>  

                <input class="submit" type="submit" value="Accedi">
            </fieldset>
            
            
        </form>

    </div>

    <?php
        include("common/footer.php");
    ?>
</body>
</html>
