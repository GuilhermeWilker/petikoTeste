<script setup>
import useDateFormatter from "@/Composables/useDateFormatter";

import { router } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    task: {
        type: Object,
        required: true,
    },
});

const { formatDate } = useDateFormatter();
const isDone = ref(props.task.done);

const toggleDone = () => {
    isDone.value = !isDone.value;

    router.put(`/task/${props.task.id}`, {
        done: isDone.value,
    });
};
</script>

<template>
    <div
        class="flex gap-2 border border-primary p-2 rounded-md shadow-sm w-80 h-[5em] mb-2"
    >
        <input
            type="checkbox"
            :checked="isDone ? '' : checked"
            @change="toggleDone"
            class="mt-1 rounded-md bg-background border-primary"
        />

        <div class="cursor-pointer">
            <p :class="task.done ? 'line-through' : ''" @click="toggleDone">
                {{ task.name }}
            </p>

            <p class="text-primary text-sm line-clamp-1 w-60">
                {{ task.description }}
            </p>

            <div class="text-[0.8rem] my-1 w-fit">
                <p class="text-text ml-40">
                    {{ formatDate(task.deadline) }}
                    <i class="fa-solid fa-stopwatch text-accent"></i>
                </p>
            </div>
        </div>
    </div>
</template>
