<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="guest-layout-container">
        <div class="guest-layout-background"></div>
        <div class="guest-layout-background background-2"></div>
        <div class="guest-layout-background background-3"></div>

        <div class="guest-layout-content">
            <slot />
        </div>
    </div>
</template>

<style scoped>
.guest-layout-background {
    animation: slide 6s ease-in-out infinite alternate;
    background-image: linear-gradient(-60deg, #00599c 50%, #e87d0d 50%);
    bottom: 0;
    left: -50%;
    opacity: .5;
    position: fixed;
    right: -50%;
    top: 0;
    z-index: -1;
}

.guest-layout-background.background-2 {
    animation-direction: alternate-reverse;
    animation-duration: 8s;
}

.guest-layout-background.background-3 {
    animation-duration: 10s;
}

.guest-layout-content {
    left: 50%;
    position: fixed;
    text-align: center;
    top: 50%;
    transform: translate(-50%, -50%);
    width: calc(100% - 50px);
    max-width: 400px;
    padding: 30px;
    border-radius: 20px;
    background: #fff;
}

@keyframes slide {
    0% {
        transform: translateX(-25%);
    }

    100% {
        transform: translateX(25%);
    }
}
</style>