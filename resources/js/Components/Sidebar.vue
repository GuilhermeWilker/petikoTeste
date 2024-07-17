<script setup>
import SidebarLink from "./SidebarLink.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    user: Object,
});
</script>

<template>
    <div class="min-w-[16em] w-fit bg-tertiary relative">
        <div class="flex items-center font-bold text-xl p-4">
            <i class="fa-solid fa-user-astronaut"></i>
            <a href="">TicTask</a>
        </div>

        <div class="text-[.95em] font-medium">
            <!-- divider -->
            <p class="text-sm text-primary font-bold px-2 mb-1 mt-4">Páginas</p>

            <sidebar-link :url="'/'" :icon="'inbox'">Inbox</sidebar-link>

            <sidebar-link :url="'/archived'" :icon="'box-archive'">
                Arquivados
            </sidebar-link>

            <!-- divider -->
            <div v-if="props.user?.is_admin">
                <p class="text-sm text-primary font-bold px-2 mb-1 mt-4">
                    Administrativo
                </p>

                <sidebar-link :url="'/admin'" :icon="'chart-line'">
                    Dashboard
                </sidebar-link>

                <sidebar-link :url="'/admin/create/user'" :icon="'users'">
                    Novo usuário
                </sidebar-link>
            </div>
        </div>

        <div class="flex items-center absolute bottom-2">
            <div
                class="p-2 px-7 rounded-sm text-center w-full bg-tertiary text-text flex items-center gap-3 hover:underline"
            >
                <div class="p-1 px-2 border border-primary rounded-md">
                    <i class="fa-solid fa-door-open"></i>
                </div>

                <p>{{ props.user.name }}</p>
            </div>
        </div>
    </div>
</template>
