<script setup>

</script>

<template>
    <div class="create-button-container">
        <img src="/assets/icons/add.svg" alt="Create" />
    </div>
</template>

<style scoped>
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
        height: 25px;
        filter: invert(100%);
    }

    .create-button-container:hover {
        background: #1f4e7a;
        cursor: pointer;
    }
</style>