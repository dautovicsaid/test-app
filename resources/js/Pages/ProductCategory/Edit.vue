<template>
    <Head title="Update Product Category"/>
    <div class="max-w-xl mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Edit product category</h1>
        <Form :imagePath="props.productCategory.image.path" :types="types" :fields="fields" :url="url" :required="required"/>
    </div>
</template>

<script setup>
import Form from "@/Shared/Form.vue";

let props = defineProps({
    productCategory: {
        type: Object,
        required: true
    }
});
let fields = {
    name: props.productCategory.name,
};

let types = {
    name: "text",
};

let url = "/product-category/" + props.productCategory.id;

let required = ["name"];
</script>
