let LO = document.querySelectorAll(".LO");

LO.forEach((element) =>{
    let Su = element.parentElement.querySelector(".Su");
    element.onclick = function(){
        if(Su.style.display === "block"){
            Su.style.display = "none";
        }else{
            Su.style.display = "block";
        }
    }
})