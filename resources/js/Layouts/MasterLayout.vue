<script setup>
import { usePage } from "@inertiajs/vue3";
import Sidebar from "@/Components/Sidebar.vue";

const user = usePage().props.auth.user;
</script>

<template>
  <div class="min-h-screen bg-background text-text flex">
    <Sidebar :user="user" />

    <main class="p-8 w-full">
      <slot />
    </main>
  </div>
</template>
