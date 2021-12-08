function validateSpecialSelection(){
    var scarpeRadio = document.getElementsByName("scarpascelta") ;
    for(let i = 0; i<scarpeRadio.length; i++){
        if(scarpeRadio[i].checked){

            var misuraScarpascelta = document.getElementById(scarpascelta[i].value).value;
        }
    }


    var maglieRadio = document.getElementsByName("magliascelta") ;
    for(let i = 0; i<maglieRadio.length; i++){
        if(maglieRadio[i].checked){

            var misuraMagliascelta = document.getElementById(magliascelta[i].value).value;
        }
    }

    var pantaloniRadio = document.getElementsByName("pantalonescelto") ;
    for(let i = 0; i<pantaloniRadio.length; i++){
        if(pantaloniRadio[i].checked){

            var misuraPantalonescelto = document.getElementById(pantalonescelto[i].value).value;
        }
    }


    if(misuraScarpascelta == "0" ||misuraPantalonescelto == "0" || misuraMagliascelta == "0"){
        alert("Assicurati di avere scelto la misura!");
        return false;
    }

}