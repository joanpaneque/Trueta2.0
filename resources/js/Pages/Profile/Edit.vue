<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import FormInput from '@/Components/Form/FormInput.vue';
import FormCheckbox from '@/Components/Form/FormCheckbox.vue';
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
    password_confirmation: '',
    is_admin: props.user.is_admin,
    is_manager: props.user.is_manager,
})

const submit = () => {
    form.put(route('profile.update', props.user.id));
};

const baseUrl = import.meta.env.VITE_APP_URL;

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
                :icon="`${baseUrl}/assets/icons/user.svg`"
                id="name"
                name="name"
                autofocus
            />
            <FormInput
                v-model="form.email"
                type="email"
                placeholder="Correu electrònic"
                :icon="`${baseUrl}/assets/icons/at.svg`"
                id="email"
                name="email"
            />
            <FormInput
                v-model="form.password"
                type="password"
                placeholder="Contrasenya"
                :icon="`${baseUrl}/assets/icons/lock.svg`"
                id="password"
                name="password"
            />
            <FormInput
                v-model="form.password_confirmation"
                type="password"
                placeholder="Confirmar contrasenya"
                :icon="`${baseUrl}/assets/icons/lock.svg`"
                id="password_confirmation"
                name="password_confirmation"
            />
            <div class="edit-profile-admin">
                <FormCheckbox
                    v-if="user.is_admin"
                    v-model="form.is_manager"
                    id="is_manager"
                    name="Gestor"
                    :disabled="user.id === props.user.id"
                />
                <FormCheckbox
                    v-if="user.is_admin"
                    v-model="form.is_admin"
                    id="is_admin"
                    name="Administrador"
                    :disabled="user.id === props.user.id"
                />
            </div>
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

.edit-profile-admin {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 15px;
    width: 100%;
}
</style>