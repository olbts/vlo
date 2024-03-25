console.log("coucou c est display")
const allQteForm = document.querySelectorAll(".allQteForm");
                          const allQte = document.querySelectorAll(".allQte");
                          
                          allQteForm.forEach(e=>{
                            e.addEventListener("submit",()=>{
                              e.preventDefault();
                            })
                          })
                          
                          allQte.forEach(e => {
                            e.addEventListener("change",()=>{
                              
                              if(e.value < 6 && e.value > 0 )
                                e.parentElement.submit();
                              
                            })
                          });