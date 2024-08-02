<script setup>
import { router, usePage } from '@inertiajs/vue3'

import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown/Dropdown.vue';
import Breadcrumbs from '@/Components/Breadcrumbs/Breadcrumbs.vue';
import CreateButton from '@/Components/Buttons/CreateButton.vue';
import GoBackButton from '@/Components/Buttons/GoBackButton.vue';
import EditButton from '@/Components/Buttons/EditButton.vue';
import { isIndex, createRoute, requiredParams, editRoute } from '@/Helpers/indexer';
import { useHoverStore } from '@/stores/Hover';

const hover = useHoverStore();
hover.surgery = null;
hover.surgeryType = null;

const page = usePage().component;
const pageProps = usePage().props;

const user = pageProps.auth.user;


const isIndexPage = isIndex(page);
const createPageRoute = createRoute(page);
const editPageRoute = editRoute(page);
const params = requiredParams(pageProps);

const baseUrl = import.meta.env.VITE_APP_URL;

</script>

<template>
    <div class="wizard-layout-container">

        <header class="wizard-layout-header">
            <ApplicationLogo class="wizard-layout-logo" />
            <Dropdown class="wizard-layout-dropdown" :routes="[
                {
                    label: 'Pàgina d\'inici',
                    route: 'dashboard',
                    method: 'get',
                    isAdmin: false,
                    isManager: false,
                },
                {
                    label: 'Administració d\'antibiòtics',
                    route: 'antibiotics.index',
                    method: 'get',
                    isAdmin: false,
                    isManager: true,
                },
                {
                    label: 'Control d\'usuaris',
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
                    label: 'Documentació',
                    route: 'documentation',
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
            <Breadcrumbs class="wizard-layout-breadcrumbs" />
            <div v-if="user.is_admin || user.is_manager" class="wizard-layout-button-group" :style="{ gridTemplateColumns: !editPageRoute ? '1fr' : '1fr 1fr'}">
                <CreateButton v-if="isIndexPage" @click="router.get(route(createPageRoute, params))"></CreateButton>
                <GoBackButton v-else></GoBackButton>
                <EditButton v-if="editPageRoute" @click="router.get(route(editPageRoute, params))"></EditButton>
            </div>

        </header>
        <nav class="wizard-layout-aside">
            <div v-for="surgery in pageProps.surgeries" :key="surgery.id" class="wizard-layout-surgery" @click="router.get(route('surgeries.types.index', surgery.id))" @mouseover="hover.surgery = surgery.id" @mouseleave="hover.surgery = null" :class="{ 'hover': hover.surgery === surgery.id }">
                <div class="wizard-layout-surgery-name">{{ surgery.name }}</div>
                <div class="wizard-layout-surgery-icon"><img :src="`${baseUrl}/assets/icons/arrow.svg`" alt="arrow" /></div>
                <div class="wizard-layout-surgery-types" v-if="pageProps.surgery?.id === surgery.id">
                    <div class="wizard-layout-surgery-type" v-for="sType in pageProps.surgeryTypes" :key="sType.id" @click.stop="router.get(route('surgeries.types.flags.index', [surgery.id, sType.id]))" @mouseover="hover.surgeryType = sType.id" @mouseleave="hover.surgeryType = null" :class="{ 'hover': hover.surgeryType === sType.id }">
                        {{ sType.name }}
                    </div>
                </div>
            </div>
        </nav>
        <main class="wizard-layout-main">
            <slot />
        </main>
    </div>
</template>

<style scoped>
.wizard-layout-surgery-type {
    border-left: 1px solid #ddd;
    padding: 10px 15px;
    color: #666;
}

.wizard-layout-surgery.hover {
    background: #f5f5f5;
    cursor: pointer;
}

.wizard-layout-surgery-type.hover {
    background: #cecece;
    cursor: pointer;
}

.wizard-layout-container {
    display: grid;
    gap: 15px;
    padding: 30px;
    grid-template-areas:
        "header header"
        "main main";
}

.wizard-layout-header {
    display: grid;
    gap: 15px;
    grid-area: header;
    background: white;
    grid-template-areas:
        "logo"
        "dropdown"
        "breadcrumbs"
        "button-group";
}

.wizard-layout-aside {
    display: none;
    grid-area: aside;
}

.wizard-layout-logo {
    height: 50px;
    margin: 0 auto;
    grid-area: logo;
}

.wizard-layout-dropdown {
    grid-area: dropdown;
}

.wizard-layout-breadcrumbs {
    grid-area: breadcrumbs;
}

.wizard-layout-button-group {
    grid-area: button-group;
}



.wizard-layout-main {
    grid-area: main;
}

.wizard-layout-button-group {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.wizard-layout-surgery {
    border-radius: 10px;
    font-weight: bold;
    padding: 10px;
}

@media (min-width: 768px) {
    .wizard-layout-container {
        grid-template-areas:
            "header header"
            "aside main";

        grid-template-columns: 300px auto;
    }

    .wizard-layout-header {
        grid-template-areas:
            "logo dropdown"
            "breadcrumbs breadcrumbs"
            "button-group button-group";
    }

    .wizard-layout-button-group {
        display: grid;
    }	

    .wizard-layout-aside {
        display: flex;
        gap: 15px;
        flex-direction: column;
    }

    .wizard-layout-surgery {
        display: grid;
        grid-template-columns: 1fr 20px;
        gap: 15px;
    }

    .wizard-layout-surgery-icon {
        display: flex;
    }

    .wizard-layout-surgery-icon img {
        height: 20px;
        width: 20px;
    }
}
</style>