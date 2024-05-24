<script setup>
    import { defineProps } from 'vue';
    import WizardLayout from '@/Layouts/WizardLayout.vue';
    import WizardSquare from '@/Components/Wizard/WizardSquare.vue';
    import { router } from '@inertiajs/vue3';

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
                @click="router.get(route('surgeries.types.flags.index', [surgeryId, sType.id]))"
            />
        </div>
        <h1 v-if="nonProphylaxisSurgeryTypes.length > 0" class="wizard-non-profilaxy">Sense profilaxi</h1>
        <div class="wizard-square-grid">
            <WizardSquare
                v-for="sType in nonProphylaxisSurgeryTypes"
                :key="sType.id"
                :color="color"
                :text="sType.name"
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

.wizard-non-profilaxy {
    font-size : 2.5rem;
    padding: 15px;
    text-align: center;
    margin-top: 35px;
}

</style>