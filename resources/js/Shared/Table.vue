<template>
    <div
        class="relative overflow-x-auto shadow-md sm:rounded-lg"
    >
        <table
            class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400"
        >
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
            >
            <tr>
                <div v-if="items.every(item => item .hasOwnProperty('image'))">
                    <th scope="col" class="px-6 py-3"> Image</th>
                </div>
                <th scope="col" class="px-6 py-3" v-for="(column, index) in columns" :key="index"> {{ column }}</th>
                <th scope="col" class="px-6 py-3"> Show</th>
                <th scope="col" class="px-6 py-3"> Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" v-for="(item, index) in items"
                :key="index">
                <td v-if="item.image" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <div class="relative w-12 h-12">
                        <img class="rounded-full border border-gray-100 shadow-sm" :src="item.image.path" alt=" image"/>
                    </div>
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap"
                    v-for="(column, indexColumn) in columns" :key="indexColumn">{{ typeof item[column] === 'string' ? truncateString(item[column],truncateLenght) : item[column] }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <Link :href="`${url}/${item.id}`">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width={1.5}
                             stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                        </svg>
                    </Link>
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                    <div class="flex gap-3">
                        <Link :href="`${url}/${item.id}/edit`">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                            </svg>
                        </Link>
                        <button @click="destroy(item.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                            </svg>
                        </button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <Pagination :links="links"/>

</template>

<script setup>
import Pagination from "@/Shared/Pagination.vue";
import {router} from "@inertiajs/vue3";

let props = defineProps({
    items: {
        type: Array,
        required: true,
    },
    columns: {
        type: Array,
        required: true,
    },
    links: {
        type: Array,
        required: true,
    },
    url: {
        type: String,
        required: true,
    },
})

const truncateLenght = 30;
let truncateString = (str, num) => {
    if (str.length <= num) {
        return str;
    }
    return str.slice(0, num) + '...';
}

let destroy = (id) => {
    if (confirm("Are you sure?")) {
        router.delete(`${props.url}/${id}`);
    }
}
</script>
