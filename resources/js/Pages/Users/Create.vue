<template>
  <div style="padding: 2rem;">
    <h1>Create User</h1>

    <form @submit.prevent="submit">
      <div style="margin-bottom: 1rem;">
        <label>Name</label><br />
        <input v-model="form.name" type="text" />
        <div v-if="form.errors.name" style="color: red;">{{ form.errors.name }}</div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label>Email</label><br />
        <input v-model="form.email" type="email" />
        <div v-if="form.errors.email" style="color: red;">{{ form.errors.email }}</div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label>Password</label><br />
        <input v-model="form.password" type="password" />
        <div v-if="form.errors.password" style="color: red;">{{ form.errors.password }}</div>
      </div>

      <button type="submit">Save</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

const form = useForm({
  name: '',
  email: '',
  password: '',
})

const submit = () => {
  form.post('/users')
}
</script>