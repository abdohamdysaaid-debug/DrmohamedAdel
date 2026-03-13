<x-app-layout>

<div style="padding:40px">

<h1>الاختبار</h1>

<h3>الوقت المتبقي: <span id="timer">60</span> ثانية</h3>

<form id="quizForm" method="POST" action="/submit-quiz">
@csrf

<input type="hidden" name="start_time" value="{{ now() }}">

@foreach($quizzes as $quiz)

<div style="margin-bottom:30px">

<h3>{{ $quiz->question }}</h3>

<label>
<input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $quiz->option1 }}">
{{ $quiz->option1 }}
</label>

<br>

<label>
<input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $quiz->option2 }}">
{{ $quiz->option2 }}
</label>

<br>

<label>
<input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $quiz->option3 }}">
{{ $quiz->option3 }}
</label>

<br>

<label>
<input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $quiz->option4 }}">
{{ $quiz->option4 }}
</label>

</div>

<hr>

@endforeach


<button type="submit" style="padding:10px 20px;background:green;color:white;border:none;border-radius:6px">
إرسال الإجابات
</button>

</form>

</div>


<script>

let time = 60;

let timer = setInterval(function(){

time--;

document.getElementById("timer").innerText = time;

if(time <= 0){

clearInterval(timer);

alert("انتهى الوقت سيتم إرسال الإجابات");

document.getElementById("quizForm").submit();

}

},1000);

// منع تحديث الصفحة
</form>

<script>

let time = 600;

let timer = setInterval(function(){

let minutes = Math.floor(time / 60);
let seconds = time % 60;

document.getElementById("timer").innerText =
minutes + ":" + (seconds < 10 ? "0" + seconds : seconds);

time--;

if(time < 0){

clearInterval(timer);

alert("انتهى الوقت");

document.getElementById("quizForm").submit();

}

},1000);


// منع تحديث الصفحة

window.onbeforeunload = function () {
return "لا يمكنك مغادرة الاختبار الآن";
};


// منع الرجوع للخلف

history.pushState(null, null, location.href);

window.onpopstate = function () {
history.go(1);
};

</script>

</x-app-layout>