<script setup>
import { defineProps } from 'vue';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import FormCheckbox from '@/Components/Form/FormCheckbox.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import { Head, useForm } from '@inertiajs/vue3'; 

const props = defineProps({
    healthFlags: {
        type: Array,
        default: () => []
    },
    surgeryId: {
        type: String,
        default: '0'
    },
    surgeryTypeId: {
        type: String,
        default: '0'
    }
});

const form = useForm({
    healthFlags: []
});


const submit = () => {
    form.get(route('surgeries.types.flags.results', [props.surgeryId, props.surgeryTypeId]), {
        onFinish: () => form.reset('healthFlags'),
    });
};

function toggleHealthFlag(id) {
    if (form.healthFlags.includes(id)) {
        form.healthFlags = form.healthFlags.filter(flag => flag !== id);
    } else {
        form.healthFlags.push(id);
    }
    console.log(form.healthFlags);
}

</script>

<template>
    <WizardLayout>
        <form @submit.prevent="submit" class="health-flags-form">
            <FormCheckbox
                v-for="healthFlag in props.healthFlags"
                :key="healthFlag.id"
                :id="healthFlag.id"
                :name="healthFlag.name"
                @input="toggleHealthFlag(healthFlag.id)"
            />
            <FormSubmit>Consultar</FormSubmit>
        </form>
    </WizardLayout>
</template>

<style scoped>
    .health-flags-form {
        display: grid;
        gap: 15px;
    }
</style>
