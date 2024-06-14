<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import FormInput from '@/Components/Form/FormInput.vue';
import FormTextarea from '@/Components/Form/FormTextarea.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';

const form = useForm({
    name: '',
    description: ''
});

function submit() {
    form.post(route('antibiotics.store'));
}

</script>

<template>
    <AuthenticatedLayout>
        <form @submit.prevent="submit" class="edit-antibiotic-form">
            <h1 class="edit-antibiotic-form-title">Creant antibiòtic</h1>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom"
                icon="/assets/icons/medicine.svg"
                id="name"
                name="name"
                autofocus
            />
            <FormTextarea
                v-model="form.description"
                placeholder="Descripció"
                icon="/assets/icons/description-alt.svg"
                id="description"
                name="description"
            />
            <FormSubmit>Crear</FormSubmit>
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>
    .edit-antibiotic-form {
        display: grid;
        gap: 15px;
    }

    .edit-antibiotic-form-title {
        font-size: 1.5rem;
    }
</style>