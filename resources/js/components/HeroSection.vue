<template>
  <section id="home" class="hero">
    <div class="hero-overlay">
    

      <h1>We Don’t Just Manage IT. We Engineer Resilience.</h1>

      <p class="hero-text">
        Most IT firms provide support. We provide architectural mastery.
        From the physical rack-and-stack to complex multi-cloud migrations,
        our elite team of 5 certified engineers builds the bedrock your business grows on.
      </p>

      <div class="hero-buttons">
        <button class="btn btn-primary"
          @click="scrollToContact"
        >
          Get a Infrastructure Health Check
        </button>

        <button
          class="btn btn-outline"
          @click="scrollToTech"
        >
          Our Tech Stack
        </button>
      </div>
          </div>
  </section>
</template>

<script setup>
const scrollToTech = () => {
  const section = document.getElementById("tech")
  if (!section) return

  const headerOffset = 110
  const elementPosition = section.getBoundingClientRect().top
  const offsetPosition = elementPosition + window.scrollY - headerOffset

  window.scrollTo({
    top: offsetPosition,
    behavior: "smooth",
  })
}
const scrollToContact = () => {
  const section = document.getElementById("contact")
  if (!section) return

  const headerOffset = 110 
  const elementPosition = section.getBoundingClientRect().top
  const offsetPosition = elementPosition + window.scrollY - headerOffset

  window.scrollTo({
    top: offsetPosition,
    behavior: "smooth",
  })
}
</script>