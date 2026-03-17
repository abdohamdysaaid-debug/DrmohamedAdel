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
padding-top:120px;

}

.grid{

display:grid;
grid-template-columns:1fr;
gap:20px;
width:90%;
max-width:400px;

}

/* الكارت */

.card{

padding:25px;
border-radius:20px;

color:white;
text-align:center;

font-size:16px;
font-weight:bold;

text-decoration:none;

/* Glass Effect */
background:rgba(255,255,255,0.05);
backdrop-filter:blur(12px);

border:1px solid rgba(255,255,255,0.1);

box-shadow:
0 0 20px rgba(0,0,0,0.4),
inset 0 0 10px rgba(255,255,255,0.05);

transition:0.3s;

position:relative;
overflow:hidden;

}

/* Glow خط خفيف */

.card::before{

content:"";
position:absolute;
top:0;
left:-100%;
width:100%;
height:100%;

background:linear-gradient(120deg,transparent,rgba(255,255,255,0.2),transparent);

transition:0.5s;

}

.card:hover::before{

left:100%;

}

/* Hover */

.card:hover{

transform:translateY(-8px) scale(1.03);

box-shadow:
0 10px 40px rgba(0,0,0,0.6),
0 0 25px rgba(56,189,248,0.3);

}

/* ألوان مخصصة لكل كارت */

.blue{
border-left:4px solid #38bdf8;
}

.orange{
border-left:4px solid #f59e0b;
}

.green{
border-left:4px solid #22c55e;
}

.purple{
border-left:4px solid #a78bfa;
}

.red{
border-left:4px solid #f87171;
}

/* الأيقونة */

.icon{

font-size:28px;
margin-bottom:10px;
display:block;

filter:drop-shadow(0 0 8px rgba(255,255,255,0.3));

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

<a href="/results" class="card green">

<i class="fa-solid fa-book icon"></i>

مذكراتك

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