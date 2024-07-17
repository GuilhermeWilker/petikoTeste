<script setup>
import { ref } from "vue";
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

const submitForm = () => {
    const deadlineDate = new Date(form.deadline);
    const now = new Date();

    if (deadlineDate <= now) {
        alert("A data de vencimento deve ser uma data futura.");
        return;
    }

    form.post("/task");
};
</script>

<template>
    <div class="w-full">
        <h3 class="text-lg text-primary font-bold block my-4">
            <i class="fa-solid fa-list-check"></i> Criar tarefa
        </h3>

        <form
            @submit.prevent="submitForm"
            class="w-full p-4 border border-primary rounded-md"
        >
            <div class="w-full mb-2">
                <label for="title" class="block font-bold my-1">Título:</label>
                <input
                    required
                    v-model="form.name"
                    type="text"
                    id="title"
                    class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    placeholder="Descascar Amendoins"
                />
            </div>

            <div class="w-full my-2">
                <label for="description" class="block font-bold my-1"
                    >Descrição:</label
                >
                <input
                    required
                    v-model="form.description"
                    type="text"
                    id="description"
                    class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    placeholder="Utilizar martelinho de madeira"
                />
            </div>

            <!-- Flex col-2 -->
            <div class="flex items-center gap-3 my-2">
                <div class="w-full">
                    <label for="user" class="block font-bold my-1"
                        >Designar tarefa:</label
                    >
                    <select
                        required
                        v-model="form.user_id"
                        id="user"
                        class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    >
                        <option
                            v-for="user in props.users.data"
                            :key="user.id"
                            :value="user.id"
                        >
                            {{ user.name }}
                        </option>
                    </select>
                </div>

                <div class="w-full">
                    <label for="deadline" class="block font-bold my-1"
                        >Encerramento:</label
                    >
                    <input
                        required
                        v-model="form.deadline"
                        type="datetime-local"
                        id="deadline"
                        class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    />
                </div>
            </div>

            <button
                class="p-2 px-4 border rounded-sm border-primary bg-background w-full hover:bg-primary hover:text-background my-4"
            >
                Adicionar tarefa
            </button>
        </form>
    </div>
</template>
