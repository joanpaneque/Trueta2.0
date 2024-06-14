<script setup>
import { defineProps, ref, computed } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router, usePage } from '@inertiajs/vue3';
import CustomModal from '@/Components/CustomModal.vue';

const props = defineProps({
    userRequests: {
        type: Array,
        required: true
    },
    userRegistrations: {
        type: Array,
        required: true
    },
    userDeactivations: {
        type: Array,
        required: true
    }
});

const user = usePage().props.auth.user;

// Registrations: 0
// Deactivations: 1
// Requests: 2
const selectedTab = ref(0);
const searchQuery = ref('');

function filterWithQuery(user) {
    if (!user) return false;
    return user.email.toLowerCase().includes(searchQuery.value.toLowerCase());
}

const filteredUserRegistrations = computed(() => {
    return props.userRegistrations.filter(filterWithQuery);
});

const filteredUserDeactivations = computed(() => {
    return props.userDeactivations.filter(filterWithQuery);
});

const filteredUserRequests = computed(() => {
    return props.userRequests.filter(filterWithQuery);
});

const isOpen = ref(false);
const userToDeactivate = ref(null);

function deactivateUser(user) {
    userToDeactivate.value = user;
    isOpen.value = true;
}

function performUserDeactivation() {
    router.put(route('users.deactivate', userToDeactivate.value.id));
    isOpen.value = false;
}

</script>

<template>
    <CustomModal v-model="isOpen" @close="isOpen = false" @accept="performUserDeactivation">
        <div class="deactivate-user-modal-alert-text">
            Estàs segur que vols donar de baixa l'usuari <span class="text-red-500">{{ userToDeactivate.email }}</span>?
        </div>
    </CustomModal>
    <AuthenticatedLayout>
        <div class="profile-index-container">
            <div class="profile-index-tab-selector">
                <div
                    :class="selectedTab === 0 ? 'profile-index-tab-selector-selected' : ''"
                    @click="selectedTab = 0"
                >
                    <span>Altes</span>
                    <span class="profile-index-tab-counter">{{ props.userRegistrations.length }}</span>
                </div>
                <div
                    :class="selectedTab === 1 ? 'profile-index-tab-selector-selected' : ''"
                    @click="selectedTab = 1"
                >
                    <span>Baixes</span>
                    <span class="profile-index-tab-counter">{{ props.userDeactivations.length }}</span>
                </div>
                <div
                    :class="selectedTab === 2 ? 'profile-index-tab-selector-selected' : ''"
                    @click="selectedTab = 2"
                >
                    <span>Sol·licituds</span>
                    <span class="profile-index-tab-counter">{{ props.userRequests.length }}</span>
                </div>
            </div>
            <div class="profile-index-search">
                <input v-model="searchQuery" type="text" :placeholder="`Cerca un usuari dins ${selectedTab === 0 ? 'd\'altes' : selectedTab === 1 ? 'de baixes' : 'de sol·licituds'}`">
                <img src="/assets/icons/search.svg" alt="Cerca">
            </div>
            <div v-if="selectedTab === 0">
                <div class="profile-index-tab">
                    <h1>Altes</h1>
                    <div class="profile-index-tab-content">
                        <div class="profile-index-tab-content-header">
                            <span>Correu electrònic</span>
                            <span>Accions</span>
                        </div>
                        <div class="profile-index-tab-content-row" v-for="userRegistration in filteredUserRegistrations" :key="userRegistration.email">
                            <span>{{ userRegistration.email }}</span>
                            <span class="profile-index-tab-content-row-actions">
                                <button @click="deactivateUser(userRegistration)" v-if="userRegistration.id !== user.id" class="red-button">
                                    <img src="/assets/icons/arrow-small-down.svg" alt="Acceptar">
                                </button>
                                <button @click="router.get(route('profile.edit', userRegistration.id))">
                                    <img src="/assets/icons/edit.svg" alt="Editar">
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else-if="selectedTab === 1">
                <div class="profile-index-tab">
                    <h1>Baixes</h1>
                    <div class="profile-index-tab-content">
                        <div class="profile-index-tab-content-header">
                            <span>Correu electrònic</span>
                            <span>Accions</span>
                        </div>
                        <div class="profile-index-tab-content-row" v-for="userDeactivation in filteredUserDeactivations" :key="userDeactivation.email">
                            <span>{{ userDeactivation.email }}</span>
                            <span class="profile-index-tab-content-row-actions">
                                <button @click="router.put(route('users.register', userDeactivation.id))" class="green-button">
                                    <img src="/assets/icons/arrow-small-up.svg" alt="Acceptar">
                                </button>
                                <button @click="router.get(route('profile.edit', userDeactivation.id))">
                                    <img src="/assets/icons/edit.svg" alt="Editar">
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else-if="selectedTab === 2">
                <div class="profile-index-tab">
                    <h1>Sol·licituds</h1>
                    <div class="profile-index-tab-content">
                        <div class="profile-index-tab-content-header">
                            <span>Correu electrònic</span>
                            <span>Accions</span>
                        </div>
                        <div class="profile-index-tab-content-row" v-for="userRequest in filteredUserRequests" :key="userRequest.email">
                            <span>{{ userRequest.email }}</span>
                            <span class="profile-index-tab-content-row-actions">
                                <button @click="router.put(route('users.register', userRequest.id))" class="green-button">
                                    <img src="/assets/icons/arrow-small-up.svg" alt="Rebutjar">
                                </button>
                                <button @click="router.get(route('profile.edit', userRequest.id))">
                                    <img src="/assets/icons/edit.svg" alt="Editar">
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style scoped>

