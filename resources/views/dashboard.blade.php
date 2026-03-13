<x-app-layout>

<div style="padding:40px">

@if(auth()->user()->role == 'admin')

<h1>لوحة تحكم المدرس</h1>

<a href="/teacher-dashboard">📊 لوحة التحكم</a>
<br><br>

<a href="/add-lesson">📚 إضافة درس</a>
<br><br>

<a href="/add-quiz">❓ إضافة اختبار</a>
<br><br>

<a href="/students">👨‍🎓 إدارة الطلاب</a>
<br><br>

<a href="/video-report">👁 تقرير مشاهدة الفيديو</a>

@else

<h1>المنصة التعليمية</h1>

<a href="/lessons">📚 مشاهدة الدروس</a>

@endif

</div>

</x-app-layout>