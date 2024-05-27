<script setup>
import { defineProps } from 'vue';
import WizardLayout from '@/Layouts/WizardLayout.vue';

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
        <div class="ambulance-gif">
            <img src="/assets/gifs/ambulance.gif" alt="Tipus de cirurgia" />
        </div>
        <p class="surgery-type-info">Aquest tipus de cirurgia no requereix de profilaxi antibiòtica.<br>Si no és així, contacta amb un gestor o un administrador.</p>
    </WizardLayout>
</template>

<style scoped>
    .ambulance-gif img {
        transform: scale(1.4);
    }

    .ambulance-gif {
        height: 200px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .surgery-type-info {
        text-align: center;
        font-size: 1.2rem;
        margin-top: 20px;
    }
</style>