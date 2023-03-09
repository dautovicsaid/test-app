<template>
    <Head title="Update Brand"/>
    <div class="max-w-xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Edit Brand</h1>
        <Form :imagePath="props.brand.image.path" :types="types" :fields="fields" :url="url" :required="required"/>
    </div>
</template>

<script setup>
import Form from "@/Shared/Form.vue";

let props = defineProps({
    brand: {
        type: Object,
        required: true
    }
});
let fields = {
    name: props.brand.name,
    description: props.brand.description,
    image: '',
};

let types = {
    name: "text",
    description: "textarea",
    image: "file",
};

let url = "/brands/" + props.brand.id;

let required = ["name"];
</script>
