<script setup>
import MasterLayout from "@/Layouts/MasterLayout.vue";
import TaskBoard from "@/Components/TaskBoard.vue";

import { TaskStatus } from "@/Enums/TaskStatus";
import { provide } from "vue";

const props = defineProps({
  tasks: Object,
});

provide("tasks", props.tasks);
</script>

<template>
  <MasterLayout>
    <task-board :taskStatus="TaskStatus.INACTIVE" />
  </MasterLayout>
</template>
