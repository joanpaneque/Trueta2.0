<script setup>
    import { defineProps } from 'vue';
    import WizardLayout from '@/Layouts/WizardLayout.vue';
    import WizardSquare from '@/Components/Wizard/WizardSquare.vue';
    import { router } from '@inertiajs/vue3';
    import { useHoverStore } from '@/stores/Hover';

    const hover = useHoverStore();

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
                class="wizard-layout-surgery"
                :class="{ 'hover': hover.surgery === surgery.id }"
                @mouseover="hover.surgery = surgery.id"
                @mouseleave="hover.surgery = null"
            />
        </div>
        <!-- Aside template -->
        <template #aside>
            asdasd
        </template>
    </WizardLayout>
</template>

<style scoped>

.wizard-layout-surgery.hover {
    transform: scale(1.075);
    background: black !important;
    color: white !important;
    transition: 0.1s;
    cursor: pointer;
}

.wizard-square-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
    gap: 15px;
}

</style>