<x-app-layout>

<h2>الإشعارات</h2>

@foreach($notifications as $n)

<div style="padding:15px;border-bottom:1px solid #eee">

<strong>{{ $n->title }}</strong>

<p>{{ $n->message }}</p>

</div>

@endforeach

</x-app-layout>