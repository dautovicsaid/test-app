<template>
    <div v-if="error" class="text-red-500 text-sm mt-2">
        {{ error }}
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

defineProps({
    error: {
        type: String,
        default: '',
    },
});
</script>
