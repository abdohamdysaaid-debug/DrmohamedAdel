<x-app-layout>

<div style="padding:40px">

<h2>اضافة سؤال</h2>

<form method="POST" action="/quizzes">
@csrf

<label>اختر الدرس</label>

<select name="lesson_id">

@foreach($lessons as $lesson)

<option value="{{ $lesson->id }}">
{{ $lesson->title }}
</option>

@endforeach

</select>
<label>السؤال</label>
<input type="text" name="question">

<label>اختيار 1</label>
<input type="text" name="option1">

<label>اختيار 2</label>
<input type="text" name="option2">

<label>اختيار 3</label>
<input type="text" name="option3">

<label>اختيار 4</label>
<input type="text" name="option4">

<label>الإجابة الصحيحة</label>
<input type="text" name="correct_answer">

<button type="submit">إضافة السؤال</button>

</form>

</div>

</x-app-layout>