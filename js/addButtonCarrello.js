let m = document.getElementById("maglia");
let p = document.getElementById("pantalone");
let s = document.getElementById("scarpa");

addButton(m);
addButton(p);
addButton(s);

function addButton(elem){
    if(elem != null){
        let b = document.createElement("input");
        b.id = 'b'+elem.id;
        b.type = 'button';
        b.value = 'Elimina Articolo';

        elem.append(b);
        
        b.addEventListener("click", () =>{
            switch (elem.id) {
                case 'maglia':
                    document.cookie = "misuramaglia=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    document.cookie = "magliascelta=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    
                    break;
                case 'pantalone':
                    document.cookie = "misurapantaloni=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    document.cookie = "pantalonescelto=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    break;
                case 'scarpa':
                    document.cookie = "misurascarpe=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    document.cookie = "scarpascelta=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                    break;
                }

                let x = document.cookie.split('=');

                if(x[2] == 'pieno'){
                    document.cookie = "carrello=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }


            location.reload();
        });
    }
}