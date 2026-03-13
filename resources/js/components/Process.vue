<template>
  <section
    id="process"
    class="section blueprint-pipeline"
    ref="sectionRef"
    :class="{ visible: isVisible }"
  >
    <div class="blueprint-pipeline-container">
      <h2>The Infrascale Blueprint</h2>
      <p class="blueprint-pipeline-subtitle">
        A structured, end-to-end infrastructure engineering flow.
      </p><br>

      <div class="pipeline">
        <div
          v-for="(step, index) in steps"
          :key="index"
          class="pipeline-step"
          :style="{ transitionDelay: `${index * 0.15}s` }"
        >
          <div class="pipeline-card">
            <span class="step-badge">
                {{ index + 1 }}
            </span>
            <h3>{{ step.title }}</h3>
            <p>{{ step.description }}</p>
          </div>

          
          <div
            v-if="index !== steps.length - 1"
            class="pipeline-arrow"
          >
            ↓
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

const steps = [
  {
    title: 'Discover',
    description:
      'Deep-dive into your current environment.',
  },
  {
    title: 'Assess',
    description:
      'We find the hidden risks and performance gaps.',
  },
  {
    title: 'Report',
    description:
      'You get a detailed "Infrastructure Health Report" and Risk Matrix.',
  },
  {
    title: 'Implement',
    description:
      ' Our engineers execute the build or migration with surgical precision.',
  },
  {
    title: 'Optimize',
    description:
      'Continuous tuning to ensure peak performance as you scale.',
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

onUnmounted(() => observer && observer.disconnect())
</script>