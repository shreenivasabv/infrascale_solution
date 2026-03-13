<template>

<footer class="site-footer">

<div class="footer-container">

<div class="footer-line"></div>

<p class="copyright">
© {{ year }} <span>INFRASCALE IT SOLUTIONS</span>. All Rights Reserved.
</p>

</div>

</footer>

</template>


<script setup>

const year = new Date().getFullYear()

</script>


<style scoped>

.site-footer{
background:#020617;
padding:30px 0;
border-top:1px solid rgba(255,255,255,0.08);
}

.footer-container{
text-align:center;
width:1200px;
margin:auto;
}



.footer-line{
width:120px;
height:3px;
margin:0 auto 20px;
background:linear-gradient(90deg,#00d4ff,#22c55e);
border-radius:10px;
}



.copyright{
color:#94a3b8;
font-size:15px;
letter-spacing:.5px;
}

.copyright span{
color:#38bdf8;
font-weight:600;
}


.copyright span:hover{
color:#22c55e;
transition:.3s;
}



@media(max-width:1000px){

.footer-container{
width:90%;
}

}

</style>