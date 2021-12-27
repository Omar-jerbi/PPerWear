<header>
    <nav>
    <ul>
        <li class="r">
            <form action="/sawproject/ricerca.php" method="get">
                <input type="text" name="search" id="search" placeholder="Ricerca">
            </form>
        </li>
        <li class="h">
            <a href="/sawproject/_index.php">Home</a>
        </li>
        <li class="pl">
            <?php
                session_start();
                if(isset($_SESSION["login"])){
                    echo '<a href= "/sawproject/showprofile.php">Profilo</a>';
                }       
                else
                    echo '<a href="/sawproject/formlogin.php">Login</a>';
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
                        <li class="agg"><a href="/sawproject/updateprofile.php">Aggiorna Profilo</a></li>
                        <li class="str"><a href="/sawproject/db/storico.php">Storico Wears</a></li>                
                        <li class="out"><a href="/sawproject/php/Flogout.php">Logout</a></li>
                    ';
                }else{
                    echo '<li><a href="/sawproject/formregistration.php">Entra nel mondo PayPerWear!</a></li>';
                }
            ?>
        </ul>
    </div>  
    
    <div class="menu_navigazione">
        <ul>
            <li class="h1"><a href="/sawproject/novita.php">Novità/Speciali</a></li>
            <li class="h2"><a href="/sawproject/navigazione/categorie.php">Naviga per categoria</a></li>
            <li class="h3"><a href="/sawproject/carrello.php?controllodata=si">Carrello</a></li>
            <!-- controllodata = si :  un ordine ogni 25 giorni-->
            <!-- controllodata = no :  no controllo data ultimo ordine-->
        </ul>
    </div>
</header>


