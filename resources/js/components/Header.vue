<template>
  <header class="site-header">
    <div class="header-container">
      
      <div class="logo">
        <a href="#home">
          <img src="../assets/logo_main (1).png" alt="Infrascale Solutions" />
        </a>
      </div>

      
      <nav class="nav">
        <router-link to="/">Home</router-link>

      <nav class="nav">
        <router-link to="/company">About Us</router-link>
      </nav> 
      
      <nav class="nav">
        <router-link to="/team">Team</router-link>
      </nav>

        
        <div class="nav-item has-dropdown">
          <span>Our Expertise</span>
          <div class="dropdown">
            <router-link to="/virtualization">Virtualization</router-link>
            <router-link to="/storage-backup">Storage & Backup</router-link>
            
          </div>
        </div>

        <a href="#contact">
          Contact Us
        </a>

        
        <div class="dots-menu">
          <span class="dots">⋮</span>

          <div class="admin-dropdown">
            <a href="/login">Admin Login</a>
          </div>
        </div>
      </nav>
    </div>
  </header>
</template>

<script setup>

</script>