<template>
  <section
    id="tech"
    class="section tech"
    ref="techSection"
    :class="{ visible: isVisible }"
  >
    <div class="tech-container">
      <h2>The Tech We Master</h2>
      <p class="tech-subtitle">
        Proven platforms. Battle-tested tools. Zero guesswork.
      </p>

      <div class="tech-grid">
        <div
          class="tech-card"
          v-for="(group, index) in tech"
          :key="index"
          :style="{ transitionDelay: `${index * 0.15}s` }"
        >
          <h3>{{ group.title }}</h3>
          <p>{{ group.items }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const techSection = ref(null)
const isVisible = ref(false)

const tech = [
  {
    title: 'Virtualization',
    items: 'Nutanix · VMware · Hyper-V · Proxmox',
  },
  {
    title: 'Storage',
    items: 'HPE · Dell · Lenovo · StoreOnce',
  },
  {
    title: 'Backup & DR',
    items: 'Veeam · Commvault · Rubrik',
  },
  {
    title: 'OS & Apps',
    items: 'Linux ·  AD · Microsoft 365 ',
  },
  
]

let observer

onMounted(() => {
  observer = new IntersectionObserver(
    ([entry]) => {
      if (entry.isIntersecting) {
        isVisible.value = true
        observer.disconnect()
      }
    },
    { threshold: 0.3 }
  )

  observer.observe(techSection.value)
})

onUnmounted(() => {
  if (observer) observer.disconnect()
})
</script>