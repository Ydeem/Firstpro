<template>
  <div class="app-page app-page--crud">
    <nav class="app-nav">
      <Link href="/">Home</Link>
      <span>/</span>
      <Link href="/users/access">Access</Link>
      <span>/</span>
      <span>Login</span>
    </nav>

    <h1 class="mb-4">Login</h1>
    <p class="mb-6">
      Enter your email and password to access the User Management Dashboard.
    </p>

    <div class="app-form-card">
      <form @submit.prevent="submit">
        <div class="app-form-field">
          <label for="email">Email</label>
          <input
            id="email"
            v-model="form.email"
            type="email"
            placeholder="Enter your email"
            required
          >
          <div v-if="form.errors.email" class="app-form-error">
            {{ form.errors.email }}
          </div>
        </div>

        <div class="app-form-field">
          <label for="password">Password</label>
          <input
            id="password"
            v-model="form.password"
            type="password"
            placeholder="Enter your password (min 8 characters)"
            required
          >
          <div v-if="form.errors.password" class="app-form-error">
            {{ form.errors.password }}
          </div>
        </div>

        <div class="app-form-actions">
          <button type="submit" class="app-btn app-btn--primary" :disabled="form.processing">
            Login
          </button>
          <Link href="/users/access" class="app-btn app-btn--secondary">
            Cancel
          </Link>
        </div>

        <p class="app-form-hint">
          Don't have an account?
          <Link href="/users/create">Create one</Link>
        </p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
  email: '',
  password: '',
})

const submit = () => {
  form.post('/login')
}
</script>
