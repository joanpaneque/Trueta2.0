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
    }
});

const emits = defineEmits(['update:modelValue']);

const input = ref(props.modelValue);

watch(() => props.modelValue, (newValue) => {
    input.value = newValue;
});

const updateInput = (value) => {
    input.value = value;
    emits('update:modelValue', value);
};
</script>

<template>
    <div class="input-container">
        <label :for="id" class="label" style="display: none;">Dummy</label>
        <textarea :id="id" :name="name" autofocus autocomplete="off" v-model="input"
            @input="updateInput($event.target.value)" :placeholder="placeholder" :autofocus="autofocus"></textarea>
        <img :src="icon" alt="Icon" class="icon">
    </div>
</template>

<style scoped>
textarea {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    width: 100%;
    color: #000;
    padding-left: 40px;
    border: 1px solid #ddd;
    resize: none;
    min-height: 200px;
}

textarea:focus-within {
    box-shadow: none;
}

.icon {
    width: 20px;
    height: 20px;
    position: absolute;
    top: 10px;
    left: 10px;
}

.input-container {
    position: relative;
}

textarea::placeholder {
    color: #bbb;
}
</style>
