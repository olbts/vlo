console.log("coucou c est article");
const prix = document.querySelector(".prix");
   const actuel = parseFloat(prix.innerHTML);
      const qte = document.querySelector("#qte");
      const joy = document.querySelector("#joy");
        qte.addEventListener("change",()=>{
          prix.innerHTML =  actuel * parseFloat(qte.value)
          joy.value = actuel * parseFloat(qte.value);
        })