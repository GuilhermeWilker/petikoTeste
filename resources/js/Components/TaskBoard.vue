<script setup>
import TaskItem from "@/Components/TaskItem.vue";
import { inject, ref, computed } from "vue";

const props = defineProps({
  taskStatus: Number,
});

const tasks = inject("tasks");
const searchQuery = ref("");

const filteredTasks = computed(() => {
  return tasks.filter(
    (task) =>
      task.name.toLowerCase().includes(searchQuery.value.toLowerCase()) &&
      task.done == props.taskStatus
  );
});
</script>

<template>
  <div class="leading-snug mb-2 flex items-center justify-between">
    <div>
      <h2 class="text-accent font-bold text-xl" v-if="taskStatus === 0">
        Ativas <i class="fa-solid fa-inbox"></i>
      </h2>

      <h2 class="text-accent font-bold text-xl" v-else>
        Arquivadas <i class="fa-solid fa-box-archive"></i>
      </h2>
    </div>

    <div class="w-96">
      <input
        type="search"
        placeholder="Pesquise sua tarefa aqui.."
        v-model="searchQuery"
        class="p-1 px-4 border border-primary rounded-md bg-background"
      />
    </div>
  </div>

  <div class="flex flex-wrap flex-shrink gap-2 p-3 overflow-y-auto">
    <div v-for="task in filteredTasks" :key="task.id">
      <task-item :task="task" />
    </div>
  </div>
</template>
