<x-app-layout>

<div style="padding:40px">

<h1>تقرير مشاهدة الفيديوهات</h1>

<table border="1" cellpadding="10" style="margin-top:30px">

<tr>

<th>الطالب</th>

@foreach($lessons as $lesson)

<th>{{ $lesson->title }}</th>

@endforeach

</tr>

@foreach($students as $student)

<tr>

<td>{{ $student->name }}</td>

@foreach($lessons as $lesson)

<td>

@php

$watched = \App\Models\VideoView::where('user_id',$student->id)
->where('lesson_id',$lesson->id)
->where('watched',true)
->exists();

@endphp

@if($watched)

<span style="color:green;font-weight:bold">✔ شاهد</span>

@else

<span style="color:red;font-weight:bold">✘ لم يشاهد</span>

@endif

</td>

@endforeach

</tr>

@endforeach

</table>

</div>

</x-app-layout>