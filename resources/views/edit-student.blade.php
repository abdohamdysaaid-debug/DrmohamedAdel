<h2>تعديل بيانات الطالب</h2>

<form method="POST" action="/update-student/{{ $student->id }}">
@csrf

السنة

<select name="year">
<option value="1">أولى ثانوي</option>
<option value="2">ثانية ثانوي</option>
<option value="3">ثالثة ثانوي</option>
</select>

<br><br>

المجموعة

<select name="group">
<option>A</option>
<option>B</option>
<option>C</option>
<option>D</option>
</select>

<br><br>

التقييم

<input type="number" name="rating" value="{{ $student->rating }}">

<br><br>

<button type="submit">
حفظ التعديل
</button>

</form>