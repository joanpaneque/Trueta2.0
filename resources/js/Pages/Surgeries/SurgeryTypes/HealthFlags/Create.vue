<script setup>
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/vue3';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import FormCondition from '@/Components/Form/FormCondition.vue';

const props = defineProps({
    surgeryId: {
        type: String,
        default: '0'
    },
    surgeryTypeId: {
        type: String,
        default: '0'
    },
    surgeryType: {
        type: Object,
        default: () => ({})
    },
    surgery: {
        type: Object,
        default: () => ({})
    },
    antibiotics: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({
    name: '',
    description: ''
});

const submit = () => {
    form.post(route('surgeries.types.flags.store', [props.surgeryId, props.surgeryTypeId]));
};

const baseUrl = import.meta.env.VITE_APP_URL;

</script>

<template>
    <WizardLayout>
        <form @submit.prevent="submit" class="create-health-flag-form">
            <h1 class="create-health-flag-form-title">Creant una condició de salut per
                <span class="create-health-flag-form-title-surgery-name">{{ surgeryType.name }}</span>
                de tipus <span class="create-health-flag-form-title-surgery-name">{{ surgery.name }}</span>.
            </h1>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom de la condició de salut"
                :icon="`${baseUrl}/assets/icons/pharmacy.svg`"
                id="name"
                name="name"
                autofocus
            />
            <FormCondition
                v-model="form.description"
                placeholder="Descripció de la condició de salut"
                :antibiotics="antibiotics"
            />
            <FormSubmit>Crear condició de salut</FormSubmit>
        </form>
    </WizardLayout>
</template>

<style scoped>
.create-health-flag-form {
    background: none;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.create-health-flag-form-title {
    font-size: 1.5rem;
}

.create-health-flag-form-title-surgery-name {
    text-transform: lowercase;
    font-weight: 600;
    color: #296fa8;
}

</style>