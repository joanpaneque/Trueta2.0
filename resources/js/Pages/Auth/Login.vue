<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3'; 
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Iniciar sessió" />
        <form @submit.prevent="submit" class="login-form">
            <ApplicationLogo class="logo" />
            <FormInput
                v-model="form.email"
                type="email"
                placeholder="Correu electrònic"
                icon="/assets/icons/at.svg"
            />
            <FormInput
                v-model="form.password"
                type="password"
                placeholder="Contrasenya"
                icon="/assets/icons/lock.svg"
            />
            <FormSubmit>Iniciar sessió</FormSubmit>
            <div>
                <span>No t'han donat d'alta? <a href="/register">Sol·licita-la aqui</a></span>
            </div>
        </form>
    </GuestLayout>
</template>
<style scoped>
    .login-form {
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
</style>
