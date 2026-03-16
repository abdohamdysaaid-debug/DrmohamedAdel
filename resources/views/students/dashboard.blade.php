<x-app-layout>

<style>

.dashboard{

display:flex;
justify-content:center;
align-items:center;
padding-top:80px;

}

.grid{

display:grid;
grid-template-columns:1fr;
gap:20px;
width:280px;

}

.card{

padding:25px;
border-radius:15px;
color:white;
text-align:center;
font-size:18px;
font-weight:bold;
text-decoration:none;
box-shadow:0 10px 20px rgba(0,0,0,0.2);
transition:0.3s;

}

.card:hover{

transform:translateY(-4px);

}

.blue{background:#36d1dc;}
.orange{background:#f6d365;}
.green{background:#43e97b;}
.purple{background:#a18cd1;}
.red{background:#ff6a6a;}

.icon{

font-size:32px;
display:block;
margin-bottom:8px;

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