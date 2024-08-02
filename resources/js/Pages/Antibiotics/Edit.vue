<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps, ref } from 'vue';
import { useForm, router } from '@inertiajs/vue3';
import FormInput from '@/Components/Form/FormInput.vue';
import FormTextarea from '@/Components/Form/FormTextarea.vue';
import FormSubmit from '@/Components/Form/FormSubmit.vue';
import CustomModal from '@/Components/CustomModal.vue';
import DeleteButton from '@/Components/Buttons/DeleteButton.vue';

const props = defineProps({
    antibiotic: {
        type: Object,
        default: () => ({})
    },
    deleted: {
        type: Boolean,
        default: false
    },
    referer: {
        type: String,
        default: ''
    }
});

const form = useForm({
    name: props.antibiotic.name,
    description: props.antibiotic.description
});

function submit() {
    form.put(route('antibiotics.update', props.antibiotic.id));
}

function deleteAntibiotic() {
    form.delete(route('antibiotics.destroy', props.antibiotic.id));
}

const isOpen = ref(false);

const baseUrl = import.meta.env.VITE_APP_URL;

</script>

<template>
    <CustomModal v-model="isOpen" @close="isOpen = false" @accept="deleteAntibiotic">
        <div class="edit-antibiotic-modal-alert-text">
            Estàs segur que vols eliminar l'antibiòtic <span class="text-red-500">{{ props.antibiotic.name }}</span>?
        </div>
    </CustomModal>
    <AuthenticatedLayout>
        <div class="go-back-button-container mb-4" @click="router.get(props.referer)">
            <img :src="`${baseUrl}/assets/icons/undo.svg`" alt="Undo" />
            <span class="go-back-button-text">Tornar</span>
        </div>
        <DeleteButton class="mb-4" @click="isOpen = true" v-if="!props.deleted" />
        <div v-else class="deleted-antibiotic">
            Aquest antibiòtic ha estat eliminat.
        </div>
        <form @submit.prevent="submit" class="edit-antibiotic-form">
            <h1 class="edit-antibiotic-form-title">Editant antibiòtic</h1>
            <FormInput
                v-model="form.name"
                type="text"
                placeholder="Nom"
                :icon="`${baseUrl}/assets/icons/medicine.svg`"
                id="name"
                name="name"
                autofocus
            />
            <FormTextarea
                v-model="form.description"
                placeholder="Descripció"
                :icon="`${baseUrl}/assets/icons/description-alt.svg`"
                id="description"
                name="description"
            />
            <FormSubmit>Desar</FormSubmit>
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

.edit-antibiotic-modal-alert-text {
    font-size: 1.5rem;
}

.deleted-antibiotic {
    font-size: 1.5rem;
    color: #f56565;
}

.go-back-button-container {
    background: #296fa8;
    height: 50px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background 0.1s;
    cursor: pointer;
}

.go-back-button-container img {
    height: 23px;
    filter: invert(100%);
}

.go-back-button-container:hover {
    background: #1f4e7a;
}

.go-back-button-container span.go-back-button-text {
    color: white;
    font-size: 1.2rem;
    margin-left: 10px;
}
</style>
