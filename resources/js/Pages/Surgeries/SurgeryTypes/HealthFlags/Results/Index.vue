<script setup>
import { defineProps } from 'vue';
import WizardLayout from '@/Layouts/WizardLayout.vue';

const props = defineProps({
    healthFlags: {
        type: Array,
        default: () => []
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
        <div v-for="healthFlag in props.healthFlags" :key="healthFlag.id">
            <p>{{ healthFlag.name }}</p>
        </div>
    </WizardLayout>
</template>

<style scoped>

</style>