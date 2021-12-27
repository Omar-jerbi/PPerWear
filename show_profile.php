<?php
error_reporting(E_ALL & ~E_NOTICE);//non visualizza warning della session_start() duplicata
session_start();

echo'
<div class="email">
Email: <h2>'.$_SESSION["email"].'</h2>
</div>

<div class="name">    
    Nome: <h2>'.$_SESSION["firstname"].'</h2>  
    </div>
    
    <div class="lastname">
    Cognome: <h2>'.$_SESSION["lastname"].'</h2>
    </div>
    
';    
    
?>