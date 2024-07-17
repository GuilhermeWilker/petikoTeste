<script setup>
import MasterLayout from "@/Layouts/MasterLayout.vue";
import TaskForm from "@/Components/TaskForm.vue";
import UserList from "@/Components/UserList.vue";

import { provide } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    users: Object,
});

const form = useForm({
    user_id: null,
    name: null,
    description: null,
    deadline: null,
});

provide("users", props.users);
</script>

<template>
    <MasterLayout>
        <h2 class="text-accent font-bold text-xl">
            Dashboard <i class="fa-solid fa-chart-line"></i>
        </h2>

        <div class="w-full flex gap-6 my-5">
            <task-form :users="props.users" />

            <user-list :users="props.users" />
        </div>
    </MasterLayout>
</template>
