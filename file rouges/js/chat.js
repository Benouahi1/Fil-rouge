const form = document.querySelector(".typing-area")
incoming_id = form.querySelector(".incoming").value
inputField = form.querySelector(".input-field")
sendBtn = form.querySelector("button")
const chatBox = document.querySelector(".allmessages")


console.log(incoming_id)

form.onsubmit = (e) => {
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = () => {
    if (inputField.value != "") {
        sendBtn.classList.add("active");
    } else {
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = async () => {
    let formData = new FormData(form);
    const res = await fetch("../controller/Chat.controller.php",
        {
            method: "post",
            body: formData
        }
    ).then(res => {
        if (res.ok) return res.json();
        else console.error("Error: ");
    });
    chatBox.innerHTML = "";
    res.forEach(e => {
        if (e.outgoing == incoming_id) {
            const div = document.createElement("div")
            div.setAttribute("class", "message4");
            div.innerHTML = `<p class="message3">${e.messages}</p>`
            chatBox.append(div);
        }
        else {
            const div = document.createElement("div")
            div.setAttribute("class", "message2");
            div.innerHTML = `<p class="message1">${e.messages}</p>`
            chatBox.append(div);
        }
    })
    ;
    inputField.value = "";

}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../controller/getMessages.controller.php?id="+incoming_id, true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send();
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
