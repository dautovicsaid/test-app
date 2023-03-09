<template>
    <Head title="Create Car Model"/>
    <div class="max-w-md mx-auto mt-8 bg-white shadow-md rounded-lg p-6">
        <h1 class="text-3xl font-bold mb-4">Create New Car Model</h1>
        <form @submit.prevent="onSubmit">
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.name" type="text" name="name" id="name"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       :placeholder="`Enter name here`" required/>
                <label for="name"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                <ErrorMessage :error="form.errors.name"/>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.description" type="text" name="description" id="description"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       :placeholder="`Enter description here`" required/>
                <label for="description"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                <ErrorMessage :error="form.errors.description"/>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="brand_id" class="text-sm text-gray-500 dark:text-gray-400">Brand</label>
                <select v-model="form.brand_id" id="brand_id" name="brand_id" autocomplete="brand_id"
                        class="block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="" disabled selected>Select Brand</option>
                    <option v-for="brand in brands" :value="brand.id">{{ brand.name }}</option>
                </select>
                <ErrorMessage :error="form.errors.brand_id"/>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload
                    file</label>
                <input @input="form.image = $event.target.files[0]"
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                       id="image" name="image" type="file" required>
                <ErrorMessage :error="form.errors.image"/>
            </div>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Submit
            </button>
            <Link :href="$page.url"
                  class="ml-5 text-blue-700 hover:text-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:text-blue-600 dark:hover:text-blue-700 dark:focus:ring-blue-800">
                Cancel
            </Link>
        </form>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";
import ErrorMessage from "@/Shared/ErrorMessage.vue";


defineProps({
    brands: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    name: '',
    brand_id: '',
    description: '',
    image: '',
});

const onSubmit = () => {
    form.post('/car-models');
};
</script>
