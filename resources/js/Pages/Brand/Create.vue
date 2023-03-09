<template>
    <Head title="Create Brand"/>
    <div class="max-w-xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Create New User</h1>
        <Form :types="types" :fields="fields" :url="url" :required="required"/>
    </div>
</template>

<script setup>
import Form from "@/Shared/Form.vue";

let fields = {
    name: "",
    description: "",
    image: "",
};

let types = {
    name: "text",
    description: "textarea",
    image: "file",
};

let url = "/brands";

let required = ["name", "image"];
</script>
