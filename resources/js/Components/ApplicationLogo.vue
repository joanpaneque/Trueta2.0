<script setup>
    import { router } from '@inertiajs/vue3'
    const baseUrl = import.meta.env.VITE_APP_URL;
</script>

<template>
    <img :src="`${baseUrl}/assets/logos/logo-trueta-horizontal.svg`" alt="Application logo" class="logo" @click="router.get(route('index'))" />
</template>
