<script setup>
import TaskItem from "@/Components/TaskItem.vue";
import { inject, ref, computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    taskStatus: Number,
    tasks: Object,
});

const searchQuery = ref("");

const filteredTasks = computed(() => {
    return props.tasks.data.filter(
        (task) =>
            task.name.toLowerCase().includes(searchQuery.value.toLowerCase()) &&
            task.done == props.taskStatus
    );
});
</script>

<template>
    <div class="leading-snug mb-2 flex items-center justify-between relative">
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

    <div class="flex items-center gap-3 absolute bottom-10">
        <div v-for="page in props.tasks.links" :key="page.label">
            <Link
                :href="page.url"
                v-if="page.url"
                class="mx-1 px-2 py-1 border rounded"
                :class="{
                    'bg-blue-500 text-white': page.active,
                    'text-blue-500': !page.active,
                }"
            >
                <span v-html="page.label"></span>
            </Link>
            <span
                v-else
                class="mx-1 px-2 py-1 border rounded"
                v-html="page.label"
            ></span>
        </div>
    </div>
</template>
