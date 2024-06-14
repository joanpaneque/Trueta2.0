<script setup>
    import { defineProps } from 'vue';
    import WizardLayout from '@/Layouts/WizardLayout.vue';
    import WizardSquare from '@/Components/Wizard/WizardSquare.vue';
    import { router } from '@inertiajs/vue3';
    import { useHoverStore } from '@/stores/Hover';

    const hover = useHoverStore();

    const props = defineProps({
        prophylaxisSurgeryTypes: {
            type: Array,
            default: () => []
        },
        nonProphylaxisSurgeryTypes: {
            type: Array,
            default: () => []
        },
        surgeryId: {
            type: String,
            default: 0
        },
        color: {
            type: String,
            default: 'gray'
        }
    });
</script>

<template>
    <WizardLayout>
        <div class="wizard-square-grid">
            <WizardSquare
                v-for="sType in prophylaxisSurgeryTypes"
                :key="sType.id"
                :color="color"
                :text="sType.name"
                class="wizard-layout-surgery"
                @click="router.get(route('surgeries.types.flags.index', [surgeryId, sType.id]))"
                @mouseover="hover.surgeryType = sType.id"
                @mouseleave="hover.surgeryType = null"
                :class="{ 'hover': hover.surgeryType === sType.id }"
            />
        </div>
        <h1 v-if="nonProphylaxisSurgeryTypes.length > 0" class="wizard-non-profilaxy">Sense profilaxi</h1>
        <div class="wizard-square-grid">
            <WizardSquare
                v-for="sType in nonProphylaxisSurgeryTypes"
                :key="sType.id"
                :color="color"
                :text="sType.name"
                @click="router.get(route('surgeries.types.show', [surgeryId, sType.id]))"
            />
        </div>
    </WizardLayout>
</template>

<style scoped>

.wizard-square-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 15px;
}

.wizard-layout-surgery.hover {
    transform: scale(1.075);
    background: black !important;
    color: white !important;
    transition: 0.1s;
    cursor: pointer;
}


.wizard-non-profilaxy {
    font-size : 2.5rem;
    padding: 15px;
    text-align: center;
    margin-top: 35px;
}

</style>