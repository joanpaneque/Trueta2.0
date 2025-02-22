<script setup>
import { defineProps, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { indexRoutePage, requiredParams } from '@/Helpers/indexer';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import FormColor from '@/Components/Form/FormColor.vue';
import FormCheckbox from '@/Components/Form/FormCheckbox.vue';
import CustomModal from '@/Components/CustomModal.vue';
import DeleteButton from '@/Components/Buttons/DeleteButton.vue';

const props = defineProps({
    surgery: {
        type: Object,
        default: () => ({})
    },
    surgeryId: {
        type: String,
        default: '0'
    },
    surgeryType: {
        type: Object,
        default: () => ({})
    },
    surgeryTypeId: {
        type: String,
        default: '0'
    }
});

const isOpen = ref(false);

const params = requiredParams(props);


const form = useForm({
    name: props.surgeryType.name,
    prophylaxis: props.surgeryType.prophylaxis
});

const submit = () => {
    form.put(route('surgeries.types.update', params));
};

const deleteSurgery = () => {
    form.delete(route('surgeries.types.destroy', [props.surgeryType.id, props.surgeryType.id]));
};

const baseUrl = import.meta.env.VITE_APP_URL;

</script>

<template>
    <CustomModal v-model="isOpen" @close="isOpen = false" @accept="deleteSurgery">
        <div class="edit-surgery-type-modal-alert-text">
            Estàs segur que vols eliminar el tipus de cirurgia <span class="text-red-500">{{ surgeryType.name }}</span>?
        </div>
    </CustomModal>
    <WizardLayout>
        <DeleteButton class="mb-4" @click="isOpen = true" />
        <form @submit.prevent="submit" class="edit-surgery-type-form">
            <h1 class="edit-surgery-type-form-title">Editant tipus de cirurgia <span class="lowercase">{{ surgeryType.name }}</span></h1>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom del tipus de cirurgia"
                :icon="`${baseUrl}/assets/icons/bone-break.svg`"
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
                :icon="`${baseUrl}/assets/icons/palette.svg`"
                id="color"
                name="color"
                :disabled="true"
            />
            <FormSubmit>Editar</FormSubmit>
        </form>
    </WizardLayout>
</template>

<style scoped>
.edit-surgery-type-form {
    background: none;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.edit-surgery-type-form-title {
    font-size: 1.5rem;
}

.edit-surgery-type-form-title-surgery-name {
    text-transform: lowercase;
    font-weight: 600;
    color: #296fa8;
}

.edit-surgery-type-modal-alert-text {
    font-size: 1.5rem;
}

</style>