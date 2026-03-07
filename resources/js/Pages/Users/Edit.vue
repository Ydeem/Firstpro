<template>
  <div class="app-page">
    <nav class="app-nav">
      <Link href="/">Home</Link>
      <span>/</span>
      <Link href="/users">Users</Link>
      <span>/</span>
      <span>Edit</span>
    </nav>
    <h1 class="mb-6">Edit User</h1>

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

        <div class="app-form-actions">
          <button type="submit" class="app-btn app-btn--primary">
            Update
          </button>
          <Link href="/users" class="app-btn app-btn--secondary">
            Cancel
          </Link>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'

const props = defineProps({
  user: Object
})

const form = useForm({
  name: props.user.name,
  email: props.user.email,
})

const submit = () => {
  form.put(`/users/${props.user.id}`)
}
</script>
