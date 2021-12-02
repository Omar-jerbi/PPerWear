function validateForm3(){
    var mm = document.getElementById("misura_maglie").value;
    var ms = document.getElementById("misura_scarpe").value;
    var mp = document.getElementById("misura_pantaloni").value;

    if(mm == "" || ms == "" || mp == ""){
        alert("Dati mancanti!");
        return false;
    }
    
    if(isNaN(mm) || isNaN(ms) || isNaN(mp)){
        alert("Misure non valide!");
        return false;
    }
}
