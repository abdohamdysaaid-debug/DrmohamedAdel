<x-app-layout>

<div style="padding:40px">

<h2>لوحة إدارة الطلاب</h2>

@php
$students = App\Models\User::where('role','student')->get();
$total = $students->count();
$expired = $students->where('subscription_end','<',now())->count();
$active = $students->where('subscription_end','>=',now())->count();
@endphp


<!-- الإحصائيات -->

<div style="display:flex;gap:20px;margin-bottom:30px">

<div style="background:#f3f3f3;padding:20px;border-radius:8px">
عدد الطلاب<br>
<strong>{{ $total }}</strong>
</div>

<div style="background:#d1fae5;padding:20px;border-radius:8px">
الطلاب النشطين<br>
<strong>{{ $active }}</strong>
</div>

<div style="background:#fee2e2;padding:20px;border-radius:8px">
الاشتراك منتهي<br>
<strong>{{ $expired }}</strong>
</div>

</div>


<!-- البحث -->

<input type="text" id="searchStudent"
placeholder="بحث عن طالب..."
style="padding:10px;width:300px;border:1px solid #ccc;border-radius:6px;margin-bottom:20px">


<!-- فلتر -->

<select id="filterStatus" style="padding:10px;margin-left:20px">

<option value="all">كل الطلاب</option>
<option value="active">النشطين</option>
<option value="expired">المنتهية اشتراكاتهم</option>

</select>


<!-- جدول الطلاب -->

<table border="1" width="100%" id="studentsTable"
style="border-collapse:collapse;text-align:center;margin-top:20px">

<tr style="background:#f3f3f3">

<th>الاسم</th>
<th>الايميل</th>
<th>المجموعة</th>
<th>التقييم</th>
<th>الاشتراك ينتهي</th>
<th>الأيام المتبقية</th>
<th>تحكم</th>

</tr>


@foreach($students as $student)

@php

$days = \Carbon\Carbon::parse($student->subscription_end)->diffInDays(now(),false);

@endphp

<tr class="
@if($student->subscription_end < now())
expired
@endif
">

<td>{{ $student->name }}</td>

<td>{{ $student->email }}</td>

<td>{{ $student->group }}</td>

<td>{{ $student->rating }}</td>

<td>{{ $student->subscription_end }}</td>


<td>

@if($student->subscription_end < now())

<span style="color:red">منتهي</span>

@elseif($days <= 3)

<span style="color:orange">{{ $days }} أيام</span>

@else

<span style="color:green">{{ $days }} أيام</span>

@endif

</td>


<td>

<!-- تجديد -->

<form method="POST" action="/renew/{{ $student->id }}" style="display:inline">

@csrf

<button style="
background:#22c55e;
color:white;
border:none;
padding:6px 12px;
border-radius:4px;
cursor:pointer
">

تجديد شهر

</button>

</form>


<!-- حذف -->

<form method="POST" action="/students/delete/{{ $student->id }}" style="display:inline">

@csrf

<button style="
background:red;
color:white;
border:none;
padding:6px 12px;
border-radius:4px;
cursor:pointer
">

حذف

</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>


<script>

let search = document.getElementById("searchStudent");

search.addEventListener("keyup",function(){

let value = this.value.toLowerCase();

let rows = document.querySelectorAll("#studentsTable tr");

rows.forEach(function(row){

if(row.innerText.toLowerCase().includes(value)){

row.style.display="";

}else{

row.style.display="none";

}

});

});


let filter = document.getElementById("filterStatus");

filter.addEventListener("change",function(){

let rows = document.querySelectorAll("#studentsTable tr");

rows.forEach(function(row){

if(filter.value === "expired"){

if(row.classList.contains("expired")){

row.style.display="";

}else{

row.style.display="none";

}

}

else if(filter.value === "active"){

if(!row.classList.contains("expired")){

row.style.display="";

}else{

row.style.display="none";

}

}

else{

row.style.display="";

}

});

});

</script>

</x-app-layout>