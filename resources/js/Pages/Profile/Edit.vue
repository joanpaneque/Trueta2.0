<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';

const props = defineProps({
    user: {
        type: Object,
        default: () => ({})
    }
});

const user = usePage().props.auth.user;

// const form = useForm({
//     name: user.name,
//     email: user.email,
//     password: '',
//     password_confirmation: ''
// });

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    password: '',
    password_confirmation: ''
})

const submit = () => {
    form.put(route('profile.update', props.user.id));
};
</script>

<template>
    <Head title="Profile" />

    <AuthenticatedLayout>
        <form @submit.prevent="submit" class="edit-profile-form">
            <h1 class="edit-profile-form-title">Editant perfil</h1>
            <p v-if="$page.props.status === 'profile-information-updated'" class="text-green-500">Perfil actualitzat correctament</p>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom"
                icon="/assets/icons/user.svg"
                id="name"
                name="name"
                autofocus
            />
            <FormInput
                v-model="form.email"
                type="email"
                placeholder="Correu electrònic"
                icon="/assets/icons/at.svg"
                id="email"
                name="email"
            />
            <FormInput
                v-model="form.password"
                type="password"
                placeholder="Contrasenya"
                icon="/assets/icons/lock.svg"
                id="password"
                name="password"
            />
            <FormInput
                v-model="form.password_confirmation"
                type="password"
                placeholder="Confirmar contrasenya"
                icon="/assets/icons/lock.svg"
                id="password_confirmation"
                name="password_confirmation"
            />
            <FormSubmit>Editar perfil</FormSubmit>
        </form>
    </AuthenticatedLayout>
</template>

<style scoped>
.edit-profile-form {
    display: grid;
    gap: 15px;
}

.edit-profile-form-title {
    font-size: 1.5rem;
}
</style>