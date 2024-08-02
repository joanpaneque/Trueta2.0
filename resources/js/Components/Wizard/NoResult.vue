<script setup>
    import { defineProps } from 'vue';
    const props = defineProps({
        message: {
            type: String,
            default: ''
        }
    })
</script>

<template>
    <div class="no-result-container">
        <div class="ambulance-gif">
            <img src="assets/gifs/ambulance.gif" alt="Tipus de cirurgia" />
        </div>
        <p class="surgery-type-info" v-html="message.split('\\n').join('<br>')">
        </p>
    </div>
</template>

<style scoped>
    .ambulance-gif img {
        transform: scale(1.4);
    }

    .ambulance-gif {
        height: 200px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .surgery-type-info {
        text-align: center;
        font-size: 1.2rem;
        margin-top: 20px;
    }
</style>