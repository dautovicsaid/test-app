<template>
    <Head title="Login"/>
    <main class="grid place-items-center min-h-screen">
        <section class="bg-white p-8 rounded-xl max-w-md mx-auto border shadow">
            <h1 class="text-3xl mb-6">
                Login
            </h1>
            <form @submit.prevent="submit">
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 " for="email">Email</label>
                    <input v-model="form.email" class="border border-gray-400 p-2 w-full" type="text" name="email" id="email" />
                    <ErrorMessage :error="form.errors.email" />
                </div>
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 " for="password">Password</label>
                    <input v-model="form.password" class="border border-gray-400 p-2 w-full" type="password" name="password" id="password" />
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500" :disabled="form.processing">Log in</button>
                </div>
            </form>
        </section>
    </main>
</template>

<script >

export default {
    layout: null,
}

</script>

<script setup>
import {useForm} from "@inertiajs/vue3";
import ErrorMessage from "@/Shared/ErrorMessage.vue";

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    form.post('/login');
}

console.log(form.errors.email);

</script>
