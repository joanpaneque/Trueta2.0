
<script setup>
    import { indexRoutePage, requiredParams } from '@/Helpers/indexer';
    import { usePage, router } from '@inertiajs/vue3';

    const page = usePage().component;

    const indexRoute = indexRoutePage(page);
    const pageProps = usePage().props;
    
    const params = requiredParams(pageProps);

    function goBack() {
        router.get(route(indexRoute, params));
    }


</script>

<template>
    <div class="create-button-container" @click="goBack">
        <img src="/assets/icons/undo.svg" alt="Create" />
        <span>Tornar</span>
    </div>
</template>

<style scoped>
    .create-button-container {
        background: #296fa8;
        height: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background 0.1s;
    }

    .create-button-container img {
        height: 23px;
        filter: invert(100%);
    }

    .create-button-container:hover {
        background: #1f4e7a;
        cursor: pointer;
    }

    .create-button-container span {
        color: white;
        font-size: 1.2rem;
        margin-left: 10px;
    }
</style>