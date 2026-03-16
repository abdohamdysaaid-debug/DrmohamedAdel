<x-app-layout>

@if(auth()->user()->role == 'admin')

<script>
window.location.href="/teacher-dashboard"
</script>

@else

<script>
window.location.href="/student-dashboard"
</script>

@endif

</x-app-layout>