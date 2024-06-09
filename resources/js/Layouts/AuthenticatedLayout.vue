<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown/Dropdown.vue';
import Breadcrumbs from '@/Components/Breadcrumbs/Breadcrumbs.vue';
import CreateButton from '@/Components/Buttons/CreateButton.vue';
import { usePage } from '@inertiajs/vue3';

const user = usePage().props.auth.user;

</script>

<template>
    <div class="authenticated-layout-container">
        <div class="authenticated-layout-logo">
            <ApplicationLogo />
        </div>
        <header class="authenticated-layout-header">
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
        </header>
        <nav class="authenticated-layout-aside"></nav>
        <main class="authenticated-layout-main">
            <slot />
        </main>
    </div>
</template>

<style scoped>
.authenticated-layout-container {
    display: grid;
    gap: 15px;
    padding: 30px;
}

.authenticated-layout-aside {
    display: none;
}

.authenticated-layout-logo {
    display: flex;
    justify-content: center;
}

.authenticated-layout-logo img {
    height: 50px;
}

.authenticated-layout-header {
    display: grid;
    gap: 15px;
}

</style>
