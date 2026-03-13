<h2>إضافة طالب</h2>

<form method="POST" action="/add-student">
@csrf

<input type="text" name="name" placeholder="اسم الطالب"><br><br>

<input type="email" name="email" placeholder="ايميل الطالب"><br><br>

<input type="password" name="password" placeholder="باسورد الطالب"><br><br>

<select name="year">
<option value="1">أولى ثانوي</option>
<option value="2">ثانية ثانوي</option>
<option value="3">ثالثة ثانوي</option>
</select>

<br><br>

<select name="group">
<option value="A">A</option>
<option value="B">B</option>
<option value="C">C</option>
<option value="D">D</option>
</select>

<br><br>

<button type="submit">إضافة الطالب</button>

</form>