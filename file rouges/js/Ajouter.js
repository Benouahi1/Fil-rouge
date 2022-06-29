let Add = document.getElementById("Add");
let F = document.getElementById("Form");



Add.onclick = function(){
    if(F.style.display === "block"){
        F.style.display = "none";
    }else{
        F.style.display = "block";
    }
}

