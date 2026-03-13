<x-app-layout>

<div style="padding:40px">

<h2>المحاضرات</h2>

@foreach($lessons as $lesson)

<h2>{{ $lesson->title }}</h2>

<p>الفصل: {{ $lesson->chapter }}</p>

<iframe width="560" height="315"
src="{{ $lesson->video_url }}"
title="YouTube video player"
frameborder="0"
allowfullscreen>
</iframe>

<br><br>

<a href="/quiz/{{ $lesson->id }}" style="background:green;color:white;padding:10px;border-radius:5px;text-decoration:none;">
ابدأ الاختبار
</a>

<hr>

@endforeach

</div>

</x-app-layout>