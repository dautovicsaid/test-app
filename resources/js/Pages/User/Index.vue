<template>
    <Head title="Users"/>
    <div class="flex justify-between mb-4">
        <div class="flex items-center">
            <h1 class="text-3xl">Users</h1>
            <Link href="/users/create" class="bg-blue-400 text-white rounded text-sm ml-4 py-2 px-4 hover:bg-blue-500">Create</Link>
        </div>
        <div class="relative">
            <input v-model="search" type="text" placeholder="Search..." class="border border-gray-400 rounded-lg py-2 px-3 pr-8 focus:outline-none focus:border-blue-500"/>
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 focus:outline-none" @click="clearSearch">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>
    <Table :items="users.data" :columns="columns" :links="users.links" :url="$page.url.split('?')[0]"/>
</template>
<script setup>

import Table from "@/Shared/Table.vue";
import {ref, watch} from "vue";
import {router} from "@inertiajs/vue3";
import {debounce} from "lodash";


defineProps({
    users: {
        type: Object,
        required: true,
    },
    filters: {
        type: Object,
        required: true,
    },
    can: {
        type: Object,
        required: true,
    },
})

let columns = [
    'id',
    'name',
    'email',
];

let search = ref('');

const clearSearch = () => {
    search.value = '';
}

watch(
    search,
    debounce((value) => {
            router.get('/users', { search: value }, { preserveState: true });
        },
    ), 500);

</script>
