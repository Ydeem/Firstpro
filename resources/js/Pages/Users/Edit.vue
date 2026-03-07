<template>
  <div style="padding: 2rem;">
    <h1>Edit User</h1>

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

      <button type="submit">Update</button>
    </form>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'

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