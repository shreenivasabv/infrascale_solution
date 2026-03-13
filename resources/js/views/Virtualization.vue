<template>

<section class="service-page">

  <div class="container">

    <h1 class="page-title">
      Virtualization
    </h1>

    <div class="service-grid">

      <div 
        class="service-card"
        v-for="service in services"
        :key="service.id"
        @click="openService(service.title)"
        >

        <img :src="'/' + service.image" class="service-image">

        <h3>{{ service.title }}</h3>

        <p>{{ service.description }}</p>

        </div>
        

    </div>

  </div>

</section>

</template>

<script setup>

import { ref, onMounted } from "vue"
import axios from "axios"

const services = ref([])

onMounted(async () => {

const response = await axios.get("/api/services/Virtualization")

services.value = response.data

})
import { useRouter } from "vue-router"

const router = useRouter()

const openService = (title) => {

router.push("/service/" + title.toLowerCase())

}

</script>

<style scoped>

.service-page{

padding-top:140px;
padding-bottom:100px;
background:#020617;
color:white;

}

.container{

width:1200px;
margin:auto;

}




.page-title{

text-align:center;
font-size:48px;
margin-bottom:70px;

background:linear-gradient(90deg,#38bdf8,#22c55e);
background-clip:text;
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;

}




.service-grid{

display:grid;
grid-template-columns:repeat(3,1fr);
gap:40px;

}




.service-card{

background:#0f172a;
padding:25px;
border-radius:18px;
text-align:center;
transition:all .35s ease;
border:1px solid rgba(255,255,255,0.05);
cursor:pointer;

}




.service-card:hover{

transform:translateY(-10px);

background:
linear-gradient(#0f172a,#0f172a) padding-box,
linear-gradient(90deg,#38bdf8,#22c55e) border-box;

border:1px solid transparent;

box-shadow:
0 20px 40px rgba(0,0,0,.4),
0 0 20px rgba(0,212,255,.25);

}




.service-image{

width:100%;
height:180px;
object-fit:cover;
border-radius:10px;
margin-bottom:20px;

}



.service-title{

font-size:22px;
margin-bottom:10px;

}

.service-description{

color:#94a3b8;
font-size:14px;

}




@media(max-width:1000px){

.container{

width:90%;

}

.service-grid{

grid-template-columns:1fr 1fr;

}

}

</style>