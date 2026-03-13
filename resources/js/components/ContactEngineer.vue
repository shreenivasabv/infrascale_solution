<template>
  <section
    id="contact"
    class="section contact"
    ref="sectionRef"
    :class="{ visible: isVisible }"
  >
    <div class="contact-container">
      <h2>Contact an Engineer</h2>
      <p class="contact-subtitle">
        No sales pitch. Just solutions.<br />
        Direct access to our senior engineering team starts here.
      </p>

      <div class="contact-grid">
        
        <div class="contact-left contact-info">
          <h3>Get in Touch</h3>

          <ul>
            <li>
              <strong>Email</strong>
              <span>engineering@infrascale.com</span>
            </li>

            <li>
              <strong>Phone</strong>
              <span>+1 (555) 123-4567</span>
            </li>

            <li>
              <strong>Address</strong>
              <span>
                401 Infrastructure Way<br />
                San Francisco, CA 94105
              </span>
            </li>
          </ul>
        </div>

        
        <div class="contact-right">
          <form
            v-if="!submitted"
            class="contact-form"
            @submit.prevent="submitForm"
          >
            <div class="form-row">
              <input
                v-model="form.name"
                type="text"
                placeholder="Your Name"
                required
              />
              <input
                v-model="form.email"
                type="email"
                placeholder="Email Address"
                required
              />
            </div>

            <select v-model="form.environment" required>
              <option value="">Current Environment</option>
              <option>Nutanix</option>
              <option>VMware</option>
              <option>Hyper-V</option>
              <option>Proxmox</option>
              <option>Mixed / Other</option>
            </select>

            <textarea
              v-model="form.message"
              rows="4"
              placeholder="Briefly describe your environment or challenge"
              required
            ></textarea>

            <button
              type="submit"
              class="btn btn-primary contact-btn"
              :disabled="loading"
            >
              {{ loading ? "Sending..." : "Talk to an Engineer" }}
            </button>
          </form>

          
          <div v-else class="contact-success">
            <h3>Thank you for reaching out.</h3>
            <p>
              One of our senior engineers has received your request and will
              get back to you shortly.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue"


const sectionRef = ref(null)
const isVisible = ref(false)


const submitted = ref(false)
const loading = ref(false)

const form = ref({
  name: "",
  email: "",
  environment: "",
  message: ""
})


const submitForm = async () => {

  loading.value = true

  try {

    const response = await fetch("/api/contact", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(form.value)
    })

    const data = await response.json()

    if (!response.ok) {
      throw new Error(data.message)
    }

    submitted.value = true

    form.value = {
      name: "",
      email: "",
      environment: "",
      message: ""
    }

  } catch (error) {
    alert("Failed to send message")
  }

  loading.value = false
}


let observer
onMounted(() => {
  observer = new IntersectionObserver(
    ([entry]) => {
      if (entry.isIntersecting) {
        isVisible.value = true
        observer.disconnect()
      }
    },
    { threshold: 0.25 }
  )
  observer.observe(sectionRef.value)
})

onUnmounted(() => observer && observer.disconnect())
</script>