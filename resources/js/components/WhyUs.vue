<template>
  <section id="difference" class="section why-us">
    <div class="why-us-container">
      <h2>The Infrascale Difference</h2>

      <p class="why-us-subtitle">
        Why enterprises trust Infrascale for mission-critical infrastructure.
      </p>

      
      <div class="why-us-action">
        <button class="btn btn-primary" @click="showCards = true">
          Why Infrascale?
        </button>
      </div>

      
      <div v-if="showCards" class="why-us-grid">
        <div
          class="why-card"
          v-for="(item, index) in items"
          :key="index"
          :style="{ animationDelay: `${index * 0.15}s` }"
        >
          <h3>{{ item.title }}</h3>
          <p>{{ item.description }}</p>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'

const showCards = ref(false)

const items = [
  {
    title: 'The Power of 5',
    description:
      ' You don’t talk to salesmen. You talk to the 5 senior engineers who actually do the work. High-touch, high-expertise, zero fluff.',
  },
  {
    title: 'Vendor Agnostic, Result Driven',
    description:
      'We don’t care who made your hardware; we care that it’s optimized.',
  },
  {
    title: 'Certified to the Highest Levels',
    description:
      ' We hold the industry’s most difficult certifications (Nutanix MCI, VMware VCP, Veeam 12.3) so you don’t have to worry about the "how".',
  },
  {
    title: 'Documented Excellence',
    description:
      ' Every project concludes with a comprehensive, "board-ready" assessment report and architectural roadmap.',
  },
]
</script>