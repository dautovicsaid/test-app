<template>
    <Head title="Create User" />
    <div class="max-w-md mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Create New User</h1>
        <Form :types="types" :fields="fields" :url="url" :required="required"/>
    </div>
</template>

<script setup>
import Form from "@/Shared/Form.vue";

let fields = {
    name: "",
    email: "",
    password: "",
};

let types = {
    name: "text",
    email: "email",
    password: "password",
};

let required = ["name", "email", "password"];

let url = "/users";
</script>



