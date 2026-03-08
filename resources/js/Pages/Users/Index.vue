<template>
  <div class="app-page app-page--crud">
    <nav class="app-nav">
      <Link href="/">Home</Link>
      <span>/</span>
      <span>Users</span>
    </nav>
    <h1 class="mb-6">Users</h1>

    <Link
      href="/users/create"
      class="app-btn app-btn--primary"
    >
      Create User
    </Link>

    <div
      v-if="$page.props.flash?.message"
      class="app-flash app-flash--success"
    >
      {{ $page.props.flash.message }}
    </div>

    <table class="mt-6">
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
            <div class="app-actions">
              <Link
                :href="`/users/${user.id}/edit`"
                class="app-btn app-btn--primary"
              >
                Edit
              </Link>
              <button
                type="button"
                class="app-btn app-btn--danger"
                @click="deleteUser(user.id)"
              >
                Delete
              </button>
            </div>
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