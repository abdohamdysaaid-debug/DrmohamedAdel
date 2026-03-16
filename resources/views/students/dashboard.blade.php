<x-app-layout>

<style>

body{
background:#f4f6fb;
}

/* منتصف الصفحة */

.center-dashboard{
display:flex;
justify-content:center;
align-items:center;
height:80vh;
}

/* جريد الأيقونات */

.dashboard-grid{
display:grid;
grid-template-columns:repeat(2,230px);
gap:25px;
}

/* كارت */

.dashboard-card{

padding:30px;
border-radius:18px;
color:white;
text-align:center;
font-size:18px;
font-weight:bold;
cursor:pointer;
transition:0.3s;
box-shadow:0 10px 25px rgba(0,0,0,0.1);

}

.dashboard-card:hover{

transform:translateY(-5px);
box-shadow:0 15px 35px rgba(0,0,0,0.2);

}

/* الألوان */

.card-blue{
background:linear-gradient(135deg,#4facfe,#00f2fe);
}

.card-orange{
background:linear-gradient(135deg,#f6d365,#fda085);
}

.card-green{
background:linear-gradient(135deg,#43e97b,#38f9d7);
}

.card-purple{
background:linear-gradient(135deg,#a18cd1,#fbc2eb);
}

.card-red{
background:linear-gradient(135deg,#ff6a6a,#ff4757);
}

.dashboard-icon{
font-size:40px;
margin-bottom:10px;
display:block;
}

</style>


<div class="center-dashboard">

<div class="dashboard-grid">

<a href="/lessons" class="dashboard-card card-blue">

<span class="dashboard-icon">📚</span>

مشاهدة الدروس

</a>


<a href="/quizzes" class="dashboard-card card-orange">

<span class="dashboard-icon">📝</span>

امتحانات الكويزات

</a>


<a href="/results" class="dashboard-card card-green">

<span class="dashboard-icon">📊</span>

نتائج الكويزات

</a>


<a href="/leaderboard" class="dashboard-card card-purple">

<span class="dashboard-icon">🏆</span>

ترتيبي

</a>


<a href="/subscription" class="dashboard-card card-red">

<span class="dashboard-icon">💳</span>

اشتراكي

</a>


</div>

</div>

</x-app-layout>