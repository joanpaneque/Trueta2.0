<script setup>

</script>

<template>
    <div class="delete-button-container">
        <img src="/assets/icons/trash.svg" alt="Esborrar" />
        <span>Eliminar</span>
    </div>
</template>

<style scoped>
    .delete-button-container {
        background: #fa3c3c;
        height: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background 0.1s;
    }

    .delete-button-container img {
        height: 23px;
        filter: invert(100%);
    }

    .delete-button-container:hover {
        background: #9b2525;
        cursor: pointer;
    }

    .delete-button-container span {
        color: white;
        font-size: 1.2rem;
        margin-left: 10px;
    }
</style>