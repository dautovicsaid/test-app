<template>
    <form @submit.prevent="onSubmit">
        <div v-for="(value, key) in fields" :key="key" class="relative z-0 w-full mb-6 group">
            <div v-if="types[key] === 'file'">
                <div v-if="props.imagePath !== null" class="relative w-24 h-24">
                    <img class="rounded-full border border-gray-100 shadow-sm" :src="props.imagePath" alt="user image" />
                      </div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload
                    file</label>
                <input @input="form.image = $event.target.files[0]"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="image" name="image" type="file" :required="isRequired('image')">
                <ErrorMessage :error="form.errors.image"/>
            </div>
            <div v-else>
                <input v-model="form[key]" :type="types[key]" :name="key" :id="key"
                       class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       :placeholder="`Enter ${key} here`" :required="isRequired(key)"/>
                <label :for="key"
                       class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{
                        key
                    }}</label>
                <ErrorMessage :error="form.errors[key]"/>
            </div>
        </div>
        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Submit
        </button>
        <Link :href="props.url"
              class="ml-5 text-blue-700 hover:text-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:text-blue-600 dark:hover:text-blue-700 dark:focus:ring-blue-800">
            Cancel
        </Link>
    </form>
</template>

<script setup>
import {useForm, Link, router} from "@inertiajs/vue3";
import ErrorMessage from "@/Shared/ErrorMessage.vue";


let props = defineProps({
    fields: {
        type: Object,
        required: true
    },
    url: {
        type: String,
        required: true
    },
    types: {
        type: Object,
        required: true
    },
    required: {
        type: Array,
        required: true
    },
    imagePath: {
        type: String,
        default: null
    }
});

let form = useForm(
    props.fields
);

console.log(props.method)
const onSubmit = () => {
    form.post(props.url);
};

let isRequired = (key) => {
    return props.required.includes(key);
}


</script>
