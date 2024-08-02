<script setup>
import { useForm } from '@inertiajs/vue3';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import FormColor from '@/Components/Form/FormColor.vue';

const form = useForm({
    name: '',
    color: ''
});

const submit = () => {
    form.post(route('surgeries.store'));
};

const baseUrl = import.meta.env.VITE_APP_URL;

</script>

<template>
    <WizardLayout>
        <form @submit.prevent="submit" class="create-surgery-form">
            <h1 class="create-surgery-form-title">Crear cirurgia</h1>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom de la cirurgia"
                :icon="`${baseUrl}/assets/icons/bone-break.svg`"
                id="name"
                name="name"
                autofocus
            />
            <FormColor
                v-model="form.color"
                placeholder="Color de la cirurgia"
                :icon="`${baseUrl}/assets/icons/palette.svg`"                
                id="color"
                name="color"
            />
            <FormSubmit>Crear cirurgia</FormSubmit>
        </form>
    </WizardLayout>
</template>

<style scoped>
.create-surgery-form {
    background: none;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.create-surgery-form-title {
    font-size: 1.5rem;
}

</style>