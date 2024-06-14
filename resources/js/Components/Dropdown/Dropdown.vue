<script setup>
import { ref, defineProps, onMounted, onUnmounted } from 'vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { usePage } from '@inertiajs/vue3';

// const { user } = usePage().props.value;


const user = usePage().props.auth.user;

const props = defineProps({
    routes: Object,
});

const isDropdownUnfolded = ref(false);

function toggleDropdown(event) {
    isDropdownUnfolded.value = !isDropdownUnfolded.value;
}

function handleClickOutside(event) {
    const dropdownContainer = document.querySelector('.buildable-dropdown-container');
    if (dropdownContainer && !dropdownContainer.contains(event.target)) {
        isDropdownUnfolded.value = false;
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});

onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});

</script>
<template>
    <div class="buildable-dropdown-container">
        <button @click="toggleDropdown" type="button" class="dropdown-button">
            <span>{{ user.name }} {{ user.surnames }}</span>
            <img src="/assets/icons/arrow.svg" alt="arrow"
                :style="{ transform: isDropdownUnfolded ? 'rotate(180deg)' : 'rotate(0deg)' }" />
        </button>
        <div v-show="isDropdownUnfolded" class="dropdown-options">
            <div v-for="dropdownRoute in routes">
                <DropdownLink class="dropdown-link" :href="route(dropdownRoute.route, dropdownRoute.params)"
                    :method="dropdownRoute.method ?? 'GET'" as="button" v-if="
                    (dropdownRoute.isAdmin && user.is_admin) || (dropdownRoute.isManager && user.is_manager) || (!dropdownRoute.isAdmin && !dropdownRoute.isManager)
                    "> {{ dropdownRoute.label }}
                </DropdownLink>
            </div>
        </div>
    </div>
</template>

<style scoped>
.buildable-dropdown-container {
    height: 100%;
    width: 100%;
    background: #D9D9D9;
    border-radius: 10px;
    position: relative;
}

.buildable-dropdown-container .dropdown-button {
    height: 50px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 5px;
    text-transform: uppercase;
}

.buildable-dropdown-container img {
    height: 20px;
}

.dropdown-options {
    position: absolute;
    margin-top: 10px;
    min-width: 100%;
    width: fit-content;
    border-radius: 10px;
    overflow: hidden;
    border: 1px solid #D9D9D9;
    z-index: 1000;
}


.dropdown-link {
    width: 100%;
    padding: 10px 15px;
    background: #f5f5f5;
    text-align: left;
}

.dropdown-link:not(:last-child) {
    border-bottom: 1px solid #D9D9D9;
}

.dropdown-link:hover {
    background: #D9D9D9;
}
</style>
