<script setup>
import { router, usePage } from '@inertiajs/vue3'

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown/Dropdown.vue';
import Breadcrumbs from '@/Components/Breadcrumbs/Breadcrumbs.vue';
import CreateButton from '@/Components/Buttons/CreateButton.vue';
import GoBackButton from '@/Components/Buttons/GoBackButton.vue';
import EditButton from '@/Components/Buttons/EditButton.vue';
import { isIndex, createRoute, requiredParams, editRoute } from '@/Helpers/indexer';

const page = usePage().component;
const pageProps = usePage().props;

const user = pageProps.auth.user;


const isIndexPage = isIndex(page);
const createPageRoute = createRoute(page);
const editPageRoute = editRoute(page);
const params = requiredParams(pageProps);


</script>

<template>
    <div class="wizard-layout-container">
        <div class="wizard-layout-logo">
            <ApplicationLogo />
        </div>
        <header class="wizard-layout-header">
            <div>
                <Dropdown :routes="[
                {
                    label: 'Pàgina d\'inici',
                    route: 'dashboard',
                    method: 'get',
                    isAdmin: false,
                    isManager: false,
                },
                {
                    label: 'Altes, baixes i sol·licituds',
                    route: 'users.index',
                    method: 'get',
                    isAdmin: true,
                    isManager: false,
                },
                {
                    label: 'Registres d\'auditoria',
                    route: 'audit-logs.index',
                    method: 'get',
                    isAdmin: true,
                    isManager: true,
                },
                {
                    label: 'Perfil',
                    route: 'profile.edit',
                    params: { profile: user.id },
                    method: 'get',
                    isAdmin: false,
                    isManager: false,
                },
                {
                    label: 'Tancar sessió',
                    route: 'logout',
                    method: 'post',
                    isAdmin: false,
                    isManager: false,    
                }
                ]">
                </Dropdown>
            </div>
            <div>
                <Breadcrumbs />
            </div>
            <div>
                <div v-if="!editPageRoute">
                    <CreateButton v-if="isIndexPage" @click="router.get(route(createPageRoute, params))"></CreateButton>
                    <GoBackButton v-else></GoBackButton>
                </div>
                <div v-else class="wizard-layout-button-group">
                    <CreateButton v-if="isIndexPage" @click="router.get(route(createPageRoute, params))"></CreateButton>
                    <GoBackButton v-else></GoBackButton>
                    <EditButton @click="router.get(route(editPageRoute, params))"></EditButton>
                </div>
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

.wizard-layout-button-group {
    display: flex;
    flex-direction: column;
    gap: 15px;
}
</style>