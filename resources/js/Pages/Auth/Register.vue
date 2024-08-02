<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { defineProps } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};

const props = defineProps({
    status: {
        type: String,
        default: '',
    }
});

const baseUrl = import.meta.env.VITE_APP_URL;

</script>

<template>
    <GuestLayout>
        <Head title="Registre" />
        <form @submit.prevent="submit" class="register-form">
            <ApplicationLogo class="logo" />
            <div v-if="props.status" class="status-message">{{ props.status }}</div>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom"
                :icon="`${baseUrl}/assets/icons/id-card-clip-alt.svg`"
            />
            <FormInput
                v-model="form.email"
                type="email"
                placeholder="Correu electrònic"
                :icon="`${baseUrl}/assets/icons/at.svg`"
                
            />
            <FormInput
                v-model="form.password"
                type="password"
                placeholder="Contrasenya"
                :icon="`${baseUrl}/assets/icons/lock.svg`"
            />
            <FormInput
                v-model="form.password_confirmation"
                type="password"
                placeholder="Confirma la contrasenya"
                :icon="`${baseUrl}/assets/icons/lock.svg`"
            />
            <FormSubmit>Sol·licitar alta</FormSubmit>
            <div>
                <span><a href="login">Ja estic donat d'alta</a></span>
            </div>
        </form>
    </GuestLayout>
</template>
<style scoped>
    .register-form {
        background: none;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .logo {
        width: 100%;
        display: block;
        margin-bottom: 20px;
    }

    .status-message {
        background-color: #f0f0f0;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
</style>
