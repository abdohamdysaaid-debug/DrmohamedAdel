import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function toggleNotifications(){

let box = document.getElementById("notifDropdown")

box.style.display =
box.style.display === "block" ? "none" : "block"

}

function loadNotifications(){

let lastCount = 0;

function loadNotifications(){

fetch('/get-notifications')

.then(res=>res.json())

.then(data=>{

let list = document.getElementById("notifList")
let count = document.getElementById("notifCount")

list.innerHTML = ""

count.innerText = data.length

if(data.length > lastCount){

document.getElementById("notifSound").play()

}

lastCount = data.length

data.forEach(n=>{

list.innerHTML += `
<div class="notif-item">
<strong>${n.title}</strong>
<p>${n.message}</p>
</div>
`

})

})

}
}

setInterval(loadNotifications,10000)

loadNotifications()