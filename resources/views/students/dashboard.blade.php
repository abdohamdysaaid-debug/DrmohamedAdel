<x-app-layout>

<div style="padding:40px">

<h1>منصة الفيزياء</h1>

<h3>أهلاً {{ auth()->user()->name }}</h3>

<br><br>

<a href="/lessons" style="
background:#3498db;
color:white;
padding:20px;
border-radius:10px;
text-decoration:none;
display:inline-block;
width:200px;
text-align:center;
margin:10px;
">
📚 مشاهدة الدروس
</a>

<a href="/leaderboard" style="
background:#e67e22;
color:white;
padding:20px;
border-radius:10px;
text-decoration:none;
display:inline-block;
width:200px;
text-align:center;
margin:10px;
">
🏆 ترتيب الطلاب
</a>

<a href="/results" style="
background:#2ecc71;
color:white;
padding:20px;
border-radius:10px;
text-decoration:none;
display:inline-block;
width:200px;
text-align:center;
margin:10px;
">
📊 نتائجي
</a>

</div>

</x-app-layout>