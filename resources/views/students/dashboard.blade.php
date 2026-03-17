<x-app-layout>

<style>

/* خلفية الفيزياء */

body{

background:
linear-gradient(rgba(2,6,23,.85),rgba(2,6,23,.85)),
url("https://images.unsplash.com/photo-1635070041078-e363dbe005cb");

background-size:cover;
background-position:center;
background-attachment:fixed;

overflow-x:hidden;

}

/* الجزيئات */

#particles-js{

position:fixed;
top:0;
left:0;
width:100%;
height:100%;
z-index:-2;

}

/* دوائر الإضاءة */

.bg-circle{

position:fixed;
border-radius:50%;
filter:blur(140px);
opacity:.35;
z-index:-1;

animation:move 12s infinite alternate;

}

.circle1{

width:420px;
height:420px;

background:#38bdf8;

top:-120px;
left:-120px;

}

.circle2{

width:360px;
height:360px;

background:#6366f1;

bottom:-150px;
right:-100px;

}

@keyframes move{

0%{transform:translateY(0px)}

100%{transform:translateY(40px)}

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

grid-template-columns:
repeat(auto-fit,minmax(220px,1fr));

gap:25px;

width:90%;
max-width:700px;

}

/* الكروت */

.card{

padding:30px;

border-radius:20px;

color:white;

text-align:center;

font-size:18px;
font-weight:bold;

text-decoration:none;

box-shadow:
0 15px 35px rgba(0,0,0,.35);

transition:.35s;

backdrop-filter:blur(10px);

}

/* حركة الكروت */

.card:hover{

transform:translateY(-8px) scale(1.03);

box-shadow:
0 20px 45px rgba(0,0,0,.45);

}

/* الألوان */

.blue{
background:linear-gradient(135deg,#0ea5e9,#22d3ee);
}

.orange{
background:linear-gradient(135deg,#fb923c,#f59e0b);
}

.green{
background:linear-gradient(135deg,#22c55e,#4ade80);
}

.purple{
background:linear-gradient(135deg,#8b5cf6,#6366f1);
}

.red{
background:linear-gradient(135deg,#ef4444,#f87171);
}

/* الأيقونات */

.icon{

font-size:34px;
margin-bottom:12px;

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


<!-- الجزيئات -->

<div id="particles-js"></div>

<!-- دوائر الإضاءة -->

<div class="bg-circle circle1"></div>
<div class="bg-circle circle2"></div>


<div class="dashboard">

<div class="grid">

<a href="/lessons" class="card blue">

<i class="fa-solid fa-book-open icon"></i>

مشاهدة الدروس

</a>


<a href="/quizzes" class="card orange">

<i class="fa-solid fa-file-pen icon"></i>

امتحانات الكويزات

</a>


<a href="/results" class="card green">

<i class="fa-solid fa-chart-line icon"></i>

نتائج الكويزات

</a>

</div>

</div>



<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<script>

particlesJS("particles-js", {

particles:{

number:{
value:80,
density:{enable:true,value_area:800}
},

color:{value:"#38bdf8"},

shape:{type:"circle"},

opacity:{
value:.5,
random:true
},

size:{
value:3,
random:true
},

line_linked:{
enable:true,
distance:150,
color:"#38bdf8",
opacity:.25,
width:1
},

move:{
enable:true,
speed:1.5,
direction:"none",
out_mode:"out"
}

},

interactivity:{

events:{

onhover:{
enable:true,
mode:"grab"
},

onclick:{
enable:true,
mode:"push"
}

},

modes:{

grab:{
distance:140,
line_linked:{opacity:.7}
},

push:{particles_nb:4}

}

},

retina_detect:true

})

</script>


</x-app-layout>