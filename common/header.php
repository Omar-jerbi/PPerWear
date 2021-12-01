<header>
    <nav>
    <ul>
        <li>
            <form action="" method="get">
                <input type="text" name="search" id="search" value="Ricerca">
            </form>
        </li>
        <li>
            <?php
                session_start();
                    //$_SESSION["login"] = true;
                if(isset($_SESSION["login"])){
                    echo '<a href="profile.php">Profilo</a>';
                }       
                else
                    echo '<a href="login.php">Login</a>';
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
                        <li><a href="updateprofile.php">Aggiorna il tuo Profilo</a></li>
                        <li><a href="db/storico.php">Storico Wears</a></li>                
                        <li><a href="php/Flogout.php">Logout</a></li>
                    ';
                }else{
                    echo '<li><a href="registration.php">Entra nel mondo PayPerWear!</a></li>';
                }
            ?>
        </ul>
    </div>  
    
    <div class="menu_navigazione">
        <ul>
            <li><a href="novita.php">Novità</a></li>
            <li><a href="wearsdelmese.php">Wears del mese</a></li>
            <li><a href="carrello.php">Carrello</a></li>
        </ul>
    </div>
</header>


