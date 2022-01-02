<header>
    <nav>
    <ul>
        <li class="r">
            <form action="https://saw21.dibris.unige.it/~S4540263/ricerca.php" method="get">
                <input type="text" name="search" id="search" placeholder="Ricerca">
            </form>
        </li>
        <li class="h">
            <a href="https://saw21.dibris.unige.it/~S4540263/_index.php">Home</a>
        </li>
        <li class="pl">
            <?php
                session_start();
                if(isset($_SESSION["login"])){
                    echo '<a href= "https://saw21.dibris.unige.it/~S4540263/showprofile.php">Profilo</a>';
                }       
                else
                    echo '<a href="https://saw21.dibris.unige.it/~S4540263/formlogin.php">Login</a>';
            ?>
        </li>
    </ul>
    </nav>

    <div class="titolo_principale">
        <h1>PayPerWear</h1>
    </div>

    <div class="menu_azioni">
        <ul>
            <?php
                if(isset($_SESSION["login"])){
                    echo'
                        <li class="agg"><a href="https://saw21.dibris.unige.it/~S4540263/updateprofile.php">Aggiorna Profilo</a></li>
                        <li class="str"><a href="https://saw21.dibris.unige.it/~S4540263/db/storico.php">Storico Wears</a></li>                
                        <li class="out"><a href="https://saw21.dibris.unige.it/~S4540263/php/Flogout.php">Logout</a></li>
                    ';
                }else{
                    echo '<li><a href="https://saw21.dibris.unige.it/~S4540263/formregistration.php">Entra nel mondo PayPerWear!</a></li>';
                }
            ?>
        </ul>
    </div>  
    
    <div class="menu_navigazione">
        <ul>
            <li class="h1"><a href="https://saw21.dibris.unige.it/~S4540263/novita.php">Novità/Speciali</a></li>
            <li class="h2"><a href="https://saw21.dibris.unige.it/~S4540263/navigazione/categorie.php">Naviga per categoria</a></li>
            <li class="h3"><a href="https://saw21.dibris.unige.it/~S4540263/carrello.php?controllodata=si">Carrello</a></li>
            <!-- controllodata = si :  un ordine ogni 25 giorni-->
            <!-- controllodata = no :  no controllo data ultimo ordine-->
        </ul>
    </div>
</header>


