<x-app-layout>

<div style="padding:40px">

<h2>الامتحان</h2>

<form method="POST" action="/submit-quiz">
@csrf

@foreach($quizzes as $quiz)

<div style="margin-bottom:20px">

<p>{{ $quiz->question }}</p>

<input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $quiz->option1 }}">
{{ $quiz->option1 }}

<br>

<input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $quiz->option2 }}">
{{ $quiz->option2 }}

<br>

<input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $quiz->option3 }}">
{{ $quiz->option3 }}

<br>

<input type="radio" name="answers[{{ $quiz->id }}]" value="{{ $quiz->option4 }}">
{{ $quiz->option4 }}

</div>

@endforeach

<button type="submit">ارسال الامتحان</button>

</form>

</div>

</x-app-layout>