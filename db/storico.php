<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Storico</title>
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/header.css">
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

                $stmt = mysqli_prepare($connection, "SELECT `idordine`, `data`, `articolo`, `taglia` FROM `ordiniutenti` NATURAL JOIN `ordini` WHERE `idutente` = ?");
                mysqli_stmt_bind_param($stmt, 'i', $idutente);
                mysqli_stmt_execute($stmt);
                $res = mysqli_stmt_get_result($stmt);
                
                $prevIdordine="";
                $i = 0;
                
                while(1){
                    $arr = mysqli_fetch_array($res);    
                    if(!$arr){
                        if($i == 0){
                            echo "<h1>Non hai ancora fatto nessun ordine</h1>";
                        }
                        break;
                    }
                    $i++;
                    
                    if($arr[0] != $prevIdordine){//idordine e data -> stamparli una volta per ordine
                        $prevIdordine = $arr[0];

                        if($i != 0) echo '</li>';//nuovo ordine (chiudo li precedente)(non primo ordine)

                        echo '
                        <li>
                            <h1>ID ORDINE: '.$arr[0].'</h1>
                            <h1>DATA ORDINE: '.$arr[1].'</h1>

                            <img src=../'.$arr[2].' alt="a1">
                            <h3>'.($arr[3] == "1" ? "S" : ($arr[3] == "2" ? "M" : ($arr[3] == "3" ? "L" : ($arr[3] == "4" ? "XL" : $arr[3])))).'</h3>
                        ';

                    }else{
                        echo '
                            <img src=../'.$arr[2].' alt="a1">
                            <h3>'.($arr[3] == "1" ? "S" : ($arr[3] == "2" ? "M" : ($arr[3] == "3" ? "L" : ($arr[3] == "4" ? "XL" : $arr[3])))).'</h3>
                        ';
                    }
                }
            ?>
        </ul>

    </div>

    <?php
        include("../common/footer.php");
    ?>
</body>
</html>