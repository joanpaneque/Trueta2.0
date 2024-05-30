<script setup>
import { ref, defineProps, onMounted, defineEmits } from 'vue';

const props = defineProps({
    modelValue: {
        type: String,
        default: ''
    },
    antibiotics: {
        type: Object,
        default: {}
    },
    placeholder: {
        type: String,
        default: ''
    },
    antibiotics: {
        type: Object,
        default: () => ({})
    }
})

const emit = defineEmits(['update:modelValue']);

const initialModelValue = ref(props.modelValue);

const htmlRef = ref(null);

const suggestedAntibiotic = ref(null)

const createRange = (node, targetPosition) => {
    let range = document.createRange();
    range.selectNode(node);
    range.setStart(node, 0);

    let pos = 0;
    const stack = [node];
    while (stack.length > 0) {
        const current = stack.pop();

        if (current.nodeType === Node.TEXT_NODE) {
            const len = current.textContent.length;
            if (pos + len >= targetPosition) {
                range.setEnd(current, targetPosition - pos);
                return range;
            }
            pos += len;
        } else if (current.childNodes && current.childNodes.length > 0) {
            for (let i = current.childNodes.length - 1; i >= 0; i--) {
                stack.push(current.childNodes[i]);
            }
        }
    }

    range.setEnd(node, node.childNodes.length);
    return range;
};


const setPosition = (targetPosition) => {
    const range = createRange(htmlRef.value, targetPosition);
    const selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);
    selection.collapseToEnd();
};

function handleTab(event) {
    if (suggestedAntibiotic.value) {
        event.preventDefault();
        handleSuggestionClick();
    }
}

function scrollToBottom() {
    htmlRef.value.scrollTop = htmlRef.value.scrollHeight;
}

function handleEnter(event) {
    event.preventDefault();
    htmlRef.value.innerHTML += '<br/>&nbsp;';
    // handleSuggestionClick();
    setPosition(htmlRef.value.innerHTML.length);
    scrollToBottom();
    emit('update:modelValue', getModelValue());
}

function handleBackspace(event) {
    if (htmlRef.value.innerText.trim() === '') {
        event.preventDefault();
        htmlRef.value.innerHTML = '';
        emit('update:modelValue', getModelValue());
    }
}

function getContentOnly() {
    return htmlRef.value.innerHTML.replace(/<span class="antibiotic-suggestion">.*?<\/span>/g, '');

}

function getModelValue() {
    const div = document.createElement('div');
    div.innerHTML = getContentOnly().replaceAll('&nbsp;', ' ');
    const antibiotics = div.querySelectorAll('.antibiotic');
    antibiotics.forEach(antibiotic => {
        const id = antibiotic.getAttribute('data-id');
        antibiotic.outerHTML = `{{ ${id} }}`;
    });
    // remove all divs
    div.querySelectorAll('div').forEach(div => {
        div.outerHTML = div.innerHTML;
    });
    return div.innerHTML;
}

function handleSuggestionClick() {
    let content = getContentOnly();
    content = content.split(' ').slice(0, -1).join(' ');
    const hash = Math.random().toString(36).substring(7);
    content += ` <span class="antibiotic" data-id="${suggestedAntibiotic.value.id}" hash="${hash}">${suggestedAntibiotic.value.name}</span>&nbsp;`;
    htmlRef.value.innerHTML = content;
    const antibiotic = htmlRef.value.querySelector(`[hash="${hash}"]`);
    antibiotic.addEventListener('click', e => {
        htmlRef.querySelector(`[hash="${hash}"]`).remove();
    });
    setPosition(content.length);
    suggestedAntibiotic.value = null;
    emit('update:modelValue', getModelValue());
}

const handleInput = (event) => {
    function addClickHandler() {
        const antibioticSuggestion = htmlRef.value.querySelector('.antibiotic-suggestion');
        antibioticSuggestion.addEventListener('click', () => {
            handleSuggestionClick();
        });
    }

    const selection = window.getSelection();
    const range = selection.getRangeAt(0);
    const clonedRange = range.cloneRange();
    clonedRange.selectNodeContents(htmlRef.value);
    clonedRange.setEnd(range.endContainer, range.endOffset);

    const cursorPosition = clonedRange.toString().length;

    const content = getContentOnly();
    const lastWord = content.replaceAll('&nbsp;', ' ').split(' ').pop().replace(/&nbsp;/g, '').toLowerCase();

    const matchedAntibiotics = Object.values(props.antibiotics).filter(antibiotic => antibiotic.name.toLowerCase().startsWith(lastWord));
    if (matchedAntibiotics.length === 1 && lastWord.length > 1) {
        htmlRef.value.innerHTML = getContentOnly();
        htmlRef.value.innerHTML += `<span class="antibiotic-suggestion">${matchedAntibiotics[0].name}</span>`;
        suggestedAntibiotic.value = matchedAntibiotics[0];
        setTimeout(() => {
            addClickHandler();
        }, 0);
        setPosition(cursorPosition);

    } else {
        htmlRef.value.innerHTML = getContentOnly();
    }
    emit('update:modelValue', getModelValue());
    setPosition(cursorPosition);

}
</script>

<template>
    <div class="form-condition-container">
        <div contenteditable="true" class="form-condition-input" v-html="initialModelValue" @input="handleInput" ref="htmlRef" spellcheck="false" @keydown.tab="handleTab" @keydown.backspace="handleBackspace" @keydown.enter="handleEnter"
            :placeholder="placeholder">
        </div>
    </div>
</template>

<style scoped>
.form-condition-input {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    border: 1px solid #ddd;
    padding: 10px;
    max-height: 120px;
    overflow-y: auto;
}

.form-condition-input:focus {
    border: 1px solid #007bff;
    outline: none;
}

.form-condition-input[placeholder]:empty:before {
    content: attr(placeholder);
    color: #ccc;
    font-weight: 500;
}
</style>

<style>
.antibiotic {
    color: #007bff;
    cursor: pointer;
}

.antibiotic:hover {
    text-decoration: line-through;
}

.antibiotic-suggestion {
    background: #ddd;
    font-size: 0.8rem;
    padding: 3px 5px;
    margin-left: 5px;
    border-radius: 5px;
    color: #333;
    font-weight: 600;
    text-transform: capitalize;
    user-select: none;
    cursor: pointer;
}

.antibiotic-suggestion:hover {
    background: #ccc;
}

.antibiotic-suggestion:hover::before {
    content: 'Suggestió';
    position: absolute;
    margin-top: -30px;
    background: #333;
    color: #fff;
    padding: 5px;
    border-radius: 5px;
}
</style>