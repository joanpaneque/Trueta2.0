<script setup>
import { ref, defineProps, defineEmits, watch } from 'vue';

const props = defineProps({
    placeholder: {
        type: String,
        default: ''
    },
    modelValue: {
        type: String,
        default: ''
    },
    value: {
        type: String,
        default: ''
    },
    icon: {
        type: String,
        default: ''
    },
    id: {
        type: String,
        default: ''
    },
    name: {
        type: String,
        default: ''
    },
    autofocus: {
        type: Boolean,
        default: false
    },
    disabled: {
        type: Boolean,
        default: false
    }
});

const emits = defineEmits(['update:modelValue']);

const input = ref(props.modelValue || props.value);

watch(() => props.modelValue, (newValue) => {
    input.value = newValue;
});

const updateInput = (value) => {
    input.value = value;
    emits('update:modelValue', value);
};
</script>

<template>
    <div class="input-container" :class="{ 'disabled': disabled }">
        <label :for="id" class="label" style="display: none;">Dummy</label>
        <label :for="'color-'+id" class="label" style="display: none;">Dummy</label>
        <input :name="name" required autocomplete="off"
             :placeholder="placeholder" type="text" disabled :id="id">
        <img :src="icon" alt="Icon" class="icon">
        <input type="color" v-model="input" @input="updateInput($event.target.value)" :id="'color-'+id" :name="name"/>
    </div>
</template>

<style scoped>
input {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    backdrop-filter: blur(10px);
    width: 100%;
    color: #000;
    padding-left: 40px;
    border: 1px solid #ddd;
}

input:focus-within {
    box-shadow: none;
}

.icon {
    width: 20px;
    height: 20px;
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
}

.input-container {
    position: relative;
}

input::placeholder {
    color: #000;
}

input[type="color"] {
    background: #fff;
    padding: 2px 3px;
    height: 30px;
    width: 40px;
    position: absolute;
    right: 7px;
    top: 50%;
    transform: translateY(-50%);
    border-radius: 8px;
}

.input-container.disabled {
    opacity: 0.5;
    pointer-events: none;
}

.input-container.disabled:hover {
    cursor: not-allowed;
}
</style>
