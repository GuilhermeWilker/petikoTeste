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

provide("tasks", props.tasks);
</script>

<template>
  <MasterLayout>
    <section>
      <div class="w-full">
        <task-board :taskStatus="TaskStatus.ACTIVE" />
      </div>
    </section>
  </MasterLayout>
</template>
