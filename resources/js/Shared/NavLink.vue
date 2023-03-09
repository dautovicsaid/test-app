<template>
    <Link
        class="text-black hover:underline"
        :class="{'font-bold underline': active}">
        <div class="text-xl">
            <slot/>
        </div>
    </Link>
</template>

<script >
export default {
    props: {
        active: Boolean,
    }
}
</script>
