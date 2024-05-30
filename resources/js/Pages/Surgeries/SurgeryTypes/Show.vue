<script setup>
import { defineProps } from 'vue';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import NoResult from '@/Components/Wizard/NoResult.vue';

const props = defineProps({
    surgeryType: {
        type: Object,
        default: () => ({})
    },
    surgeryId: {
        type: String,
        default: '0'
    },
    surgeryTypeId: {
        type: String,
        default: '0'
    }
});

</script>

<template>
    <WizardLayout>
        <NoResult message="Aquest tipus de cirurgia no requereix de profilaxi antibiòtica.\nSi no és així, contacta amb un gestor o un administrador." />
    </WizardLayout>
</template>