<x-app-layout>

<div style="padding:30px">

<button onclick="toggleMenu()" 
style="
font-size:22px;
background:#3498db;
color:white;
border:none;
padding:10px 15px;
border-radius:8px;
cursor:pointer;
">
☰
</button>


<div id="studentMenu" style="
width:250px;
background:#1e293b;
color:white;
position:fixed;
top:0;
left:-260px;
height:100%;
transition:0.3s;
padding-top:20px;
">

<div style="padding:20px;font-size:20px;font-weight:bold;">
🎓 منصة الطالب
</div>

<a href="/lessons" class="menu-item">📚 مشاهدة الدروس</a>
<a href="/quizzes" class="menu-item">📝 الكويزات</a>
<a href="/results" class="menu-item">📊 النتائج</a>
<a href="/leaderboard" class="menu-item">🏆 ترتيبي</a>
<a href="/subscription" class="menu-item">💳 اشتراكي</a>

<hr>

<a href="/profile" class="menu-item">👤 البروفايل</a>
<a href="/logout" class="menu-item">🚪 تسجيل الخروج</a>

</div>


<h1 style="font-size:35px;margin-top:40px">
منصة الفيزياء
</h1>

<p>أهلاً {{ auth()->user()->name }}</p>


<div style="
margin-top:40px;
display:flex;
flex-direction:column;
gap:20px;
max-width:300px
">

<a href="/lessons" class="card blue">📚 مشاهدة الدروس</a>

<a href="/quizzes" class="card orange">📝 امتحانات الكويزات</a>

<a href="/results" class="card green">📊 نتائج الكويزات</a>

<a href="/leaderboard" class="card purple">🏆 ترتيبي</a>

<a href="/subscription" class="card red">💳 اشتراكي</a>

</div>

</div>


<style>

.menu-item{
display:block;
padding:12px 20px;
color:white;
text-decoration:none;
}

.menu-item:hover{
background:#334155;
}

.card{
padding:20px;
border-radius:12px;
color:white;
text-decoration:none;
font-size:18px;
font-weight:bold;
text-align:center;
transition:0.3s;
}

.card:hover{
transform:scale(1.05);
}

.blue{background:#3498db}
.orange{background:#e67e22}
.green{background:#2ecc71}
.purple{background:#9b59b6}
.red{background:#e74c3c}

</style>


<script>

function toggleMenu(){

let menu = document.getElementById("studentMenu")

if(menu.style.left === "0px"){
menu.style.left = "-260px"
}else{
menu.style.left = "0px"
}

}

</script>

</x-app-layout>