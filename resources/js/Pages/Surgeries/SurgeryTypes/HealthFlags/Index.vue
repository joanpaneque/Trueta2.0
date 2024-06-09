<script setup>
import { defineProps } from 'vue';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import FormCheckbox from '@/Components/Form/FormCheckbox.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import NoResult from '@/Components/Wizard/NoResult.vue';
import { Head, useForm, router } from '@inertiajs/vue3'; 

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
    },
    surgery: {
        type: Object,
        default: () => ({})
    },
    surgeryType: {
        type: Object,
        default: () => ({})
    },
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
}

</script>

<template>
    <WizardLayout>
        <form @submit.prevent="submit" class="health-flags-form" v-if="props.healthFlags.length">
            <div class="health-flags-form-checkbox" v-for="healthFlag in props.healthFlags">
                <FormCheckbox
                    :key="healthFlag.id"
                    :id="healthFlag.id"
                    :name="healthFlag.name"
                    @input="toggleHealthFlag(healthFlag.id)"
                />
                <div class="health-flags-form-checkbox-edit" @click="router.get(route('surgeries.types.flags.edit', [props.surgeryId, props.surgeryTypeId, healthFlag.id]))">
                    <img src="/assets/icons/edit.svg" />
                </div>
            </div>
            <FormSubmit>Consultar</FormSubmit>
        </form>
        <div class="health-flags-form" v-else>
            <NoResult message="Encara no hi ha cap condició de salut per aquest tipus de cirurgia." />
        </div>
    </WizardLayout>
</template>

<style scoped>
    .health-flags-form {
        display: grid;
        gap: 15px;
    }

    .health-flags-form-checkbox {
        display: grid;
        grid-template-columns: auto 50px;
        gap: 10px;
    }

    .health-flags-form-checkbox-edit {
        border: 1px solid #ddd;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        user-select: none;
    }

    .health-flags-form-checkbox-edit img {
        width: 25px;
        height: 25px;
    }
</style>
