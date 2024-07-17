<script setup>
import MasterLayout from "@/Layouts/MasterLayout.vue";
import TaskBoard from "@/Components/TaskBoard.vue";

import { TaskStatus } from "@/Enums/TaskStatus";
import { provide } from "vue";

const props = defineProps({
    tasks: Object,
});
</script>

<template>
    <MasterLayout>
        <task-board :tasks="tasks" :taskStatus="TaskStatus.INACTIVE" />
    </MasterLayout>
</template>
