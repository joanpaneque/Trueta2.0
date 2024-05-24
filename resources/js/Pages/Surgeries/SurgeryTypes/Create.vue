<script setup>
import { defineProps } from 'vue';
import { useForm } from '@inertiajs/vue3';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import FormColor from '@/Components/Form/FormColor.vue';
import FormCheckbox from '@/Components/Form/FormCheckbox.vue';

const props = defineProps({
    surgery: {
        type: Object,
        default: () => ({})
    }
});

const form = useForm({
    name: '',
    prophylaxis: true
});

const submit = () => {
    form.post(route('surgeries.types.store', props.surgery.id));
};

</script>

<template>
    <WizardLayout>
        <form @submit.prevent="submit" class="create-surgery-type-form">
            <h1 class="create-surgery-type-form-title">Crear tipus de cirurgia <span class="create-surgery-type-form-title-surgery-name">{{ surgery.name }}</span></h1>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom del tipus de cirurgia"
                icon="/assets/icons/bone-break.svg"
                id="name"
                name="name"
                autofocus
            />
            <FormCheckbox
                name="Requereix de profilaxi antibiòtica"
                v-model="form.prophylaxis"
            />
            <FormColor
                :value="surgery.color"
                placeholder="Color de la cirurgia"
                icon="/assets/icons/palette.svg"
                id="color"
                name="color"
                :disabled="true"
            />
            <FormSubmit>Crear cirurgia</FormSubmit>
        </form>
    </WizardLayout>
</template>

<style scoped>
.create-surgery-type-form {
    background: none;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.create-surgery-type-form-title {
    font-size: 1.5rem;
}

.create-surgery-type-form-title-surgery-name {
    text-transform: lowercase;
    font-weight: 600;
    color: #296fa8;
}

</style>