<x-app-layout>

<div style="display:flex">

<div style="width:250px;background:#1e293b;height:100vh;color:white">

<div style="padding:20px;color:white;font-size:20px;font-weight:bold;">
🎓 منصة الطالب
</div>

<a href="/lessons" class="menu-item">
📚 مشاهدة الدروس
</a>

<a href="/quizzes" class="menu-item">
📝 امتحانات الكويزات
</a>

<a href="/results" class="menu-item">
📊 نتائج الكويزات
</a>

<a href="/leaderboard" class="menu-item">
🏆 ترتيبي
</a>

<a href="/subscription" class="menu-item">
💳 اشتراكي
</a>

<hr style="margin:15px 0;border-color:#444">

<a href="/profile" class="menu-item">
👤 البروفايل
</a>

<a href="/logout" class="menu-item">
🚪 تسجيل الخروج
</a>

</div>


<div style="flex:1;padding:40px">

<h1>منصة الفيزياء</h1>

<p>أهلاً {{ auth()->user()->name }}</p>

</div>

</div>

<style>

.menu-item{
display:block;
padding:12px 20px;
color:#ddd;
text-decoration:none;
transition:0.3s;
}

.menu-item:hover{
background:#334155;
color:white;
padding-left:25px;
}

</style>

</x-app-layout>