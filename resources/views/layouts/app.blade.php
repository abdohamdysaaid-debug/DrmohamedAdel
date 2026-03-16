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

</head>


<body class="font-sans antialiased" style="
background:linear-gradient(120deg,#f8fafc,#e2e8f0,#f1f5f9);
min-height:100vh;
">

<!-- Navbar -->

<nav class="navbar navbar-light bg-white shadow-sm px-4 position-relative">

<button onclick="toggleMenu()" style="
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
">
☰
</button>

<div style="
position:absolute;
right:20px;
top:25px;
cursor:pointer;
font-size:22px;
">
🔔

<span style="
position:absolute;
top:-6px;
right:-6px;
background:red;
color:white;
border-radius:50%;
padding:2px 6px;
font-size:10px;
">
5
</span>

</div>

<span style="
position:absolute;
left:50%;
top:22px;
transform:translateX(-50%);
font-weight:bold;
font-size:22px;
color:#1e293b;
letter-spacing:1px;
">
⚡ منصة الفيزياء
</span>

</nav>


<!-- القائمة الجانبية -->

<style>

.sidebar{

position:fixed;
top:0;
left:-260px;
width:250px;
min-height:100vh;

background:linear-gradient(180deg,#1e3a8a,#0f172a);
backdrop-filter:blur(10px);

color:white;
padding:25px;
transition:0.3s;
z-index:999;

}
.sidebar h4{

margin-bottom:30px;
font-weight:bold;
text-align:center;
font-size:20px;
letter-spacing:1px;

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


<div id="sidebar" class="sidebar">

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