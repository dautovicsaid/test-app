<template>
    <Head title="Create Product Category"/>
    <div class="max-w-xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Create new product category</h1>
        <Form :types="types" :fields="fields" :url="url" :required="required"/>
    </div>
</template>

<script setup>
import Form from "@/Shared/Form.vue";

let fields = {
    name: "",
};

let types = {
    name: "text",
};

let url = "/product-categories";

let required = ["name"];
</script>
