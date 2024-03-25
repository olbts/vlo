
<form method="get" action="index.php" class="tri hmm mb-5 " >
  
  <h5 class="my-3">Ordre</h5>
  <select name="order" id="" class="inputList" >
    <option value=<?php echo $order == "ASC" ?  "ASC" : "DESC"; ?>><?php echo $order == "ASC" ?  "prix croissant" : "prix decroissant"; ?></option>
    <option value=<?php echo $order == "ASC" ?  "DESC" : "ASC"; ?>><?php echo $order == "ASC" ?  "prix decroissant" : "prix croissant"; ?></option>
    
  </select>
  <h5 class="my-3">Styles</h5>
  
  <ul class="list-group "> 
    <li class="list-group-item"><label for="enfant">enfant</label><input <?=checked($style,"enfant")?> class="mx-4 inputList" type="checkbox" name="style[]" value="enfant" id="enfant"></li>
    <li class="list-group-item"><label for="policier">policier</label><input <?=checked($style,"policier")?> class="mx-4 inputList" type="checkbox" name="style[]" value="policier" id="policier"></li>
    <li class="list-group-item"><label for="fiction">fiction</label><input <?=checked($style,"fiction")?> class="mx-4 inputList" type="checkbox" name="style[]" value="fiction" id="fiction"></li>
    <li class="list-group-item"><label for="documentaire">documentaire</label><input <?=checked($style,"documentaire")?> class="mx-2 inputList" type="checkbox" name="style[]" value="documentaire" id="documentaire"></li>
    <li class="list-group-item"><label for="poche">livre de poche</label><input <?=checked($style,"poche")?> class="mx-2 inputList" type="checkbox" name="style[]" value="poche" id="poche"></li>
    <li class="list-group-item"><label for="scientifique">scientifique</label><input <?=checked($style,"scientifique")?> class="mx-4 inputList" type="checkbox" name="style[]" value="scientifique" id="scientifique"></li>
  </ul>
  <h5 class="my-3">Prix</h5>
  
  <div class="div">
  <input type="range" min='<?=$min?>' max='<?=$max?>'  class="form-range inputList" id="min" name="prixmin" <?= "value = ".$prixmin?>>
  
    <span id="displayMin"><?=$prixmin?></span>
  </div>
  
  <div class="div">
  <input type="range" min='<?=$min?>' max='<?=$max?>' class="form-range inputList" id="max" name="prixmax" <?="value = ".$prixmax?>>
  <span id="displayMax"><?=$prixmax?></span>
  
  </div>
  
  
  
  </form>
<!-- 

<script>
  
   const min = document.querySelector("#min");
   const max = document.querySelector("#max");
   const displayMin = document.querySelector("#displayMin");
   const displayMax = document.querySelector("#displayMax");
   const inputList = document.querySelectorAll(".inputList");
   const tri = document.querySelector(".tri");
   console.log(inputList);
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

</script> -->


  
  