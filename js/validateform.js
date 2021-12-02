function validateForm() {
    if (document.getElementById("firstname").value == "" ||  document.getElementById("lastname").value == ""
    || document.getElementById("pass").value == "" ||document.getElementById("confirm").value == ""
    || document.getElementById("email").value == "") {
        alert("Dati Mancanti");
        return false;
    }

    if(document.getElementById("pass").value != document.getElementById("confirm").value){
        alert("Password Errata");
        return false;
    }


    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(document.getElementById("email").value))
    {
        alert("Formato Email Errato")
        return (false)
    }


  }
