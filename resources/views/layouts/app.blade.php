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

@vite(['resources/css/app.css','resources/js/app.js'])

</head>


<body class="font-sans antialiased">

<!-- Navbar -->

<nav class="navbar navbar-light bg-white shadow-sm px-4">

<button onclick="toggleMenu()" style="
position:fixed;
top:15px;
left:15px;
background:#1e293b;
color:white;
border:none;
padding:10px 14px;
border-radius:8px;
font-size:18px;
cursor:pointer;
z-index:1000;
">
☰
</button>

<span class="fw-bold">منصة الفيزياء</span>

</nav>


<!-- القائمة الجانبية -->

<style>

.sidebar{

width:250px;
min-height:100vh;
background:linear-gradient(180deg,#0f172a,#1e293b);
color:white;
padding:25px;
}

.sidebar h4{

margin-bottom:30px;
font-weight:bold;

}

.sidebar a{

display:block;
padding:12px 15px;
margin-bottom:8px;
border-radius:10px;
color:white;
text-decoration:none;
transition:0.3s;

}

.sidebar a:hover{

background:#334155;

}

.logout-btn{

position:absolute;
bottom:30px;
width:200px;

}

</style>


<div class="sidebar">

<h4>🎓 منصة الطالب</h4>

<a href="/lessons">📚 مشاهدة الدروس</a>

<a href="/quizzes">📝 امتحانات الكويزات</a>

<a href="/results">📊 نتائج الكويزات</a>

<a href="/leaderboard">🏆 ترتيبي</a>

<a href="/subscription">💳 اشتراكي</a>

<a href="/profile">👤 البروفايل</a>

<a href="https://wa.me/201055669552">💬 تواصل مع الدعم</a>


<form method="POST" action="{{ route('logout') }}" class="logout-btn">

@csrf

<button class="btn btn-danger w-100">

🚪 تسجيل الخروج

</button>

</form>

</div>

<!-- المحتوى -->

<div class="container">

{{ $slot }}

</div>


<script>

function toggleMenu(){

let menu = document.getElementById("sidebar")

if(menu.style.left === "0px"){

menu.style.left = "-260px"

}else{

menu.style.left = "0px"

}

}

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>

function toggleMenu(){
let sidebar = document.getElementById("sidebar")

if(sidebar.style.left === "0px"){
sidebar.style.left = "-260px"
}else{
sidebar.style.left = "0px"
}

}

</script>
</body>
</html>