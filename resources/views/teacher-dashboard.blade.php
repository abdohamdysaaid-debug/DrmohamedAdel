<x-app-layout>

<div style="padding:40px">

<h1>لوحة تحكم المدرس</h1>

<div style="display:flex;gap:20px;margin-top:30px">

<div style="background:#3498db;color:white;padding:20px;border-radius:10px">
<h3>عدد الطلاب</h3>
<h2>{{ $students }}</h2>
</div>

<div style="background:#27ae60;color:white;padding:20px;border-radius:10px">
<h3>عدد الدروس</h3>
<h2>{{ $lessons }}</h2>
</div>

<div style="background:#e67e22;color:white;padding:20px;border-radius:10px">
<h3>عدد الاختبارات</h3>
<h2>{{ $quizzes }}</h2>
</div>
<div style="background:#9b59b6;color:white;padding:20px;border-radius:10px">
<h3>عدد المشاهدات</h3>
<h2>{{ $views }}</h2>
</div>

<h2 style="margin-top:40px">أفضل الطلاب</h2>

<table border="1" cellpadding="10" style="margin-top:20px">

<tr>
<th>الاسم</th>
<th>التقييم</th>
</tr>

@foreach($topStudents as $student)

<tr>
<td>{{ $student->name }}</td>
<td>{{ $student->rating }}</td>
</tr>

@endforeach

</table>

</div>

</x-app-layout>