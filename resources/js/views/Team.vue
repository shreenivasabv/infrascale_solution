<template>

<section class="team-page">

<div class="container">

<h1 class="team-title">
Our Team
</h1>

<div class="team-grid">

<div 
class="team-card"
v-for="member in team"
:key="member.id"
>

<img 
:src="'/' + member.image"
class="team-image"
/>

<h3 class="team-name">
{{ member.name }}
</h3>

<p class="designation">
{{ member.designation }}
</p>

<p class="specialization">
Specialization: {{ member.specialization }}
</p>

<p class="experience">
Experience: {{ member.experience }}
</p>

<p class="features">
Skills: {{ member.features }}
</p>

</div>

</div>

</div>

</section>

</template>



<script setup>

import { ref, onMounted } from "vue"
import axios from "axios"

const team = ref([])

onMounted(async () => {

const response = await axios.get("/api/team")

team.value = response.data

})

</script>



<style scoped>

.team-page{
padding-top:140px;
padding-bottom:100px;
background:#020617;
color:white;
}

.container{
width:1200px;
margin:auto;
}



.team-title{
text-align:center;
font-size:48px;
margin-bottom:70px;

background:linear-gradient(90deg,#00d4ff,#22c55e);
background-clip:text;
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}



.team-grid{
display:grid;
grid-template-columns:repeat(3,1fr);
gap:40px;
}


.team-card{

background:#0f172a;
padding:35px;
border-radius:18px;
text-align:center;
transition:all .35s ease;
position:relative;

border:1px solid rgba(255,255,255,0.05);

}



.team-card:hover{

transform:translateY(-10px);

border:1px solid transparent;

background:
linear-gradient(#0f172a,#0f172a) padding-box,
linear-gradient(90deg,#00d4ff,#22c55e) border-box;

box-shadow:
0 20px 40px rgba(0,0,0,.4),
0 0 20px rgba(0,212,255,.2);

}



.team-image{

width:120px;
height:120px;
border-radius:50%;
object-fit:cover;
margin-bottom:20px;
border:3px solid rgba(255,255,255,0.1);

}



.team-name{
font-size:22px;
margin-bottom:5px;
}

.designation{
color:#38bdf8;
font-weight:500;
margin-bottom:10px;
}

.specialization{
color:#94a3b8;
font-size:14px;
margin-bottom:5px;
}

.experience{
font-size:13px;
color:#cbd5f5;
margin-bottom:10px;
}

.features{
font-size:13px;
color:#94a3b8;
}



@media(max-width:1000px){

.container{
width:90%;
}

.team-grid{
grid-template-columns:1fr 1fr;
}

}

</style>