<script setup>
    import { usePage, router } from '@inertiajs/vue3';
    import { indexPage } from '@/Helpers/indexer';

    const page = usePage().component;
    const pageProps = usePage().props;

    const pageId = indexPage(page);

</script>

<template>
    <div class="breadcrumbs-container">
        <!-- {{ pageId }} -->
        <span
            class="breadcrumbs-crumb"
            :class="
            {
                'active': pageId === 0,
            }"
            @click="router.get(route('dashboard'))">
            Cirurgia
        </span>
        <span>/</span>
        <span
            class="breadcrumbs-crumb"
            :class="
            {
                'active': pageId === 1,
            }"
            :disabled="pageId < 1 ? '1' : '0'"
            @click="router.get(route('surgeries.types.index', pageProps.surgeryId))">
            Tipus
        </span>
        <span>/</span>
        <span
            class="breadcrumbs-crumb"
            :class="
            {
                'active': pageId === 2,
            }"
            :disabled="pageId < 2 ? '1' : '0'"
            @click="router.get(route('surgeries.types.flags.index', [pageProps.surgeryId, pageProps.surgeryTypeId]))">
            Condicions
        </span>
        <span>/</span>
        <span
            class="breadcrumbs-crumb"
            :class="
            {
                'active': pageId === 3,
            }"
            :disabled="pageId < 3 ? '1' : '0'"
            >
            Resultats
        </span>
    </div>
</template>

<style scoped>
    .breadcrumbs-container {
        width: 100%;
        height: 50px;
        background: #d9d9d9;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        gap: 5px;
    }
    
    .breadcrumbs-crumb {
        color: #00599c;
    }

    .breadcrumbs-crumb:hover {
        text-decoration: underline;
        cursor: pointer;
    }

    .breadcrumbs-crumb[disabled="1"] {
        opacity: 0.5;
        text-decoration: none;
        cursor: not-allowed;
        pointer-events: none;
    }

    .breadcrumbs-crumb.active {
        color: #a24100;
        text-decoration: none;
        cursor: default;
    }



    /* .breadcrumbs-crumbs[disabled] {
        opacity: 0.5;
        text-decoration: none;
        cursor: not-allowed;
    } */
</style>