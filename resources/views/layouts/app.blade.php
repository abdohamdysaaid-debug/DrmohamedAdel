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

<button onclick="toggleMenu()" class="btn btn-light">

☰

</button>

<span class="fw-bold">منصة الفيزياء</span>

</nav>


<!-- القائمة الجانبية -->

<div id="sidebar" style="

position:fixed;
top:0;
left:-260px;
width:250px;
height:100vh;
background:#1e293b;
color:white;
padding:20px;
transition:.3s;

">

<h4 class="mb-4">منصة الطالب</h4>

<a href="/lessons" class="d-block text-white mb-3">📚 مشاهدة الدروس</a>

<a href="/quizzes" class="d-block text-white mb-3">📝 امتحانات الكويزات</a>

<a href="/results" class="d-block text-white mb-3">📊 نتائج الكويزات</a>

<a href="/leaderboard" class="d-block text-white mb-3">🏆 ترتيبي</a>

<a href="/subscription" class="d-block text-white mb-3">💳 اشتراكي</a>

<a href="/profile" class="d-block text-white mt-4">👤 البروفايل</a>

<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="btn btn-danger w-100 mt-3">تسجيل الخروج</button>
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

</body>
</html>