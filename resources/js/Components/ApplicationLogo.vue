<script setup>
    import { router } from '@inertiajs/vue3'
</script>

<template>
    <img src="/assets/logos/logo-trueta-horizontal.svg" alt="Application logo" class="logo" @click="router.get(route('index'))" />
</template>
