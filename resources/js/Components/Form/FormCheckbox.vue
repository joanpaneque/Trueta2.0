<script setup>
import { ref, defineProps, defineEmits } from 'vue';

const props = defineProps({
    id: {
        type: Number,
        default: 0
    },
    name: {
        type: String,
        default: ''
    },
    value: {
        type: Boolean,
        default: false
    },
    modelValue: {
        type: Boolean,
        default: false
    }
});

const emits = defineEmits(['input']);

const input = ref(props.modelValue);

const updateInput = (value) => {
    input.value = value;
    emits('input', value);
    emits('update:modelValue', value);
};

const checked = ref(props.modelValue || props.value);


</script>

<template>
    <div class="input-container" @click="checked = !checked; updateInput(checked)">
        <input :id="id" :name="name" type="checkbox" v-model="checked" />
        <label :for="id" class="label">{{ name }}</label>
    </div>
</template>

<style scoped>
    .input-container {
        height: 50px;
        display: flex;
        align-items: center;
        gap: 10px;
        padding-inline: 15px;
        border-radius: 10px;
        border: 1px solid #ddd;
    }

    /* change the color of the checkbox when checked */
    input[type="checkbox"]:focus-within {
        box-shadow: none;
    }

    input[type="checkbox"] {
        border-radius: 5px;
        height: 20px;
        width: 20px;
    }

    label {
        pointer-events: none;
        user-select: none;
    }
</style>
