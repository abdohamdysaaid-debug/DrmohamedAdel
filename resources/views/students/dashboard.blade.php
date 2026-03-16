<x-app-layout>

<style>

body{
background:#f4f6fb;
}

/* توسيط الصفحة بالكامل */

.dashboard-container{
display:flex;
justify-content:center;
align-items:center;
height:85vh;
}

/* جريد الأيقونات */

.dashboard-grid{
display:grid;
grid-template-columns:repeat(2,240px);
gap:30px;
}

/* الكروت */

.dashboard-card{

padding:35px;
border-radius:18px;
color:white;
text-align:center;
font-size:19px;
font-weight:bold;
cursor:pointer;
transition:0.3s;
box-shadow:0 10px 30px rgba(0,0,0,0.15);

}

.dashboard-card:hover{

transform:translateY(-6px);
box-shadow:0 20px 40px rgba(0,0,0,0.25);

}

/* الألوان */

.blue{
background:linear-gradient(135deg,#36d1dc,#5b86e5);
}

.orange{
background:linear-gradient(135deg,#f6d365,#fda085);
}

.green{
background:linear-gradient(135deg,#43e97b,#38f9d7);
}

.purple{
background:linear-gradient(135deg,#a18cd1,#fbc2eb);
}

.red{
background:linear-gradient(135deg,#ff6a6a,#ff4757);
}

.icon{
font-size:42px;
display:block;
margin-bottom:12px;
}

</style>


<div class="dashboard-container">

<div class="dashboard-grid">

<a href="/lessons" class="dashboard-card blue">

<span class="icon">📚</span>
مشاهدة الدروس

</a>


<a href="/quizzes" class="dashboard-card orange">

<span class="icon">📝</span>
امتحانات الكويزات

</a>


<a href="/results" class="dashboard-card green">

<span class="icon">📊</span>
نتائج الكويزات

</a>


<a href="/leaderboard" class="dashboard-card purple">

<span class="icon">🏆</span>
ترتيبي

</a>


<a href="/subscription" class="dashboard-card red">

<span class="icon">💳</span>
اشتراكي

</a>


</div>

</div>

</x-app-layout>