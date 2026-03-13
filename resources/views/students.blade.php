<h2>إدارة الطلاب</h2>

<table border="1" cellpadding="10">

<tr>
<th>الاسم</th>
<th>السنة</th>
<th>المجموعة</th>
<th>التقييم</th>
<th>الاشتراك</th>
<th>الإجراء</th>
</tr>

@foreach($students as $student)

<tr>

<td>{{ $student->name }}</td>

<td>{{ $student->year }}</td>

<td>{{ $student->group }}</td>

<td>{{ $student->rating }}</td>

<td>{{ $student->subscription_end }}</td>

<td>

<a href="/extend-subscription/{{ $student->id }}">
تمديد شهر
</a>

<br><br>

<a href="/edit-student/{{ $student->id }}">
تعديل
</a>

<br><br>

<a href="/delete-student/{{ $student->id }}">
حذف
</a>

</td>

</tr>

@endforeach

</table>