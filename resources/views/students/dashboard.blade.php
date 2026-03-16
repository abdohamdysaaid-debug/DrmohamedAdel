<x-app-layout>

<div class="main-container">

<h1 class="title">🎓 منصة الفيزياء</h1>

<p class="welcome">أهلاً {{ auth()->user()->name }}</p>


<div class="cards">

<a href="/lessons" class="card blue">
📚
<h3>مشاهدة الدروس</h3>
</a>

<a href="/quizzes" class="card orange">
📝
<h3>امتحانات الكويزات</h3>
</a>

<a href="/results" class="card green">
📊
<h3>نتائج الكويزات</h3>
</a>

<a href="/leaderboard" class="card purple">
🏆
<h3>ترتيبي</h3>
</a>

<a href="/subscription" class="card red">
💳
<h3>اشتراكي</h3>
</a>

</div>

</div>


<style>

.main-container{
text-align:center;
margin-top:80px;
}

.title{
font-size:40px;
font-weight:bold;
}

.welcome{
color:#666;
margin-bottom:40px;
}

.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(200px,1fr));
gap:25px;
max-width:800px;
margin:auto;
}

.card{
padding:35px;
border-radius:15px;
text-decoration:none;
color:white;
font-size:22px;
font-weight:bold;
transition:0.3s;
box-shadow:0 8px 20px rgba(0,0,0,0.2);
}

.card:hover{
transform:translateY(-8px);
}

.blue{background:linear-gradient(135deg,#36d1dc,#5b86e5);}
.orange{background:linear-gradient(135deg,#f7971e,#ffd200);}
.green{background:linear-gradient(135deg,#11998e,#38ef7d);}
.purple{background:linear-gradient(135deg,#a18cd1,#fbc2eb);}
.red{background:linear-gradient(135deg,#ff416c,#ff4b2b);}

.card h3{
margin-top:10px;
font-size:18px;
}

</style>

</x-app-layout>