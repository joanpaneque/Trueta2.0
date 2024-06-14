<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { ref, defineProps } from 'vue';
import { Head, useForm } from '@inertiajs/vue3'; 
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

const form = useForm({
    email: '',
    password: '',
});

const props = defineProps({
    status: {
        type: String,
        default: '',
    }
});

const errors = ref([]);

const submit = () => {

    errors.value = [];

    if (!form.email) {
        errors.value.push('El correu electrònic és obligatori');
    }

    if (!form.password) {
        errors.value.push('La contrasenya és obligatòria');
    }

    if (errors.value.length > 0) {
        return;
    }

    form.post(route('login'), {
        onFinish: () => form.reset('password'),
        onError: (err) => {
            if (err.email) {
                errors.value.push("El correu electrònic o la contrasenya no són correctes")
            }

            // if (errors.email) {
            //     errors.value.push(errors.email[0]);
            // }

            // if (errors.password) {
            //     errors.value.push(errors.password[0]);
            // }
        },
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Iniciar sessió" />
        <form @submit.prevent="submit" class="login-form">
            <ApplicationLogo class="logo" />
            <div v-for="error in errors" :key="error" class="text-red-500 text-sm">{{ error }}</div>
            <div v-if="props.status" class="status-message">{{ props.status }}</div>
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

    .status-message {
        background-color: #f0f0f0;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }
</style>
