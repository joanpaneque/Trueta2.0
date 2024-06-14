<script setup>
import { defineProps, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import WizardLayout from '@/Layouts/WizardLayout.vue';
import FormInput from '@/Components/Form/FormInput.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import FormColor from '@/Components/Form/FormColor.vue';
import DeleteButton from '@/Components/Buttons/DeleteButton.vue';
import CustomModal from '@/Components/CustomModal.vue';

const props = defineProps({
    surgery: {
        type: Object,
        default: () => ({})
    },
    surgeryId: {
        type: String,
        default: '0'
    }
});

const form = useForm({
    name: props.surgery.name,
    color: props.surgery.color
});

const submit = () => {
    form.put(route('surgeries.update', props.surgery.id));
};

const deleteSurgery = () => {
    form.delete(route('surgeries.destroy', props.surgery.id));
};

const isOpen = ref(false);

</script>

<template>
    <CustomModal v-model="isOpen" @close="isOpen = false" @accept="deleteSurgery">
        <div class="edit-surgery-modal-alert-text">
            Estàs segur que vols eliminar la cirurgia <span class="text-red-500">{{ props.surgery.name }}</span>?
        </div>
    </CustomModal>
    <WizardLayout>
        <DeleteButton class="mb-4" @click="isOpen = true" />
        <form @submit.prevent="submit" class="edit-surgery-form">
            <h1 class="edit-surgery-form-title">Editant cirurgia</h1>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom de la cirurgia"
                icon="/assets/icons/bone-break.svg"
                id="name"
                name="name"
                autofocus
            />
            <FormColor
                v-model="form.color"
                placeholder="Color de la cirurgia"
                icon="/assets/icons/palette.svg"
                id="color"
                name="color"
            />
            <FormSubmit>Editar cirurgia</FormSubmit>
        </form>
    </WizardLayout>
</template>

<style scoped>
.edit-surgery-form {
    background: none;
    display: flex;
    flex-direction: column;
    gap: 15px;
}
.edit-surgery-form-title {
    font-size: 1.5rem;
}

.edit-surgery-modal-alert-text {
    font-size: 1.5rem;
}

</style>