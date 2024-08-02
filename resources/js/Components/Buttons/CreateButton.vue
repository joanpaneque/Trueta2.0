
<script setup>
    import { indexPage, isIndex} from '@/Helpers/indexer';
    import { usePage, router } from '@inertiajs/vue3';

    const page = usePage().component;

    const pageId = indexPage(page);

    const createReferences = {
        '0': 'Cirurgia',
        '1': 'Tipus de cirurgia',
        '2': 'Condició de salut',
    }

    const baseUrl = import.meta.env.VITE_APP_URL;

</script>

<template>
    <div class="create-button-container">
        <img :src="`${baseUrl}/assets/icons/add.svg`" alt="Create" />
        <span>{{ createReferences[pageId] }}</span>
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