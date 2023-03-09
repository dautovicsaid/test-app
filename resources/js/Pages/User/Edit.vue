<template>
    <Head title="Update User"/>
    <div class="max-w-md mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Update User</h1>
        <Form :types="types" :fields="fields" :url="url" :required="required"/>
    </div>
</template>

<script setup>
import Form from "@/Shared/Form.vue";

let props = defineProps({
    user: {
        type: Object,
        required: true
    }
});
let fields = {
    name: props.user.name,
    email: props.user.email,
    password: '',
};

let types = {
    name: "text",
    email: "email",
    password: "password",
};

let url = "/users/" + props.user.id + "/update";

let required = ["name", "email", "password"];
</script>
