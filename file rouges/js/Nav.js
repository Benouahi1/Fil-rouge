let Menu = document.getElementById("Menu");
let Nav = document.getElementById("Nav");
let Menu1 = document.getElementById("Menu1");
let m = document.getElementById("m");




Menu.onclick = function(){
    Menu.style.display = "none";
    Menu1.style.display = "block";
    m.style.display = "block";
}
Menu1.onclick = function(){
    Menu1.style.display = "none";
    Menu.style.display = "block";
    m.style.display = "none";
}
