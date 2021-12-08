<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Storico</title>
</head>


<style>
    img{
        width: 200px;
        height: 200px;
    }
</style>


<body>
    <?php
        error_reporting(E_ALL & ~E_NOTICE);//non visualizza warning della session_start() duplicata
        session_start();
        if(!isset($_SESSION["login"])){
            echo '
            <script>
            alert("PRIMA DEVI FARE IL LOGIN");
            </script>';
            header("refresh:0; url= ../_index.php");
            exit;
        }
        
        include("../common/header.php");
    ?>

    <div class="maincontent">
        <?php
            if(!isset($_SESSION["idutente"])){
                echo "<h1>Aggiorna il tuo profilo per iniziare ad usufruire di tutti i servizi PayPerWear!</h1>";
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
                
                $i = 0;
                while(1){
                    $arrordinidate = mysqli_fetch_array($res);
                    if(!$arrordinidate) {
                        if($i == 0){
                            echo "<h1>Non hai ancora fatto nessun ordine</h1>";
                        }
                        break;
                    }
                    $i++;

                    $stmt2 = mysqli_prepare($connection, "SELECT `articoli`, `taglie` FROM `ordini` WHERE `idordine` = ?");
                    mysqli_stmt_bind_param($stmt2, 'i', $arrordinidate[0]);
                    mysqli_stmt_execute($stmt2);
                    $resart = mysqli_stmt_get_result($stmt2);
                    
                    $articoli = mysqli_fetch_array($resart);

                    $arrayarticoli = explode('|', $articoli[0]);
                    $arraytaglie = explode('|', $articoli[1]);

                    echo '
                    <li>
                        <h1>DATA ORDINE: '.$arrordinidate[1].'</h1>
                        <img src=../'.$arrayarticoli[0].' alt="a1">
                        <img src=../'.$arrayarticoli[1].' alt="a2">
                        <img src=../'.$arrayarticoli[2].' alt="a3">
                        <h3>'.
                            ($arraytaglie[0] == "1" ?  "S" : ($arraytaglie[0] == "2" ?  "M" : ($arraytaglie[0] == "3" ?  "L" :  "XL")))
                        .'</h3>
                        <h3>'.$arraytaglie[1].'</h3>
                        <h3>'.$arraytaglie[2].'</h3>
                    </li>'
                    ;
                }

            ?>
        </ul>



    </div>

    <?php
        include("../common/footer.php");
    ?>
</body>
</html>