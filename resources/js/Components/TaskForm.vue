<script setup>
import { inject } from "vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    user_id: null,
    name: null,
    description: null,
    deadline: null,
    errors: {},
});

const submitForm = () => {
    const deadlineDate = new Date(form.deadline);
    const now = new Date();

    if (deadlineDate <= now) {
        alert("A data de vencimento deve ser uma data futura.");
        return;
    }

    form.post("/task")
        .then(() => {
            form.user_id = null;
            form.name = null;
            form.description = null;
            form.deadline = null;
        })
        .catch((error) => {
            if (error.response.status === 422) {
                form.errors = error.response.data.errors;
            }
        });
};

const users = inject("users");
</script>

<template>
    <div class="w-full">
        <h3 class="text-lg text-primary font-bold block my-4">
            Criar tarefa <i class="fa-regular fa-circle-check"></i>
        </h3>

        <form
            @submit.prevent="submitForm"
            class="w-full p-4 border border-primary rounded-md"
        >
            <div class="w-full mb-2">
                <label for="title" class="block font-bold my-1">Título:</label>
                <input
                    v-model="form.name"
                    type="text"
                    id="title"
                    class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    placeholder="Descascar Amendoins"
                />

                <span
                    v-if="form.errors.name"
                    class="block text-[.9em] text-red-500 font-medium"
                >
                    {{ form.errors.name }}
                </span>
            </div>

            <div class="w-full my-2">
                <label for="description" class="block font-bold my-1"
                    >Descrição:</label
                >
                <input
                    v-model="form.description"
                    type="text"
                    id="description"
                    class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    placeholder="Utilizar martelinho de madeira"
                />

                <span
                    v-if="form.errors.description"
                    class="block text-[.9em] text-red-500 font-medium"
                >
                    {{ form.errors.description }}
                </span>
            </div>

            <!-- Flex col-2 -->
            <div class="flex items-center gap-3 my-2">
                <div class="w-full">
                    <label for="user" class="block font-bold my-1"
                        >Designar tarefa:</label
                    >
                    <select
                        v-model="form.user_id"
                        id="user"
                        class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    >
                        <option
                            v-for="user in users.data"
                            :key="user.id"
                            :value="user.id"
                        >
                            {{ user.name }}
                        </option>
                    </select>

                    <span
                        v-if="form.errors.user_id"
                        class="block text-[.9em] text-red-500 font-medium"
                    >
                        {{ form.errors.user_id }}
                    </span>
                </div>

                <div class="w-full">
                    <label for="deadline" class="block font-bold my-1"
                        >Encerramento:</label
                    >
                    <input
                        v-model="form.deadline"
                        type="datetime-local"
                        id="deadline"
                        class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    />

                    <span
                        v-if="form.errors.deadline"
                        class="block text-[.9em] text-red-500 font-medium"
                    >
                        {{ form.errors.deadline }}
                    </span>
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
