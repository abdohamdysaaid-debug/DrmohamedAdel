<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <body class="font-sans antialiased">

<div class="d-flex">

<div class="bg-dark text-white p-3" style="width:250px; min-height:100vh;">
<h4>لوحة التحكم</h4>

<ul class="nav flex-column mt-4">

<li class="nav-item">
<a class="nav-link text-white" href="/dashboard">📊 لوحة التحكم</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/add-lesson">📚 إضافة درس</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/add-quiz">❓ إضافة اختبار</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/students">👨‍🎓 إدارة الطلاب</a>
</li>

<li class="nav-item">
<a class="nav-link text-white" href="/video-report">👁️ تقرير المشاهدة</a>
</li>

</ul>
</div>

<div class="flex-grow-1 p-4">
{{ $slot }}
</div>

</div>

</body>
</html>