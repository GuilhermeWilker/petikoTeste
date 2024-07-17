<script setup>
const props = defineProps({
    user: Object,
    completedTasks: Number,
    pendingTasks: Number,
});
</script>

<template>
    <div
        class="gap-2 border border-primary p-2 rounded-md shadow-sm w-full h-[5em] mb-2"
    >
        <div class="flex items-center justify-between">
            <p class="font-bold">{{ user.name }}</p>
            <p class="text-[.8em]">{{ user.email }}</p>
        </div>
        <div class="flex justify-end items-center gap-2 text-[.8em]">
            <p class="text-primary">
                {{ completedTasks }} concluídas / {{ pendingTasks }} Pendentes
            </p>
            <i class="fa-solid fa-list-check text-accent"></i>
        </div>
    </div>
</template>
