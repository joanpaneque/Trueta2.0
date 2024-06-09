<script setup>
import { defineProps, ref } from 'vue';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import ConditionRenderer from '@/Components/Results/ConditionRenderer.vue';

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
    },
    surgery: {
        type: Object,
        default: () => ({})
    },
    surgeryType: {
        type: Object,
        default: () => ({})
    },
    antibiotics: {
        type: Object,
        default: () => ({})
    }
});

</script>

<template>
    <WizardLayout>
        <h1 class="health-flag-results-title">Mostrant els resultats seleccionats del tipus de cirurgia
            <span class="health-flag-results-title-surgery-name">{{ surgeryType.name }}</span>
            de la branca <span class="health-flag-results-title-surgery-name">{{ surgery.name }}</span>.
        </h1>
        <div v-for="healthFlag in props.healthFlags" :key="healthFlag.id">
            <h1 class="health-flag-result-title">{{ healthFlag.name }}</h1>
            <ConditionRenderer :html="healthFlag.description" :antibiotics="props.antibiotics" />
        </div>
    </WizardLayout>
</template>

<style scoped>
.health-flag-result-title {
    background: #97d0ff;
    font-size: 1.5rem;
    padding: 10px;
    text-align: center;
    border-radius: 10px;
    margin-bottom: 10px;
}

.health-flag-results-title {
    font-size: 1.5rem;
    margin-bottom: 20px;
}

.health-flag-results-title-surgery-name {
    text-transform: lowercase;
    font-weight: 600;
    color: #296fa8;
}

</style>