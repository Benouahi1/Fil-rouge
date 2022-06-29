let DD = document.querySelectorAll(".DD");

DD.forEach((element)=>{
element.onclick = function(){   
    let UPD = element.parentElement.querySelector(".UPD");
    if(UPD.style.display === "block"){
        UPD.style.display = "none";
    }else{
        UPD.style.display = "block";
    }
}

})