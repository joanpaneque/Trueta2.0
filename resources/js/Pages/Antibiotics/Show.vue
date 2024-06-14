<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    antibiotic: {
        type: Object,
        default: () => ({})
    },
    referer: {
        type: String,
        default: ''
    }
})

const formatDescription = (description) => {
    return description.replace(/\n/g, '<br>');
}
</script>

<template>
    <AuthenticatedLayout>
        <div class="go-back-button-container mb-4" @click="router.get(props.referer)">
            <img src="/assets/icons/undo.svg" alt="Edit" />
            <span class="go-back-button-text">Tornar</span>
        </div>
        <div class="edit-button-container mb-4" @click="router.get(route('antibiotics.edit', props.antibiotic.id))">
            <img src="/assets/icons/edit.svg" alt="Edit" />
            <span class="edit-button-text">Editar <span class="lowercase">{{ props.antibiotic.name }}</span></span>
        </div>
        <div class="antibiotic-show-container">
            <h1>Nom de l'antibiòtic</h1>
            <p>{{ props.antibiotic.name }}</p>
            <h1>Descripció</h1>
            <p v-html="formatDescription(props.antibiotic.description)" class="json"></p>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.antibiotic-show-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.antibiotic-show-container h1 {
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.antibiotic-show-container p {
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
}

.antibiotic-show-container p.json {
    white-space: pre-wrap;
}

.antibiotic-show-container p:last-child {
    margin-bottom: 0;
}

.edit-button-container, .go-back-button-container {
    background: #296fa8;
    height: 50px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background 0.1s;
}

.edit-button-container img, .go-back-button-container img {
    height: 23px;
    filter: invert(100%);
}

.edit-button-container:hover {
    background: #1f4e7a;
    cursor: pointer;
}

.edit-button-container span.edit-button-text, .go-back-button-container span.go-back-button-text{
    color: white;
    font-size: 1.2rem;
    margin-left: 10px;
}
</style>
