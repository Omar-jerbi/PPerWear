<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PayPerWear -Ricerca Articoli</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<style>
    img{
        height: 500px;
        width: 400px;
    }
</style>



<body>
    <?php
        include("common/header.php");
        include("php/FvarieAux.php")
    ?>
    
    <div class="maincontent">
<form action="php/Fselezionearticoli.php" method="post">
    <?php
        if(!isset($_GET["search"])) {
            header("Location: _index.php");
            exit;
        }
        
        
        include("db/connection.php");
        
        $input = mysqli_real_escape_string($connection, htmlspecialchars($_GET["search"]));
        
        $input = '%'.$input.'%';
        
        $stmt = mysqli_prepare($connection, "SELECT * FROM articoli WHERE descrizione LIKE ?");
        mysqli_stmt_bind_param($stmt, 's', $input);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);
        
        while($arr = mysqli_fetch_array($res)){
            // $arr[0] : il path
            
            $tipo = explode('/', $arr[0])[1];
            $scelta;
            
            if($tipo == 'maglie'){
                $scelta = "magliascelta";
            }elseif($tipo == 'pantaloni'){
                $scelta = "pantalonescelto";
            }else{
                $scelta = "scarpascelta";
            }

            
            echo'<span>';
                echo '<img src='.$arr[0].' alt="x">';
                
                echo '<input type="radio" name='.$scelta.' id='.$scelta.' value='.$arr[0].'>';
                
                selectBuilder($scelta, 0,0,0,$arr[0]);
            echo '</span>';
    
        }
    ?>    

<input type="submit" value="Aggiungi articolo al carrello!">
</form>
    
</div>

    <?php
        include("common/footer.php");
    ?> 
</body>
</html>

