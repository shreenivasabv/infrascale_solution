<template>

<div class="service-page">

<div class="service-card">



<button class="back-btn" @click="goBack">
← Back to Services
</button>




<h1 class="title">
{{ service.title }}
</h1>

<p class="subtitle">
{{ service.hero_description }}
</p>





<div class="tabs">

<button
v-for="tab in tabs"
:key="tab"
@click="activeTab = tab"
:class="['tab', activeTab === tab ? 'active' : '']"
>
{{ tab }}
</button>

</div>





<div class="panel">

<div v-if="activeTab === 'Technologies'">

<div class="tag-grid">

<span
v-for="tech in service.technologies"
:key="tech"
class="tag"
>
{{ tech }}
</span>

</div>

</div>





<div v-if="activeTab === 'Benefits'">

<div class="tags">

<span
v-for="benefit in service.benefits"
:key="benefit"
class="tag"
>
{{ benefit }}
</span>

</div>

</div>





<div v-if="activeTab === 'Use Cases'">

<div class="tags">

<span
v-for="use in service.use_cases"
:key="use"
class="tag"
>
{{ use }}
</span>

</div>

</div>





<div v-if="activeTab === 'FAQ'">

<div
class="faq-item"
v-for="(faq,index) in service.faqs"
:key="index"
@click="toggleFAQ(index)"
>

<h3>{{ faq.question }}</h3>

<p v-if="activeFAQ === index">
{{ faq.answer }}
</p>

</div>

</div>

</div>

</div>

</div>

</template>



<script setup>

import { ref, onMounted } from "vue"
import { useRoute, useRouter } from "vue-router"
import axios from "axios"

const route = useRoute()
const router = useRouter()

const service = ref({
technologies: [],
benefits: [],
use_cases: [],
faqs: []
})

const tabs = ["Technologies"]

const activeTab = ref("Technologies")

const activeFAQ = ref(null)

const toggleFAQ = (i)=>{
activeFAQ.value = activeFAQ.value === i ? null : i
}

const goBack = ()=>{
router.back()
}

onMounted(async () => {

const res = await axios.get("/api/service/" + route.params.slug)

service.value = res.data

service.value.technologies = JSON.parse(service.value.technologies || "[]")


})

</script>



<style scoped>

.service-page{

background:#020617;

min-height:100vh;

padding:120px 20px;

display:flex;

justify-content:center;

}





.service-card{

width:1000px;

background:#132c45;

border-radius:18px;

padding:50px;

box-shadow:0 0 25px rgba(0,0,0,0.6);

animation:fadeIn 0.6s ease;

}





.title{

text-align:center;

font-size:36px;

margin-bottom:6px;

background:linear-gradient(90deg,#38bdf8,#22c55e);

background-clip:text;

-webkit-background-clip:text;

-webkit-text-fill-color:transparent;

color:transparent;

}



.subtitle{

text-align:center;

color:#94a3b8;

margin-bottom:30px;

}





.back-btn{

display:inline-block;

margin-bottom:20px;

color:#38bdf8;

border:1px solid #38bdf8;

padding:8px 16px;

border-radius:8px;

text-decoration:none;

transition:.3s;

}

.back-btn:hover{

background:#38bdf8;

color:black;

}





.tabs{

display:flex;

flex-wrap:wrap;

gap:10px;

margin-bottom:30px;

justify-content:center;

}

.tab{

padding:8px 16px;

border-radius:20px;

background:#1d3b58;

border:1px solid rgba(56,189,248,.2);

cursor:pointer;

color:#cbd5f5;

transition:.3s;

}

.tab:hover{

box-shadow:0 0 10px #38bdf8;

}

.tab.active{

background:#38bdf8;

color:black;

}





.tab-content{

margin-top:10px;

animation:fadeUp .4s ease;

}

.tab-content h2{

margin-bottom:12px;

border-bottom:2px solid rgba(56,189,248,.4);

padding-bottom:6px;

}

.tab-content p{

color:#cbd5f5;

line-height:1.7;

}





.tag-grid{

display:flex;

flex-wrap:wrap;

gap:10px;

margin-top:12px;

}

.tag{

background:#1d3b58;

padding:6px 14px;

border-radius:20px;

border:1px solid rgba(56,189,248,.2);

transition:.3s;

}

.tag:hover{

transform:translateY(-2px);

box-shadow:0 0 8px #38bdf8;

}





.architecture{

width:100%;

border-radius:12px;

margin-top:15px;

transition:.3s;

}

.architecture:hover{

transform:scale(1.03);

box-shadow:0 0 15px #38bdf8;

}




.faq-item{

background:#1d3b58;

padding:15px;

border-radius:10px;

margin-bottom:10px;

cursor:pointer;

transition:.3s;

}

.faq-item:hover{

border:1px solid #38bdf8;

}

.faq-item h3{

margin-bottom:6px;

}

.faq-item p{

color:#cbd5f5;

}





@keyframes fadeIn{

from{opacity:0;transform:translateY(20px)}
to{opacity:1;transform:translateY(0)}

}

@keyframes fadeUp{

from{opacity:0;transform:translateY(10px)}
to{opacity:1;transform:translateY(0)}

}





@media(max-width:900px){

.service-card{

width:95%;

padding:30px;

}

.tabs{

justify-content:flex-start;

}

}

</style>