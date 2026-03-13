<x-app-layout>

<div style="padding:40px">

<h2>نتائج الطلاب</h2>

<table border="1" width="700">

<tr>
<th>الطالب</th>
<th>الدرجة</th>
<th>السنة</th>
<th>المجموعة</th>
</tr>

@foreach($results as $result)

<tr>

<td>{{ $result->user->name }}</td>

<td>{{ $result->score }}</td>

<td>{{ $result->user->year }}</td>

<td>{{ $result->user->group }}</td>

</tr>

@endforeach

</table>

</div>

</x-app-layout>