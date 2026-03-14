<x-app-layout>

<div style="padding:40px">

<h2>إضافة اختبار</h2>

<label>نوع الاختبار</label>

<select id="quizType" onchange="toggleLesson()">

<option value="lesson">اختبار للدرس</option>

<option value="quiz">كويز عادي</option>

</select>

<br><br>

<div id="lessonSelect">

<label>اختر الدرس</label>

<select name="lesson_id">

@foreach($lessons as $lesson)

<option value="{{ $lesson->id }}">
{{ $lesson->title }}
</option>

@endforeach

</select>

</div>

<br>

<input type="text" name="question" placeholder="السؤال">

<br><br>

<input type="text" name="option1" placeholder="الإجابة 1">

<input type="text" name="option2" placeholder="الإجابة 2">

<input type="text" name="option3" placeholder="الإجابة 3">

<input type="text" name="correct_answer" placeholder="الإجابة الصحيحة">

<br><br>

<button type="submit">إضافة الاختبار</button>

</form>
<script>

function toggleLesson(){

let type = document.getElementById("quizType").value;

let lessonDiv = document.getElementById("lessonSelect");

if(type == "quiz"){
lessonDiv.style.display = "none";
}else{
lessonDiv.style.display = "block";
}

}

</script>

</div>

</x-app-layout>