<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<style>

body{

background:#0b0b0b;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
flex-direction:column;
font-family:Segoe UI;
color:white;

}

/* lamp */

.lamp-wrapper{

position:relative;
display:flex;
flex-direction:column;
align-items:center;

}

/* lamp head */

.lamp{

width:180px;
height:90px;
background:#f0f0f0;
border-radius:90px 90px 20px 20px;
position:relative;

}

/* soft light */

.light{
position:absolute;
top:60px;
left:50%;
transform:translateX(-50%);
width:420px;
height:420px;

background: radial-gradient(
circle,
rgba(255,230,150,0.6) 0%,
rgba(255,230,150,0.35) 40%,
rgba(255,230,150,0.15) 60%,
transparent 80%
);

filter:blur(35px);
pointer-events:none;

opacity:0;
transition:0.6s;
}

/* rope */

.rope{

width:3px;

height:55px;

background:white;

position:absolute;

top:60px;

left:65%;

cursor:pointer;

}

/* ball */

.ball{

width:14px;
height:14px;

background:#e6c26a;

border-radius:50%;

position:absolute;

bottom:-7px;
left:-5px;

}

/* stand */

.stand{

width:10px;
height:120px;
background:#f0f0f0;

}

/* base */

.base{

width:140px;
height:15px;
background:#f0f0f0;
border-radius:10px;

}

/* shadow */

.shadow{

width:200px;
height:25px;

background:rgba(0,0,0,0.6);

border-radius:50%;

filter:blur(8px);

}

/* login box */

.login-box{

opacity:0;

transform:translateY(20px);

transition:0.8s;

margin-top:40px;

background:rgba(255,255,255,0.08);

padding:40px;

border-radius:18px;

backdrop-filter:blur(12px);

box-shadow:0 0 25px rgba(255,255,200,0.3);

display:flex;
flex-direction:column;

gap:16px;

width:260px;

}

/* title */

.login-box h2{

text-align:center;
margin:0;

}

/* inputs */

input{

width:100%;

padding:12px;

border:none;

border-radius:8px;

background:#111;

color:white;

border:1px solid #333;

outline:none;

}

input:focus{

border-color:#f7d77f;

box-shadow:0 0 10px rgba(255,215,120,0.6);

}

/* sign in button */

button{

margin-top:10px;

padding:12px;

border:none;

border-radius:10px;

background:linear-gradient(90deg,#f7d77f,#d4a017);

font-weight:bold;

cursor:pointer;

width:100%;

color:black;

transition:0.3s;

}

button:hover{

transform:scale(1.05);

box-shadow:0 0 10px rgba(255,215,120,0.6);

}

/* swing */

@keyframes swing{

0%{transform:rotate(0)}
25%{transform:rotate(6deg)}
50%{transform:rotate(-6deg)}
75%{transform:rotate(3deg)}
100%{transform:rotate(0)}

}

</style>

</head>

<body>


<div class="lamp-wrapper">

<div class="lamp" id="lamp">

<div class="light" id="light"></div>

<div class="rope" id="rope">

<div class="ball"></div>

</div>

</div>

<div class="stand"></div>

<div class="base"></div>

<div class="shadow"></div>

</div>



<div class="login-box" id="loginBox">

<h2>Login</h2>

<form method="POST" action="/login">

@csrf

<label>Email</label>

<input type="email" name="email">

<label>Password</label>

<input type="password" name="password">

<button type="submit">Sign In</button>

</form>

</div>



<audio id="pullSound">
<source src="https://assets.mixkit.co/active_storage/sfx/2571/2571-preview.mp3">
</audio>

<audio id="clickSound">
<source src="https://assets.mixkit.co/active_storage/sfx/2568/2568-preview.mp3">
</audio>



<script>

let rope=document.getElementById("rope");

let lamp=document.getElementById("lamp");

let light=document.getElementById("light");

let login=document.getElementById("loginBox");

let pull=document.getElementById("pullSound");

let click=document.getElementById("clickSound");

let startY;

rope.addEventListener("mousedown",(e)=>{

startY=e.clientY;

document.addEventListener("mousemove",drag);

document.addEventListener("mouseup",stop);

});


function drag(e){

let move=e.clientY-startY;

if(move>0 && move<40){

rope.style.transform="translateY("+move+"px)";

}

}


function stop(){

document.removeEventListener("mousemove",drag);

document.removeEventListener("mouseup",stop);

/* rope return */

rope.style.transform="translateY(0)";

/* sounds */

pull.play();

setTimeout(()=>{

click.play();

},200);

/* light on */

light.style.opacity="1";

/* swing */

lamp.style.animation="swing 1s";

/* show login */

setTimeout(()=>{

login.style.opacity="1";

login.style.transform="translateY(0)";

},800);

}

</script>


</body>

</html>