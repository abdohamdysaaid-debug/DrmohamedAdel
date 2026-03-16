<x-app-layout>

<style>

/* الخلفية */

body{
background:linear-gradient(135deg,#eef2ff,#f0f9ff,#f8fafc);
overflow-x:hidden;
}

/* دوائر الإضاءة */

.bg-circle{
position:fixed;
border-radius:50%;
filter:blur(120px);
opacity:0.4;
z-index:-1;
animation:move 12s infinite alternate;
}

.circle1{
width:400px;
height:400px;
background:#60a5fa;
top:-100px;
left:-100px;
}

.circle2{
width:350px;
height:350px;
background:#a78bfa;
bottom:-120px;
right:-100px;
}

@keyframes move{

0%{transform:translateY(0px);}
100%{transform:translateY(40px);}

}

/* الداشبورد */

.dashboard{

display:flex;
justify-content:center;
align-items:center;
padding-top:80px;

}

/* شبكة الكروت */

.grid{

display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:25px;
width:90%;
max-width:700px;

}

/* الكروت */

.card{

padding:28px;
border-radius:18px;
color:white;
text-align:center;
font-size:18px;
font-weight:bold;
text-decoration:none;
box-shadow:0 10px 25px rgba(0,0,0,0.15);
transition:0.3s;

}

/* حركة الكروت */

.card:hover{

transform:translateY(-6px) scale(1.02);

}

/* الألوان */

.blue{background:linear-gradient(135deg,#22d3ee,#0ea5e9);}
.orange{background:linear-gradient(135deg,#fde68a,#f59e0b);}
.green{background:linear-gradient(135deg,#4ade80,#22c55e);}
.purple{background:linear-gradient(135deg,#c4b5fd,#8b5cf6);}
.red{background:linear-gradient(135deg,#fca5a5,#ef4444);}

/* الأيقونات */

.icon{

font-size:34px;
display:block;
margin-bottom:10px;

}

/* الموبايل */

@media(max-width:600px){

.grid{

grid-template-columns:1fr;

}

.card{

font-size:16px;
padding:24px;

}

}

</style>


<!-- دوائر الخلفية -->

<div class="bg-circle circle1"></div>
<div class="bg-circle circle2"></div>


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