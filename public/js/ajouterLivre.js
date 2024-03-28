const nbAuteur = document.querySelector("#nbAuteur");
    nbAuteur.value = 1
    const inputAuteur = document.querySelector("#inputAuteur");
    const originalText = inputAuteur.innerHTML;
    inputAuteur.innerHTML = "Auteur : " + originalText
    nbAuteur.addEventListener("change",()=>{
        const nb = nbAuteur.value;
        inputAuteur.innerHTML =""
        if (nb > 1) {
            for (let i = 0; i < nb; i++) {
            inputAuteur.innerHTML = inputAuteur.innerHTML + "Auteur "+(i +1)+":"+ originalText +"<br>"
            }
        }else {
            inputAuteur.innerHTML = "Auteur : " + originalText
        }
    })