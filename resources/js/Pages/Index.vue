<script setup>
import MasterLayout from "@/Layouts/MasterLayout.vue";
import TaskForm from "@/Components/TaskForm.vue";
import TaskBoard from "@/Components/TaskBoard.vue";
import { TaskStatus } from "@/Enums/TaskStatus";

import { provide, ref } from "vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
    tasks: Object,
});
</script>

<template>
    <MasterLayout>
        <section>
            <div class="w-full">
                <task-board :tasks="tasks" :taskStatus="TaskStatus.ACTIVE" />
            </div>
        </section>
    </MasterLayout>
</template>
