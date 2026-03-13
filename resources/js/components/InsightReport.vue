<template>
  <section
    id="insight"
    class="section insight-alt"
    ref="sectionRef"
    :class="{ visible: isVisible }"
  >
    <div class="insight-alt-container">
      
      <div class="insight-alt-left">
        <h2>The Infrascale Insight Report</h2>
        <p class="insight-alt-tagline">
          Stop guessing. Start knowing.
        </p>

        <p class="insight-alt-description">
          Our signature deliverable is more than a PDF. It’s a comprehensive map of your digital landscape.
        </p>
      </div>

      
      <div class="insight-alt-right">
        <div
          class="insight-line"
          v-for="(item, index) in items"
          :key="index"
          :style="{ transitionDelay: `${index * 0.15}s` }"
        >
          <span class="insight-index">
            {{ String(index + 1).padStart(2, '0') }}
          </span>

          <div class="insight-text">
            <h3>{{ item.title }}</h3>
            <p>{{ item.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const sectionRef = ref(null)
const isVisible = ref(false)

const items = [
  {
    title: 'Full Topology Diagrams',
    description:
      'Accurate, end-to-end infrastructure diagrams reflecting real-world state.',
  },
  {
    title: 'Critical Security Gap Analysis',
    description:
      'Identification of misconfigurations, attack surfaces, and failure domains.',
  },
  {
    title: 'Capacity & Performance Forecasting',
    description:
      'Forward-looking analysis to prevent saturation, outages, and overspend.',
  },
  {
    title: 'Step-by-Step Remediation Roadmap',
    description:
      'A prioritized execution plan aligned to risk, impact, and effort.',
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

  observer.observe(sectionRef.value)
})

onUnmounted(() => {
  if (observer) observer.disconnect()
})
</script>