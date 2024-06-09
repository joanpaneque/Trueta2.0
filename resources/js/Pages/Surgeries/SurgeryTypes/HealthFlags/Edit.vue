<script setup>
import { defineProps } from 'vue';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import { useForm } from '@inertiajs/vue3';
import FormCondition from '@/Components/Form/FormCondition.vue';
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';

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
    },
    antibiotics: {
        type: Object,
        default: () => ({})
    },
    surgery: {
        type: Object,
        default: () => ({})
    },
    surgeryType: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({
    name: props.healthFlag.name,
    description: props.healthFlag.description
});

const submit = () => {
    form.put(route('surgeries.types.flags.update', [props.surgeryId, props.surgeryTypeId, props.healthFlag.id]));
};

</script>

<template>
    <WizardLayout>
        <form @submit.prevent="submit" class="edit-health-flag-form">
            <h1 class="edit-health-flag-form-title">Editant la condició de salut <span class="edit-health-flag-form-title-surgery-name ">{{ props.healthFlag.name }}</span> per la cirurgia de tipus <span class="edit-health-flag-form-title-surgery-name">{{ props.surgeryType.name }}</span> de la branca <span class="edit-health-flag-form-title-surgery-name">{{ props.surgery.name }}</span></h1>
            <FormInput
                v-model="form.name"
                placeholder="Nom de la condició de salut"
                icon="/assets/icons/pharmacy.svg"
                id="name"
                name="name"
                autofocus
            />
            <FormCondition
                v-model="form.description"
                placeholder="Descripció de la condició de salut"
                icon="/assets/icons/health-flag.svg"
                id="description"
                name="description"
                autofocus
                :antibiotics="props.antibiotics"
            />
            <FormSubmit>Desar</FormSubmit>
        </form>
    </WizardLayout>
</template>

<style scoped>

.edit-health-flag-form-title {
    font-size: 1.5rem;
}

.edit-health-flag-form-title-surgery-name {
    text-transform: lowercase;
    font-weight: 600;
    color: #296fa8;
}


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