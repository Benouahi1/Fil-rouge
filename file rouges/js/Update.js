let UD = document.querySelectorAll(".UD");

UD.forEach((element) =>{
    let UP = element.parentElement.querySelector(".Update1");
    element.onclick = function(){
        if(UP.style.display === "block"){
            UP.style.display = "none";
        }else{
            UP.style.display = "block";
        }
    }
})