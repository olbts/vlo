console.log("coucou c est index");
const min = document.querySelector("#min");
const max = document.querySelector("#max");
const displayMin = document.querySelector("#displayMin");
const displayMax = document.querySelector("#displayMax");
const inputList = document.querySelectorAll(".inputList");
const tri = document.querySelector(".tri");
min.addEventListener("change",()=>{
 displayMin.innerHTML = min.value;
 max.min = min.value;
 
})
max.addEventListener("change",()=>{
 displayMax.innerHTML = max.value;
 min.max = max.value;

})
   
inputList.forEach(element => {
element.addEventListener("change",()=>{
 tri.submit();
})
});