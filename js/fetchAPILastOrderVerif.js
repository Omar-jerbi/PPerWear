function checkLastOrder(){
    fetch("https://saw21.dibris.unige.it/~S4540263/php/fetchAPILastOrderVerif.php", {
        method: "post",
        headers: { "Content-type": "application/x-www-form-urlencoded" },
        }).then(
            function(response){
                if(response.status != 200){
                    console.log("errore");
                    return;
                }
                return response.text();
            }
        ).then(
            function(result){
                if(result=='OK'){
                    document.getElementById("OK").innerHTML = 'Conferma!';
                }else{
                    document.getElementById("OK").innerHTML = 'Puoi fare solamente un ordine al mese!';
                    document.getElementById("OK").href = '#';
                }
            }
        )
 }