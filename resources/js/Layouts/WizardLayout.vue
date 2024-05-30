<script setup>
import { router, usePage } from '@inertiajs/vue3'

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown/Dropdown.vue';
import Breadcrumbs from '@/Components/Breadcrumbs/Breadcrumbs.vue';
import CreateButton from '@/Components/Buttons/CreateButton.vue';
import GoBackButton from '@/Components/Buttons/GoBackButton.vue';
import { isIndex, createRoute, requiredParams } from '@/Helpers/indexer';

const page = usePage().component;
const pageProps = usePage().props;

const isIndexPage = isIndex(page);
const createPageRoute = createRoute(page);
const params = requiredParams(pageProps);


</script>

<template>
    <div class="wizard-layout-container">
        <div class="wizard-layout-logo">
            <ApplicationLogo />
        </div>
        <header class="wizard-layout-header">
            <div>
                <Dropdown :routes="[{
                label: 'Pàgina d\'inici',
                route: 'dashboard',
                method: 'get',
                isAdmin: false,
                isManager: false,
                }]">
                </Dropdown>
            </div>
            <div>
                <Breadcrumbs />
            </div>
            <div>
                <CreateButton v-if="isIndexPage" @click="router.get(route(createPageRoute, params))"></CreateButton>
                <GoBackButton v-else></GoBackButton>
            </div>
        </header>
        <nav class="wizard-layout-aside"></nav>
        <main class="wizard-layout-main">
            <slot />
        </main>
    </div>
</template>

<style scoped>
.wizard-layout-container {
    display: grid;
    gap: 15px;
    padding: 30px;
}

.wizard-layout-aside {
    display: none;
}

.wizard-layout-logo {
    display: flex;
    justify-content: center;
}

.wizard-layout-logo img {
    height: 50px;
}

.wizard-layout-header {
    display: grid;
    gap: 15px;
}

/* .wizard-layout-logo {
        grid-area: logo;
    }

    .wizard-layout-header {
        grid-area: header;
    }

    .wizard-layout-aside {
        grid-area: aside;
    }

    .wizard-layout-main {
        grid-area: main;
    } */
</style>
