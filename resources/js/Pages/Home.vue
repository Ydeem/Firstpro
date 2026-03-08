<template>
  <div class="home-page">
    <div class="home-bg neptune-motion" aria-hidden="true">
      <!-- Video background (place file in public/assets/npontu/neptune-point.mp4) -->
      <video
        v-show="useVideo"
        class="neptune-video"
        :src="videoSrc"
        autoplay
        muted
        loop
        playsinline
        @error="useVideo = false"
      />
      <!-- Image fallback when no video or video fails to load -->
      <template v-if="!useVideo">
        <div
          class="neptune-layer neptune-layer--back"
          :style="{ backgroundImage: `url('${neptuneImage}')` }"
        ></div>
        <div
          class="neptune-layer neptune-layer--mid"
          :style="{ backgroundImage: `url('${neptuneImage}')` }"
        ></div>
        <div class="neptune-layer neptune-layer--ambient"></div>
      </template>
      <div class="home-bg-overlay"></div>
    </div>
    <nav class="home-nav">
      <Link href="/login">Login</Link>
    </nav>
    <div class="home-hero">
      <h1 class="home-title">Welcome to Npontu Technologies</h1>
      <p class="home-subtitle">User Management Dashboard</p>
      <Link href="/users/access" class="app-btn app-btn--primary home-cta">
        View Users
      </Link>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

// Background: video if file exists, else image.
// Video: put file in  public/assets/npontu/neptune-point.mp4  (or .webm)
// Image: put file in  public/assets/npontu/neptune-point.png
const useVideo = ref(true)
const videoSrc = ref('/assets/npontu/neptune-point.mp4')
const neptuneImage = ref('/assets/npontu/neptune-point.png')
</script>
