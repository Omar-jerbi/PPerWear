function validateForm3(){
    var mm = document.getElementById("misura_maglie").value;
    var ms = document.getElementById("misura_scarpe").value;
    var mp = document.getElementById("misura_pantaloni").value;
    var tel = document.getElementById("tel").value;
    var addr = document.getElementById("addr").value;

        
    if(parseInt(mm) == 0 || parseInt(ms) == 0 || parseInt(mp) == 0 || tel == '' || addr == ''){
        alert("Dati mancanti!");
        return false;
    }
    
    if(isNaN(tel)){
        alert("Numero di telefono non valido!");
        return false;
    }


    var arr = addr.split('/');

    if(arr.length != 5){
        alert("Indirizzo non completo!\nL'indirizzo deve avere il formato: città/provincia/cap/via/numero_civico");
        document.getElementById("addr").value = document.getElementById("addr").ariaPlaceholder;
        return false;
    }

    if(isNaN(arr[2])){
        alert("CAP errato!");
        return false;
    }    


    var s = '';
    for (let index = 0; index < 5; index++) {
        s = s + arr[index].trim();
        if(index != 4) s = s +'/';
    }
    document.getElementById("addr").value = s;

}
