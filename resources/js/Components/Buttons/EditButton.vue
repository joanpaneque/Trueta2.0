
<script setup>
    import { indexRoutePage, requiredParams, indexPage } from '@/Helpers/indexer';
    import { usePage, router } from '@inertiajs/vue3';

    const page = usePage().component;
    const pageProps = usePage().props;

    const pageId = indexPage(page);

    const editReferences = {
        '0': null,
        '1': 'Cirurgia',
        '2': '',
    }

    const text = (pageId === 1 ? pageProps.surgery.name : pageProps.surgeryType.name);

</script>

<template>
    <div class="edit-button-container">
        <img src="/assets/icons/edit.svg" alt="Edit" />
        
        <span class="edit-button-text">{{ editReferences[pageId] }} <span class="surgery-name">{{text}}</span></span>
    </div>
</template>

<style scoped>
    .edit-button-container {
        background: #296fa8;
        height: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background 0.1s;
    }

    .edit-button-container img {
        height: 23px;
        filter: invert(100%);
    }

    .edit-button-container:hover {
        background: #1f4e7a;
        cursor: pointer;
    }
    .surgery-name {
        text-transform: lowercase;
    }
    .edit-button-container span.edit-button-text {
        color: white;
        font-size: 1.2rem;
        margin-left: 10px;
    }


</style>