<template>
  <div class="home-page">
    <nav class="home-nav">
      <Link href="/users">Users</Link>
    </nav>
    <div class="home-hero">
      <h1 class="home-title">Welcome to Npontu Technologies</h1>
      <p class="home-subtitle">Your Laravel + Vue + Inertia app is working.</p>
      <Link href="/users" class="app-btn app-btn--primary home-cta">
        View Users
      </Link>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>
