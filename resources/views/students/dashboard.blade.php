<x-app-layout>

<style>

.dashboard{
display:flex;
justify-content:center;
align-items:center;
height:85vh;
}

.grid{
display:grid;
grid-template-columns:repeat(2,250px);
gap:30px;
}

.card{
padding:35px;
border-radius:18px;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
cursor:pointer;
transition:.3s;
box-shadow:0 15px 30px rgba(0,0,0,.2);
}

.card:hover{
transform:translateY(-6px);
}

.blue{background:#36d1dc;}
.orange{background:#f6d365;}
.green{background:#43e97b;}
.purple{background:#a18cd1;}
.red{background:#ff6a6a;}

.icon{
font-size:40px;
display:block;
margin-bottom:10px;
}

</style>

<div class="dashboard">

<div class="grid">

<a href="/lessons" class="card blue">
<span class="icon">📚</span>
مشاهدة الدروس
</a>

<a href="/quizzes" class="card orange">
<span class="icon">📝</span>
امتحانات الكويزات
</a>

<a href="/results" class="card green">
<span class="icon">📊</span>
نتائج الكويزات
</a>

<a href="/leaderboard" class="card purple">
<span class="icon">🏆</span>
ترتيبي
</a>

<a href="/subscription" class="card red">
<span class="icon">💳</span>
اشتراكي
</a>

</div>

</div>

</x-app-layout>