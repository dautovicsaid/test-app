<template>
    <section class="p-8 bg-gray-200">
    <header class="flex justify-between">
        <div class="flex">
            <h1 class="font-bold text-lg">My app</h1>
            <h1 class="text-lg ml-8"> Welcome, {{ user.name }} </h1>
        </div>
        <Nav/>
    </header>
    </section>
    <section class="p-12">
        <div class="container mx-auto">
            <div v-if="$page.props.flash.success" class="text-blue-500 mb-5">
                {{ $page.props.flash.success}}
            </div>
            <div v-else-if="$page.props.flash.error" class="text-red-500 mb-5">
                {{ $page.props.flash.error}}
            </div>
            <slot/>
        </div>
    </section>
</template>
<script setup>
import Nav from "@/Shared/Nav.vue";
import {usePage} from "@inertiajs/vue3";

const user = usePage().props.auth.user;

</script>
