<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="manifest" href="/build/manifest.json">
<meta name="theme-color" content="#38bdf8">
@vite(['resources/css/app.css','resources/js/app.js'])

<style>

/* الخلفية */

body{
background:linear-gradient(120deg,#f8fafc,#e2e8f0,#f1f5f9);
min-height:100vh;
transition:0.3s;
}

/* بلور عند فتح القائمة */

body.blur{
filter:blur(3px);
}

/* Overlay */

.overlay{

position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.35);
backdrop-filter:blur(4px);
opacity:0;
pointer-events:none;
transition:0.35s;
z-index:998;

}

.overlay.show{

opacity:1;
pointer-events:auto;

}

/* القائمة */

.sidebar{

width:270px;
height:100vh;
background:linear-gradient(180deg,#1e3a8a,#0f172a);
color:white;
padding:25px;

position:fixed;
top:0;
left:0;

transform:translateX(-100%);
transition:0.45s cubic-bezier(.68,-0.55,.27,1.55);

z-index:999;

box-shadow:0 0 40px rgba(0,0,0,0.4);

}

.sidebar.open{

transform:translateX(0);

}

/* عنوان القائمة */

.sidebar h4{

margin-bottom:30px;
font-weight:bold;
font-size:20px;
display:flex;
align-items:center;
gap:8px;

}

/* روابط القائمة */

.sidebar a{

display:flex;
align-items:center;
gap:12px;

padding:13px 15px;
margin-bottom:10px;

border-radius:12px;

color:white;
text-decoration:none;

font-size:15px;

transition:0.25s;

}

.sidebar a:hover{

background:rgba(255,255,255,0.15);
transform:translateX(-6px);

}

/* ايقونات */

.sidebar a i{

font-size:18px;




/* ===== مكانهم في أسفل القائمة ===== */
.sidebar-footer{
position:absolute;
bottom:80px; /* = حوالي 2cm */
left:50%;
transform:translateX(-50%);
width:80%;
text-align:center;
}

/* ===== أيقونات السوشيال ===== */
.social-icons{
display:flex;
justify-content:center;
gap:15px;
margin-bottom:12px;
}

/* شكل الأيقونة */
.social{
position:relative;
width:42px;
height:42px;
display:flex;
align-items:center;
justify-content:center;
border-radius:50%;
background:rgba(255,255,255,0.08);
color:white;
font-size:18px;
transition:0.3s;
}

/* Hover */
.social:hover{
transform:scale(1.2);
}

/* ألوان */
.social:nth-child(1):hover{ box-shadow:0 0 15px #1877f2; }
.social:nth-child(2):hover{ box-shadow:0 0 15px #ff0000; }
.social:nth-child(3):hover{ box-shadow:0 0 15px #0088cc; }

/* Tooltip */
.social::after{
content:attr(data-name);
position:absolute;
bottom:55px;
background:#0f172a;
color:white;
padding:4px 8px;
border-radius:6px;
font-size:12px;
opacity:0;
transition:0.3s;
}

.social:hover::after{
opacity:1;
}

/* ===== زرار تسجيل الخروج ===== */
.logout-btn{
width:100%;
background:linear-gradient(135deg,#ef4444,#dc2626);
border:none;
padding:12px;
border-radius:12px;
color:white;
font-weight:bold;
display:flex;
align-items:center;
justify-content:center;
gap:8px;
cursor:pointer;
transition:0.3s;
}

/* Hover */
.logout-btn:hover{
transform:scale(1.05);
box-shadow:0 0 20px rgba(239,68,68,0.6);
}
}
/* زر المنيو */

.menu-btn{

position:absolute;
top:25px;
left:15px;

background:#1e293b;
color:white;

border:none;

padding:10px 14px;
border-radius:8px;

font-size:18px;

cursor:pointer;

z-index:1000;

transition:0.25s;

}

.menu-btn:hover{

transform:scale(1.1);

}

/* الجرس */

.notify-wrapper{
position:absolute;
right:20px;
top:25px;
z-index:2000;
}

.notify-icon{
font-size:22px;
color:#38bdf8;
cursor:pointer;
position:relative;
}

.notify-icon i{
animation:glow 1.5s infinite alternate;
}

.notify-count{
position:absolute;
top:-6px;
right:-6px;
background:red;
color:white;
border-radius:50%;
padding:3px 7px;
font-size:11px;
}

.notify-dropdown{
position:absolute;
top:35px;
right:0;
width:300px;
background:#0f172a;
color:white;
border-radius:12px;
box-shadow:0 10px 30px rgba(0,0,0,0.4);
display:none;
overflow:hidden;
}

.notify-dropdown.active{
display:block;
animation:fadeIn 0.3s ease;
}

.notify-header{
padding:12px;
font-weight:bold;
border-bottom:1px solid rgba(255,255,255,0.1);
}

.notify-item{
padding:10px;
border-bottom:1px solid rgba(255,255,255,0.05);
cursor:pointer;
transition:0.2s;
}

.notify-item:hover{
background:rgba(255,255,255,0.1);
}

@keyframes glow{
0%{text-shadow:0 0 5px #38bdf8;}
100%{text-shadow:0 0 20px #38bdf8;}
}

@keyframes fadeIn{
from{opacity:0; transform:translateY(-10px);}
to{opacity:1; transform:translateY(0);}
}
/* اسم المنصة */

.logo{
position:absolute;
top:20px;
left:50%;
transform:translateX(-50%);
font-size:10px;
font-weight:bold;
letter-spacing:1px;

/* Gradient */
background:linear-gradient(90deg,#38bdf8,#22c55e);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;

/* Glow */
text-shadow:0 0 15px rgba(56,189,248,0.6);
}

/* Cursor زي الكتابة */
#typingText::after{
content:"|";
margin-left:5px;
animation:blink 1s infinite;
}

@keyframes blink{
0%{opacity:1;}
50%{opacity:0;}
100%{opacity:1;}
}

/* النص */

.logo-title .text{

background:linear-gradient(90deg,#38bdf8,#6366f1,#22c55e);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;

letter-spacing:1px;

text-shadow:0 0 10px rgba(56,189,248,0.4);

}

/* Animation */

@keyframes glow{

from{
transform:scale(1);
opacity:0.7;
}

to{
transform:scale(1.2);
opacity:1;
}

}




</style>

</head>


<body>

<button id="installBtn" style="
display:none;
position:fixed;
right:70px;
top:20px;
background:#38bdf8;
color:white;
border:none;
padding:6px 10px;
border-radius:8px;
font-size:12px;
cursor:pointer;
z-index:1000;
">
📲 تثبيت
</button>


<div id="overlay" class="overlay"></div>

<!-- Navbar -->

<nav class="navbar navbar-light bg-white shadow-sm px-4 position-relative">

<button id="menuBtn" class="menu-btn">
☰
</button>

<div class="notify-wrapper">

    <div class="notify-icon" onclick="toggleNotifications(event)">
        <i class="fa-solid fa-bolt"></i>
        <span class="notify-count" id="notifyCount">0</span>
    </div>

    <!-- Dropdown -->
    <div class="notify-dropdown" id="notifyDropdown">
        <div class="notify-header">الإشعارات</div>
        <div id="notifyList"></div>
    </div>

</div>

<!-- صوت -->
<audio id="notifySound">
    <source src="https://notificationsounds.com/storage/sounds/file-sounds-1150-pristine.mp3">
</audio>

</span>

</div>

<div class="logo">
    <span id="typingText"></span>
</div>
</span>

</div>

</nav>

<!-- القائمة -->

<div id="sidebar" class="sidebar">

<h4>🎓 منصة الطالب</h4>

<div style="margin-bottom:25px">

<div style="display:flex;align-items:center;gap:10px">

<div style="
width:40px;
height:40px;
border-radius:50%;
background:#38bdf8;
display:flex;
align-items:center;
justify-content:center;
font-weight:bold;
">

A

</div>

<div>

<div style="font-size:14px;font-weight:bold">
{{ Auth::user()->name ?? 'طالب' }}
</div>

<div style="font-size:12px;color:#cbd5f5">
Level 3
</div>

</div>

</div>

<div style="
margin-top:12px;
background:rgba(255,255,255,0.15);
height:6px;
border-radius:6px;
overflow:hidden;
">

<div style="
width:60%;
height:100%;
background:#22c55e;
border-radius:6px;
">

</div>

</div>

<div style="font-size:11px;margin-top:5px;color:#cbd5f5">
تقدم الدروس 60%
</div>

</div>

<a href="/lessons">
<i class="fa-solid fa-book-open"></i>
مشاهدة الدروس
</a>

<a href="/quizzes">
<i class="fa-solid fa-file-pen"></i>
امتحانات الكويزات
</a>

<a href="/results">
<i class="fa-solid fa-chart-column"></i>
نتائج الكويزات
</a>

<a href="/leaderboard">
<i class="fa-solid fa-trophy"></i>
ترتيبي
</a>

<a href="/subscription">
<i class="fa-solid fa-credit-card"></i>
اشتراكي
</a>

<a href="/profile">
<i class="fa-solid fa-user"></i>
البروفايل
</a>

<a href="https://wa.me/201055669552">
<i class="fa-solid fa-headset"></i>
تواصل مع الدعم
</a>

<div class="sidebar-footer">

    <!-- Social Icons -->
    <div class="social-icons">
        <a href="https://facebook.com/YOUR_PAGE" target="_blank" class="social" data-name="Facebook">
            <i class="fa-brands fa-facebook-f"></i>
        </a>

        <a href="https://youtube.com/YOUR_CHANNEL" target="_blank" class="social" data-name="YouTube">
            <i class="fa-brands fa-youtube"></i>
        </a>

        <a href="https://t.me/YOUR_GROUP" target="_blank" class="social" data-name="Telegram">
            <i class="fa-brands fa-telegram"></i>
        </a>
    </div>

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="logout-btn">
            <i class="fa-solid fa-right-from-bracket"></i>
            تسجيل الخروج
        </button>
    </form>

</div>

</div>

<!-- المحتوى -->

<div class="container mt-4">

{{ $slot }}

</div>

<script>

let sidebar = document.getElementById("sidebar")
let menuBtn = document.getElementById("menuBtn")
let overlay = document.getElementById("overlay")

function openMenu(){

sidebar.classList.add("open")
overlay.classList.add("show")

}

function closeMenu(){

sidebar.classList.remove("open")
overlay.classList.remove("show")

}

menuBtn.addEventListener("click",function(e){

e.stopPropagation()

if(sidebar.classList.contains("open")){

closeMenu()

}else{

openMenu()

}

})

overlay.addEventListener("click",function(){

closeMenu()

})

</script>
<script>

let dropdown = document.getElementById("notifyDropdown")
let list = document.getElementById("notifyList")
let count = document.getElementById("notifyCount")
let sound = document.getElementById("notifySound")

let notifications = []

function toggleNotifications(e){
e.stopPropagation() // يمنع الإغلاق مباشرة
dropdown.classList.toggle("active")
}

/* إضافة إشعار */
function addNotification(title, message){

let notif = {
title: title,
message: message
}

notifications.unshift(notif)

renderNotifications()

/* صوت */
sound.play()

/* اهتزاز */
let icon = document.querySelector(".notify-icon")
icon.style.transform = "rotate(15deg)"
setTimeout(()=> icon.style.transform="rotate(0)",300)

/* Popup */
showPopup(title, message)

}

/* عرض */
function renderNotifications(){

list.innerHTML = ""

notifications.forEach(n=>{
list.innerHTML += `
<div class="notify-item">
<strong>${n.title}</strong><br>
<small>${n.message}</small>
</div>
`
})

count.innerText = notifications.length

}

/* Popup */
function showPopup(title, message){

let popup = document.createElement("div")

popup.style = `
position:fixed;
top:20px;
right:20px;
background:#1e293b;
color:white;
padding:15px;
border-radius:10px;
box-shadow:0 0 20px rgba(0,0,0,0.5);
z-index:3000;
animation:fadeIn 0.3s;
`

popup.innerHTML = `<strong>${title}</strong><br>${message}`

document.body.appendChild(popup)

setTimeout(()=> popup.remove(),4000)

}

/* تجربة */
setTimeout(()=>{
addNotification("🔥 كويز جديد","تم إضافة كويز جديد لك")
},3000)

</script>

<script>

setInterval(()=>{
fetch('/get-notifications')
.then(res=>res.json())
.then(data=>{

if(data.length != notifications.length){

notifications = data
renderNotifications()

sound.play()
showPopup("إشعار جديد","عندك إشعار جديد 🔥")

}

})
},5000)

</script>
<script>

// إغلاق الإشعارات عند الضغط خارجها
document.addEventListener("click", function(e){

let dropdown = document.getElementById("notifyDropdown")
let icon = document.querySelector(".notify-icon")

// لو الضغط مش على الأيقونة ولا داخل الدروب داون
if(!dropdown.contains(e.target) && !icon.contains(e.target)){
dropdown.classList.remove("active")
}

})

</script>

<script>

let text = "⚡ مرحبا بكم في منصة الدكتور محمد عادل⚡"
let index = 0
let speed = 80

function typeWriter(){
if(index < text.length){
document.getElementById("typingText").innerHTML += text.charAt(index)
index++
setTimeout(typeWriter, speed)
}
}

window.onload = typeWriter

</script>

<script>

// تشغيل الصوت
function playClick(){
let sound = document.getElementById("clickSound")
sound.currentTime = 0
sound.play()
}

/* الأيقونات */
document.querySelectorAll(".social").forEach(btn=>{
btn.addEventListener("click", playClick)
})

/* زرار تسجيل الخروج */
document.querySelector(".logout-btn").addEventListener("click", playClick)

</script>
<audio id="clickSound">
    <source src="https://assets.mixkit.co/active_storage/sfx/2568/2568-preview.mp3">
</audio>

<script>
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/sw.js')
}
</script>

<script>
let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
e.preventDefault();
deferredPrompt = e;
document.getElementById('installBtn').style.display = 'block';
});

document.getElementById('installBtn').addEventListener('click', () => {
deferredPrompt.prompt();
});
</script>
<script>
async function subscribeUser() {
  const registration = await navigator.serviceWorker.register('/sw.js');

  const subscription = await registration.pushManager.subscribe({
    userVisibleOnly: true,
    applicationServerKey: 'PUT_YOUR_PUBLIC_KEY_HERE'
  });

  await fetch('/subscribe', {
    method: 'POST',
    body: JSON.stringify(subscription),
    headers: {
      'Content-Type': 'application/json'
    }
  });
}

subscribeUser();
</script>

</body>
</html>