.profile-index-container {
    display: grid;
    gap: 15px;
}

.profile-index-search {
    position: relative;
}

.profile-index-search input {
    border-radius: 10px;
    border: 1px solid #d9d9d9;
    width: 100%;
    padding-left: 37px;
}

.profile-index-search img {
    width: 20px;
    height: 20px;
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
}


.profile-index-tab-selector {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    padding: 10px;
    gap: 10px;
    border-radius: 10px;
    background: #d9d9d9;
    user-select: none;

}

.profile-index-tab-selector div {
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: rgba(255, 255, 255, 1);
    flex-direction: column;
    padding: 5px;

}

.profile-index-tab-selector .profile-index-tab-selector-selected {
    background: #296fa8;
    color: white;
}

.profile-index-tab-counter {
    font-size: 1rem;
    background: #e77c0c;
    padding: 2px 10px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 0.8rem;
}

.profile-index-tab-selector-selected  .profile-index-tab-counter {
    background: #fff;
    color: black;
}

.profile-index-tab {
    background: #f9f9f9;
    border: 1px solid #d9d9d9;
    border-radius: 10px;
    padding: 15px;
}

.profile-index-tab h1 {
    margin-bottom: 15px;
    color: #333;
    font-size: 1.5rem;
}

.profile-index-tab-content {
    display: grid;
    gap: 10px;
}



.profile-index-tab-content-header span:first-child {
    text-align: left;
    overflow: hidden;
    width: 100%;
}

.profile-index-tab-content-header span:last-child {
    text-align: right;
    
}

.profile-index-tab-content-header {
    display: grid;
    grid-template-columns: auto 90px;
    background: #e0e0e0;
    padding: 10px;
    border-radius: 5px;
    font-weight: bold;
    color: #555;
}

.profile-index-tab-content-row {
    display: grid;
    grid-template-columns: auto 90px;
    background: #fff;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #e0e0e0;
    transition: background 0.3s ease;
}

.profile-index-tab-content-row:hover {
    background: #f1f1f1;
}

.profile-index-tab-content-row span {
    align-self: center;
    overflow: hidden;
    text-overflow: ellipsis;
}

.profile-index-tab-content-row-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
}

.profile-index-tab-content-row-actions button {
    border: none;
    border-radius: 5px;
    padding: 5px;
    transition: background 0.3s ease;
}

.profile-index-tab-content-row-actions .red-button {
    background: #c13232;
}

.profile-index-tab-content-row-actions .green-button {
    background: #2c9c2c;
}

.profile-index-tab-content-row-actions button:last-child {
    background: #0c8ce7;
}

.profile-index-tab-content-row-actions button img {
    width: 27px;
    height: 27px;
    filter: invert(1);
}

.deactivate-user-modal-alert-text {
    font-size: 1.5rem;

}
</style>