<script setup>
import MasterLayout from "@/Layouts/MasterLayout.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: null,
    email: null,
    password: null,
    is_admin: null,
    errors: {},
});

const submitForm = () => {
    form.post("/user");

    form.name = null;
    form.email = null;
    form.password = null;
    form.is_admin = null;
};
</script>

<template>
    <MasterLayout>
        <h2 class="text-accent font-bold text-xl">
            Novo usuário <i class="fa-solid fa-users"></i>
        </h2>

        <div class="w-full flex gap-6 my-5">
            <form
                @submit.prevent="submitForm"
                class="w-96 mx-auto p-4 border border-primary rounded-md"
            >
                <div class="w-full mb-2">
                    <label for="title" class="block font-bold my-1"
                        >Nome:</label
                    >
                    <input
                        v-model="form.name"
                        type="text"
                        id="title"
                        class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                        placeholder="Ana Banana"
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
                        >E-mail:</label
                    >
                    <input
                        v-model="form.email"
                        type="text"
                        id="email"
                        class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                        placeholder="anabanana@petiko.com"
                    />

                    <span
                        v-if="form.errors.email"
                        class="block text-[.9em] text-red-500 font-medium"
                    >
                        {{ form.errors.email }}
                    </span>
                </div>

                <div class="w-full my-2">
                    <label for="description" class="block font-bold my-1"
                        >Senha:</label
                    >
                    <input
                        v-model="form.password"
                        type="text"
                        id="password"
                        class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                        placeholder="*********"
                    />

                    <span
                        v-if="form.errors.password"
                        class="block text-[.9em] text-red-500 font-medium"
                    >
                        {{ form.errors.password }}
                    </span>
                </div>

                <div class="w-full my-2">
                    <label for="user" class="block font-bold my-1"
                        >Possui privilégios de administrador?</label
                    >
                    <select
                        v-model="form.is_admin"
                        id="user"
                        class="p-2 px-4 border rounded-sm border-primary bg-background w-full"
                    >
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>

                    <span
                        v-if="form.errors.is_admin"
                        class="block text-[.9em] text-red-500 font-medium"
                    >
                        {{ form.errors.is_admin }}
                    </span>
                </div>

                <button
                    class="p-2 px-4 border rounded-sm border-primary bg-background w-full hover:bg-primary hover:text-background my-4"
                >
                    Adicionar usuário
                </button>
            </form>
        </div>
    </MasterLayout>
</template>
