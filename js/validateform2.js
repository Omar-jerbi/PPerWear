function validateForm2(){
    if (document.getElementById("pass").value == "" || document.getElementById("email").value == "") {
        alert("Dati Mancanti");
        return false;
    }


    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))
    {
        alert("Formato Email Errato")
        return (false)
    }    

}