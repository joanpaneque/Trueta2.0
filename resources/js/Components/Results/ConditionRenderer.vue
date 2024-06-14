<script setup>
import { ref, defineProps, onMounted, onUnmounted } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    html: {
        type: String,
        default: ''
    },
    antibiotics: {
        type: Object,
        default: () => ({})
    }
});


const htmlRef = ref(null);
const selectedAntibiotic = ref(null);


function encodeHTML(html) {
    return html.replace(/{{(.*?)}}/g, (match, p1) => {
        const antibiotic = props.antibiotics.find(antibiotic => antibiotic.id === parseInt(p1));
        if (antibiotic) {
            return `<span class="antibiotic-render" data-id="${antibiotic.id}">${antibiotic.name}</span>`;
        }
        return match;
    }).replace(/\n/g, '<br>');
}
const encodedHTML = ref(encodeHTML(props.html));

onMounted(() => {
    htmlRef.value.querySelectorAll('.antibiotic-render').forEach((element) => {
        element.addEventListener('click', () => {
            router.get(route('antibiotics.show', element.getAttribute('data-id')));
        });
    });
});


</script>

<template>
    <div class="condition-renderer-antibiotic-info" v-if="selectedAntibiotic">
        <div class="condition-renderer-antibiotic-info-header" @click="selectedAntibiotic = null">
            <span>Tancar</span>
        </div>
        <div class="condition-renderer-antibiotic-info-content">
            <h1 class="condition-renderer-antibiotic-info-name">{{ selectedAntibiotic.name }}</h1>
            <p class="condition-renderer-antibiotic-info-description" v-html="selectedAntibiotic.description.replaceAll('\n', '<br>')"></p>
        </div>
    </div>
    <div class="condition-renderer-container" v-html="encodedHTML" ref="htmlRef">
    </div>
</template>


<style scoped>
    .condition-renderer-container {
        line-height: 2;
        background: #c3e4ff;
        border-radius: 10px;
        padding: 10px; 
        margin-bottom: 20px;
    }

    .condition-renderer-antibiotic-info {
        position: fixed;
        top: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(2px);
        width: 100%;
        height: 100vh;
    }

    .condition-renderer-antibiotic-info-header {
        background: rgba(0, 0, 0, 0.8);
        color: #fff;
        padding: 10px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .condition-renderer-antibiotic-info-name {
        font-size: 1.5rem;
        color: #007bff;
        background: #fff;
        padding: 10px;
        text-align: center;
    }

    .condition-renderer-antibiotic-info-description {
        padding: 10px;
        background: #fff;
        border-radius: 10px;
        margin-top: 10px;
        height: 50vh;
        overflow-y: auto;
    }
</style>
<style>
    .antibiotic-render {
        background: #FF6100;
        padding: 5px 10px;
        color: #ffffff;
        border-radius: 5px;
    }
</style>