<template>

<div>

<section class="company-page">

<div class="container">

<h1 class="title">
{{ about.heading }}
</h1>

<p class="description">
{{ about.description }}
</p>

</div>

</section>


<section class="mission-section">

<div class="container mission-grid">

<div class="info-card mission-card">

<div class="icon">🚀</div>

<h2>Our Mission</h2>

<p>{{ about.mission }}</p>

</div>


<div class="info-card vision-card">

<div class="icon">🌍</div>

<h2>Our Vision</h2>

<p>{{ about.vision }}</p>

</div>

</div>

</section>

</div>

</template>


<script setup>

import { ref, onMounted } from "vue"
import axios from "axios"

const about = ref({})

onMounted(async () => {

const response = await axios.get("/api/company")

about.value = response.data

})

</script>


<style scoped>

.company-page{
padding:120px 0 80px;
background:#020617;
color:white;
}

.container{
width:1200px;
margin:auto;
}



.title{
font-size:48px;
margin-bottom:30px;
text-align:center;
background:linear-gradient(90deg,#00d4ff,#22c55e);
background-clip:text;
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}

.description{
font-size:20px;
line-height:1.7;
color:#94a3b8;
text-align:center;
max-width:900px;
margin:auto;
}




.mission-section{
padding:40px 0 80px;
background:#020617;
}

.mission-grid{
display:grid;
grid-template-columns:1fr 1fr;
gap:40px;
margin-top:20px;
}




.info-card{
background:rgba(15,23,42,0.6);
backdrop-filter:blur(10px);
border:1px solid rgba(255,255,255,0.08);
padding:50px;
border-radius:18px;
text-align:center;
transition:all .35s ease;
position:relative;
overflow:hidden;
}




.info-card:hover{

transform:translateY(-12px) scale(1.02);

box-shadow:
0 20px 40px rgba(0,0,0,.4),
0 0 25px rgba(0,212,255,.25);

border:1px solid rgba(0,212,255,.4);

}




.icon{
font-size:40px;
margin-bottom:20px;
}




.info-card h2{
font-size:28px;
margin-bottom:20px;
color:#38bdf8;
}

.info-card p{
color:#cbd5f5;
line-height:1.7;
font-size:17px;
}




@media(max-width:1000px){

.container{
width:90%;
}

.mission-grid{
grid-template-columns:1fr;
}

}

</style>