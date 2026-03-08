<template>
  <div class="app-page app-page--crud">
    <nav class="app-nav app-nav--space">
      <div class="app-breadcrumb">
        <Link href="/">Home</Link>
        <span>/</span>
        <span>Access Users</span>
      </div>
    </nav>

    <div class="access-grid">
      <div class="access-main">
        <div class="access-pill">Step 1 · Get access</div>
        <h1 class="access-title">Sign in or create your Npontu account</h1>
        <p class="access-subtitle">
          Secure access to the User Management Dashboard. Existing users can log in, and new team
          members can create an account in a few seconds.
        </p>

        <div class="access-actions">
          <Link href="/login" class="app-btn app-btn--primary access-btn access-btn--primary">
            Login (Existing User)
          </Link>
          <Link href="/users/create" class="app-btn app-btn--secondary access-btn">
            Create New Account
          </Link>
        </div>
      </div>

      <div class="access-illustration" aria-hidden="true">
        <div class="access-card">
          <img
            :src="crudBg"
            alt=""
            class="access-image"
          >
          <div class="access-stats">
            <div>
              <div class="access-label">Active users</div>
              <div class="access-value">Real-time overview</div>
            </div>
            <div>
              <div class="access-label">Secure access</div>
              <div class="access-value">Auth & audit ready</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

const crudBg = '/assets/npontu/crud-bg.png'
</script>

