<template>
  <div class="app-page app-page--crud">
    <nav class="app-nav">
      <Link href="/">Home</Link>
      <span>/</span>
      <Link href="/users">Users</Link>
      <span>/</span>
      <span>Create</span>
    </nav>
    <h1 class="mb-6">Create User</h1>

    <div class="app-form-card">
      <form @submit.prevent="submit">
        <div class="app-form-field">
          <label for="name">Name</label>
          <input
            id="name"
            v-model="form.name"
            type="text"
            placeholder="Enter name"
          >
          <div v-if="form.errors.name" class="app-form-error">
            {{ form.errors.name }}
          </div>
        </div>

        <div class="app-form-field">
          <label for="email">Email</label>
          <input
            id="email"
            v-model="form.email"
            type="email"
            placeholder="Enter email"
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
            placeholder="Enter password"
          >
          <div v-if="form.errors.password" class="app-form-error">
            {{ form.errors.password }}
          </div>
        </div>

        <div class="app-form-actions">
          <button type="submit" class="app-btn app-btn--primary">
            Save
          </button>
          <Link href="/users/access" class="app-btn app-btn--secondary">
            Cancel
          </Link>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
})

const submit = () => {
  form.post('/users')
}
</script>
