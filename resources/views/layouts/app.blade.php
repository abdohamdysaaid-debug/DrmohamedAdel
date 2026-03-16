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

}

/* زر تسجيل الخروج */

.logout-btn{

position:absolute;
bottom:30px;
width:210px;

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

.notification{

position:absolute;
right:20px;
top:25px;
font-size:22px;
cursor:pointer;

}

.badge-notify{

position:absolute;
top:-6px;
right:-6px;

background:red;
color:white;

border-radius:50%;
padding:2px 6px;

font-size:10px;

}

/* اسم المنصة */

.logo-title{

position:absolute;
left:50%;
top:22px;

transform:translateX(-50%);

font-weight:bold;
font-size:22px;

color:#1e293b;

letter-spacing:1px;

}

</style>

</head>


<body>

<div id="overlay" class="overlay"></div>

<!-- Navbar -->

<nav class="navbar navbar-light bg-white shadow-sm px-4 position-relative">

<button id="menuBtn" class="menu-btn">
☰
</button>

<div class="notification">

🔔

<span class="badge-notify">
5
</span>

</div>

<span class="logo-title">

⚡ منصة الفيزياء

</span>

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

<form method="POST" action="{{ route('logout') }}" class="logout-btn">
@csrf

<button class="btn btn-danger w-100">
🚪 تسجيل الخروج
</button>

</form>

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

</body>
</html>