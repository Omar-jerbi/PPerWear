<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Login</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/login.css">
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
        <form class="formlogin" action="php/Flogin.php" method="POST">
            <fieldset class="IN">
                <legend>Login</legend>
                <div class="pwmail">
                    <input type="email" id="email" name="email" placeholder="E-mail" required pattern="^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$">
                        
                    <input type="password" id="pass" name="pass" placeholder="Password" required>
                </div>  

                <input class="submit" name="submit" type="submit" value="Accedi">
            </fieldset>
            
            
        </form>

    </div>

    <?php
        include("common/footer.php");
    ?>
</body>
</html>
