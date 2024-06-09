<script setup>
import { defineProps } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { router } from '@inertiajs/vue3';
import { parseDate } from '@/Helpers/date';


const props = defineProps({
    auditLogs: {
        type: Object,
        required: true
    }
});

// get the current page
console.log(props.auditLogs);






</script>

<template>
<AuthenticatedLayout>
    <div class="audit-logs-container">
        <div class="audit-logs-header">
            <h1>Registres d'auditoria <br>(pàgina {{ props.auditLogs.current_page }})</h1>
        </div>
        <div class="audit-logs-table">
            <div class="audit-log" v-for="auditLog in props.auditLogs.data" @click="router.get(route('audit-logs.show', auditLog.id))">
                <span class="audit-log-type">
                    <img v-if="auditLog.type === 'update'" src="/assets/icons/refresh.svg" alt="updated">
                </span>
                <span class="audit-log-user">
                    {{ JSON.parse(auditLog.user).name }}
                </span>
                <span class="audit-log-table">
                    {{ auditLog.table_name }}
                </span>
                <span class="audit-log-datetime">
                    {{ parseDate(auditLog.created_at) }}
                </span>
            </div>
        </div>
        <div class="audit-logs-pagination">
            <div class="audit-logs-pagination-previous"
                @click="router.get(route('audit-logs.index'), {'page': parseInt(props.auditLogs.current_page) - 1})"
            >&lt;</div>
            <input type="text" :value="props.auditLogs.current_page">
            <div class="audit-logs-pagination-previous"
            @click="router.get(route('audit-logs.index'), {'page': parseInt(props.auditLogs.current_page) + 1})"
            >&gt;</div>
        </div>
    </div>
</AuthenticatedLayout>
</template>

<style scoped>
    .audit-logs-table {
        display: grid;
        grid-template-rows: repeat(10, 1fr);
        width: 100%;
        gap: 5px;
    }

    .audit-log {
        border-radius: 5px;
        background-color: #01599c20;
        display: grid;
        grid-template-columns: 40px minmax(auto, 0.75fr) minmax(auto, 0.75fr) minmax(auto, 1fr);
        justify-content: stretch;
        align-items: center;
        padding: 8px;
        gap: 10px;
    }

    .audit-log:nth-child(even) {
        background-color: #e77c0c20;
    }

    .audit-log-type img {
        width: 100%;
        height: 100%;
        
    }

    .audit-log-type {
        height: 100%;
        padding: 5px;
    }

    .audit-log span {
        border-radius: 3px;
        height: 100%;
        display: flex;
        align-items: center;
        padding-inline: 5px;
        background: #01599c50;
        width: 100%;
        overflow: hidden;
    }

    .audit-log:nth-child(even) span {
        background-color: #e77c0c50;
    }

    .audit-logs-header h1 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .audit-logs-pagination {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        gap: 5px;
        height: 40px;
        margin-top: 20px;
    }

    .audit-logs-pagination div {
        display: flex;
        width: 40px;
        height: 100%;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        background: #ddd;
        border-radius: 5px;
    }

    .audit-logs-pagination input {
        width: 40px;
        height: 100%;
        border-radius: 5px;
    }
</style>