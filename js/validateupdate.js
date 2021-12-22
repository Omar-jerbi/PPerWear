function validate(x){
    
    var mm = document.getElementById("misura_maglie").value;
    var ms = document.getElementById("misura_scarpe").value;
    var mp = document.getElementById("misura_pantaloni").value;
    var tel = document.getElementById("tel").value;
    var addr1 = document.getElementById("addr1").value;
    var addr2 = document.getElementById("addr2").value;
    var addr3 = document.getElementById("addr3").value;

        
    if(parseInt(mm) == 0 || parseInt(ms) == 0 || parseInt(mp) == 0 || tel == '' || addr1 == ''|| addr2 == ''|| addr3 == ''){
        alert("Dati mancanti!");
        return false;
    }
    
    if(isNaN(tel)){
        alert("Numero di telefono non valido!");
        return false;
    }

    if(isNaN(addr2)){
        alert("CAP non valido!");
        return false;
    }

    var arr1 = addr1.split('/');

    if(arr1.length != 2){
        alert("Città e provincia devono essere esparate dal carattere /");
        document.getElementById("addr1").value = document.getElementById("addr1").ariaPlaceholder;
        return false;
    }

    var arr3 = addr3.split('/');
 
    if(arr3.length != 2){
        alert("Via e Numero Civico devono essere esparate dal carattere /");
        document.getElementById("addr3").value = document.getElementById("addr3").ariaPlaceholder;
        return false;
    }

    // var s = '';
    // for (let index = 0; index < 5; index++) {
    //     s = s + arr[index].trim();
    //     if(index != 4) s = s +'/';
    // }
    // document.getElementById("addr").value = s;
   
}