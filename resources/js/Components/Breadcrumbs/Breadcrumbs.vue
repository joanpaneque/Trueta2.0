<script setup>
    import { usePage, router } from '@inertiajs/vue3';

    const page = usePage().component;
    const pageProps = usePage().props;
</script>

<template>
    <div class="breadcrumbs-container">
        <span
            class="breadcrumbs-crumb"
            :class="
            {
                'active': page === 'Surgeries/Index'
            }"
            @click="router.get(route('dashboard'))">
            Cirurgia
        </span>
        <span>/</span>
        <span
            class="breadcrumbs-crumb"
            :class="
            {
                'active': page === 'Surgeries/SurgeryTypes/Index',
                'disabled': page === 'Surgeries/Index'
            }"
            @click="page !== 'Surgeries/Index' && page !== 'Surgeries/SurgeryTypes/Index' ? router.get(route('surgeries.types.index', pageProps.surgeryId)) : null">
            Tipus
        </span>
        <span>/</span>
        <span
            class="breadcrumbs-crumb"
            :class="
            {
                'active': page === 'Surgeries/SurgeryTypes/HealthFlags/Index',
                'disabled': page === 'Surgeries/Index' || page === 'Surgeries/SurgeryTypes/Index'
            }"
            @click="page !== 'Surgeries/Index' && page !== 'Surgeries/SurgeryTypes/Index' && page !== 'Surgeries/SurgeryTypes/HealthFlags/Index' ? router.get(route('surgeries.types.flags.index', [pageProps.surgeryId, pageProps.surgeryTypeId])) : null">
            Condicions
        </span>
        <span>/</span>
        <span
            class="breadcrumbs-crumb"
            :class="
            {
                'active': page === 'Surgeries/SurgeryTypes/HealthFlags/Results/Index',
                'disabled': page === 'Surgeries/Index' || page === 'Surgeries/SurgeryTypes/Index' || page === 'Surgeries/SurgeryTypes/HealthFlags/Index'
            }
            ">
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

    .breadcrumbs-crumb.active {
        color: #a24100;
        text-decoration: none;
        cursor: default;
    }

    .breadcrumbs-crumb.disabled {
        opacity: 0.5;
        text-decoration: none;
        cursor: not-allowed;
    }
</style>