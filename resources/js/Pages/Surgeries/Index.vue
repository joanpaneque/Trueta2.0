<script setup>
    import { defineProps } from 'vue';
    import WizardLayout from '@/Layouts/WizardLayout.vue';
    import WizardSquare from '@/Components/Wizard/WizardSquare.vue';
    import { router } from '@inertiajs/vue3';

    const props = defineProps({
        surgeries: {
            type: Array,
            default: () => []
        }
    });
</script>

<template>
    <WizardLayout>
        <div class="wizard-square-grid">
            <WizardSquare
                v-for="surgery in surgeries"
                :key="surgery.id"
                :color="surgery.color"
                :text="surgery.name"
                @click="router.get(route('surgeries.types.index', surgery.id))"
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

</style>