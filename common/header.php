<header>
    <nav>
    <ul>
        <li>
            <form action="" method="get">
                <input type="text" name="search" id="search" value="Ricerca">
            </form>
        </li>
        <li>
            <a href="/sawproject/_index.php">Home</a>
        </li>
        <li>
            <?php
                session_start();
                    //$_SESSION["login"] = true;
                if(isset($_SESSION["login"])){
                    echo '<a href= "/sawproject/profile.php">Profilo</a>';
                }       
                else
                    echo '<a href="/sawproject/login.php">Login</a>';
            ?>
        </li>
    </ul>
    </nav>

    <div class="titolo_pricipale">
        <h1>PayPerWear</h1>
    </div>

    <div class="menu_azioni">
        <ul>
            <?php
                if(isset($_SESSION["login"])){
                    echo'
                        <li><a href="/sawproject/updateprofile.php">Aggiorna il tuo Profilo</a></li>
                        <li><a href="/sawproject/db/storico.php">Storico Wears</a></li>                
                        <li><a href="/sawproject/php/Flogout.php">Logout</a></li>
                    ';
                }else{
                    echo '<li><a href="/sawproject/registration.php">Entra nel mondo PayPerWear!</a></li>';
                }
            ?>
        </ul>
    </div>  
    
    <div class="menu_navigazione">
        <ul>
            <li><a href="/sawproject/novita.php">Novità</a></li>
            <li><a href="/sawproject/wearsdelmese.php">Wears del mese</a></li>
            <li><a href="/sawproject/carrello.php">Carrello</a></li>
        </ul>
    </div>
</header>


