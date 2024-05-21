<script setup>
import { defineEmits } from 'vue';

const emits = defineEmits(['submit']);

const handleClick = () => {
    emits('submit');
};
</script>

<template>
    <button class="submit-button" @click="handleClick">
        <slot>Submit</slot>
    </button>
</template>

<style scoped>
.submit-button {
    border: none;
    border-radius: 10px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;

    background: #ea8b29;
    color: #fdfdfd;
}

.submit-button:hover {
}
</style>
