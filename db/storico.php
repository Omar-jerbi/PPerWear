<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Storico</title>
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
        
        include("../common/header.php");
    ?>

    <div class="maincontent">
        <?php
            if(!isset($_SESSION["idutente"])){
                echo "Aggiorna il tuo profilo per iniziare ad usufruire di tutti i servizi PayPerWear!";
                include("../common/footer.php");
                exit;
            }
        ?>
        <ul class="ordini">
            <?php
                include("connection.php");
                $idutente = $_SESSION["idutente"];

                $stmt = mysqli_prepare($connection, "SELECT `idordine`, `data` FROM `ordiniutenti` WHERE `idutente` = ?");
                mysqli_stmt_bind_param($stmt, 'i', $idutente);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                
                while(1){
                    $arrordinidate = mysqli_fetch_array($res);//controlla che non sia null
                    if(!$arrordinidate) break;

                    //cicla su [0] == numordine -> fai una select su urdini con quel numero ordine e 
                    //estrai la stringa relativa agli articoli dell'ordine
                    //splittala e fai img src con ogni pezzo della string
                }

                //echo $arrordinidate[0]."<br>";
                //echo $arrordinidate[1];
            ?>
        </ul>


    </div>

    <?php
        include("../common/footer.php");
    ?>
</body>
</html>