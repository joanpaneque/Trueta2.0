<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps, ref, computed } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    antibiotics: {
        type: Array,
        default: () => ([])
    }
})

const searchQuery = ref('');

const filteredAntibiotics = computed(() => {
    if (!searchQuery.value) {
        return props.antibiotics;
    }
    return props.antibiotics.filter(antibiotic =>
        antibiotic.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});

const baseUrl = import.meta.env.VITE_APP_URL;

</script>
<template>
    <AuthenticatedLayout>
        <div class="antibiotics-index-container">
            <div class="create-button-container" @click="router.get(route('antibiotics.create'))">
                <img :src="`${baseUrl}/assets/icons/add.svg`" alt="Create" />
                <span>Crear antibiòtic</span>
            </div>
            <div class="antibiotics-index-search">
                <input v-model="searchQuery" type="text" :placeholder="`Cerca un antibiòtic`">
                <img :src="`${baseUrl}/assets/icons/search.svg`" alt="Cerca" />
            </div>
            <div class="antibiotics-list">
                <div v-for="antibiotic in filteredAntibiotics" :key="antibiotic.id" class="antibiotic-item"
                    @click="router.get(route('antibiotics.show', antibiotic.id))">
                    <h3>{{ antibiotic.name }}</h3>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>

.antibiotics-index-container {
    display: grid;
    gap: 15px;
}
.antibiotics-index-search {
    position: relative;
}

.antibiotics-list {
    display: grid;
    gap: 15px;
}

.antibiotics-index-search input {
    border-radius: 10px;
    border: 1px solid #d9d9d9;
    width: 100%;
    padding-left: 37px;
    padding-top: 8px;
    padding-bottom: 8px;
}

.antibiotics-index-search img {
    width: 20px;
    height: 20px;
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}

.antibiotic-item {
    border: 1px solid #d9d9d9;
    border-radius: 10px;
    padding: 16px;
    background: #f9f9f9;
    background: linear-gradient(to right, #01599c34, #01599c02);
    color: #000000;
    transition: background 0.1s;
}

.antibiotic-item:hover {
    background: #f9f9f9;
    background: linear-gradient(to right, #01599c34, #01599c48);
    transition: background 0.1s;
    cursor: pointer;
}

.antibiotic-item h3 {
    margin: 0;
    font-size: 18px;
}

.antibiotic-item p {
    color: #555;
    font-size: 14px;
}

.create-button-container {
    background: #296fa8;
    height: 50px;
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: background 0.1s;
}

.create-button-container img {
    height: 23px;
    filter: invert(100%);
}

.create-button-container:hover {
    background: #1f4e7a;
    cursor: pointer;
}

.create-button-container span {
    color: white;
    font-size: 1.2rem;
    margin-left: 10px;
}
</style>
