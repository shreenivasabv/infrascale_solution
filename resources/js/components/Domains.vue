<template>
  <section id="domains" class="section domains">
    <div class="domains-container">
      <h2>Our Specialized Domains</h2>
      <p class="domains-subtitle">
        Deep expertise across the infrastructure stack — engineered, not improvised.
      </p>

      
      <div class="domains-tabs">
        <button
          v-for="(domain, index) in domains"
          :key="index"
          class="domain-tab"
          :class="{ active: activeIndex === index }"
          @click="activeIndex = index"
        >
          {{ domain.title }}
        </button>
      </div>

      
      <div class="domain-content">
        <transition name="fade-slide" mode="out-in">
          <div :key="activeIndex" class="domain-panel">
            <h3>{{ domains[activeIndex].heading }}</h3>
            <p class="domain-description">
              {{ domains[activeIndex].description }}
            </p>

            <ul>
              <li v-for="(point, i) in domains[activeIndex].points" :key="i">
                {{ point }}
              </li>
            </ul>
          </div>
        </transition>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue'

const activeIndex = ref(0)

const domains = [
  {
    title: 'Virtualization & HCI',
    heading: 'The Core',
    description:
      'We architect highly available virtualization platforms that form the backbone of your infrastructure.',
    points: [
      'Deployment, configuration & tuning',
      'Nutanix AHV, VMware vSphere, Hyper-V, Proxmox VE',
      'High-availability and DRS optimization',
      'Seamless network integration',
    ],
  },
  {
    title: 'Storage, Backup & DR',
    heading: 'The Fortress',
    description:
      'Your data is your most valuable asset — we design architectures that protect it relentlessly.',
    points: [
      'HPE MSA, Dell ME, Lenovo & NAS platforms',
      'Veeam, Commvault, Rubrik deployments',
      'Air-gapped & immutable backup designs',
      'Zero-Loss Architecture',
    ],
  },
  {
    title: 'Enterprise Platforms & DevOps',
    heading: 'The Engine',
    description:
      'We modernize identity, productivity, and automation across enterprise platforms.',
    points: [
      'Active Directory forest design & migrations',
      'Microsoft 365 tenant-to-tenant transitions',
      'Linux Installation and Configurations ',
    ],
  },
]
</script>