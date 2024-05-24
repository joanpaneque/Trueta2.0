<script setup>
import { defineProps } from 'vue';
import WizardLayout from '@/Layouts/WizardLayout.vue';

const props = defineProps({
    surgeryId: {
        type: String,
        default: '0'
    },
    surgeryTypeId: {
        type: String,
        default: '0'
    },
    healthFlag: {
        type: Object,
        default: '0'
    }
});
</script>

<template>
    <WizardLayout>
        <form @submit.prevent="submit" class="edit-health-flag-form">
            <h1 class="edit-health-flag-form-title">Editar condició de salut</h1>
            <!-- <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom de la cirurgia"
                icon="/assets/icons/bone-break.svg"
                id="name"
                name="name"
                autofocus
            />
            <FormColor
                v-model="form.color"
                placeholder="Color de la cirurgia"
                icon="/assets/icons/palette.svg"
                id="color"
                name="color"
            />
            <FormSubmit>Crear cirurgia</FormSubmit> -->
        </form>
    </WizardLayout>
</template>

<style scoped>
.edit-health-flag-form {
    background: none;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.edit-health-flag-form-title {
    font-size: 1.5rem;
}

</style>