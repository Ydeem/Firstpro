<template>
  <div style="padding: 2rem;">
    <h1>Users</h1>

    <Link href="/users/create">Create User</Link>

    <div v-if="$page.props.flash?.message" style="margin: 1rem 0; color: green;">
      {{ $page.props.flash.message }}
    </div>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 1rem; width: 100%;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th style="width: 180px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <Link :href="`/users/${user.id}/edit`">Edit</Link>
            <button @click="deleteUser(user.id)" style="margin-left: 10px;">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { Link, router } from '@inertiajs/vue3'

defineProps({
  users: Array
})

const deleteUser = (id) => {
  if (confirm('Are you sure you want to delete this user?')) {
    router.delete(`/users/${id}`)
  }
}
</script>