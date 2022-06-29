 

let lp = document.querySelectorAll(".lp");

lp.forEach((element) =>{
    let pn = element.parentElement.querySelector(".UP");
    element.onclick = function(){
        if(pn.style.display === "block"){
            pn.style.display = "none";
        }else{
            pn.style.display = "block";
        }
    }
})