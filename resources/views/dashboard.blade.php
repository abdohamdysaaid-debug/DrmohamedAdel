<x-app-layout>

<div style="padding:40px">

@if(auth()->user()->role == 'admin')

<div class="container">

<h1 class="mb-4">لوحة تحكم المدرس</h1>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

<a href="/teacher-dashboard" style="text-decoration:none;">
<div style="background:#3498db;color:white;padding:25px;border-radius:10px;width:200px;text-align:center;">
📊 <br><br>
لوحة التحكم
</div>
</a>

<a href="/add-lesson" style="text-decoration:none;">
<div style="background:#2ecc71;color:white;padding:25px;border-radius:10px;width:200px;text-align:center;">
📚 <br><br>
إضافة درس
</div>
</a>

<a href="/add-quiz" style="text-decoration:none;">
<div style="background:#e67e22;color:white;padding:25px;border-radius:10px;width:200px;text-align:center;">
❓ <br><br>
إضافة اختبار
</div>
</a>

<a href="/students" style="text-decoration:none;">
<div style="background:#9b59b6;color:white;padding:25px;border-radius:10px;width:200px;text-align:center;">
👨‍🎓 <br><br>
إدارة الطلاب
</div>
</a>

<a href="/video-report" style="text-decoration:none;">
<div style="background:#34495e;color:white;padding:25px;border-radius:10px;width:200px;text-align:center;">
👁️ <br><br>
تقرير المشاهدة
</div>
</a>

</div>

</div>

@else

<h1>المنصة التعليمية</h1>

<a href="/lessons">📚 مشاهدة الدروس</a>

@endif

</div>

</x-app-layout>