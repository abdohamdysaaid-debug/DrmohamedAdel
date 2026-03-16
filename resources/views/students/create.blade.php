<x-app-layout>

<div style="padding:40px">

<h2>إضافة طالب جديد</h2>

<form method="POST" action="/students/add">

@csrf

<input type="text" name="name" placeholder="اسم الطالب" required><br><br>

<input type="email" name="email" placeholder="الايميل" required><br><br>

<input type="password" name="password" placeholder="الباسورد" required><br><br>

<select name="grade">
<option value="1">أولى ثانوي</option>
<option value="2">ثانية ثانوي</option>
<option value="3">ثالثة ثانوي</option>
</select><br><br>

<button type="submit">إضافة الطالب</button>

</form>

</div>

</x-app-layout>