<x-app-layout>

<div style="padding:40px">

<h2>اضافة درس جديد</h2>

<form method="POST" action="/add-lesson" enctype="multipart/form-data">
@csrf

<div>
<label>اسم الدرس</label>
<input type="text" name="title">
</div>

<br>

<div>
<label>رفع ملف PDF</label>
<input type="file" name="pdf">
</div>

<br>

<div>
<label>رابط الفيديو</label>
<input type="text" name="video_url">
</div>

<br>
السنة

<select name="year">

<option value="1">أولى ثانوي</option>
<option value="2">ثانية ثانوي</option>
<option value="3">ثالثة ثانوي</option>

</select>

<br>

<div>
<label>الفصل</label>
<input type="text" name="chapter">
</div>

<br>

<button type="submit">
اضافة الدرس
</button>

</form>

</div>

</x-app-layout>