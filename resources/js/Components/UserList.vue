<script setup>
import UserItem from "@/Components/UserItem.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    users: Object,
});
</script>

<template>
    <div class="p-2 w-full overflow-y-auto">
        <h3 class="text-lg text-primary font-bold block my-4">
            Usuários cadastrados
        </h3>

        <template v-if="props.users.data.length">
            <user-item
                v-for="user in users.data"
                :key="user.id"
                :user="user"
                :completedTasks="user.completed_tasks_count"
                :pendingTasks="user.pending_tasks_count"
            />
        </template>

        <template v-else>
            <p>Nenhum usuário encontrado.</p>
        </template>

        <Link
            v-if="props.users.prev_page_url"
            :href="props.users.prev_page_url"
            class="text-primary hover:underline"
            >&lt; Anterior</Link
        >
        <span class="mx-2">{{ props.users.current_page }}</span>
        <Link
            v-if="props.users.next_page_url"
            :href="props.users.next_page_url"
            class="text-primary hover:underline"
            >Próximo &gt;</Link
        >
    </div>
</template>
