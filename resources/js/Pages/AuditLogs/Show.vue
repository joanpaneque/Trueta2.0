<script setup>
    import { defineProps } from 'vue';
    import { router } from '@inertiajs/vue3';
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
    import { parseDate } from '@/Helpers/date';

    const props = defineProps({
        auditLog: {
            type: Object,
            required: true
        },
        referer: {
            type: String,
            required: true
        }
    });

    function goBack() {
        if (window.location.href === props.referer) {
            router.get(route('audit-logs.index'));
        } else {
            router.get(props.referer);
        }
    }
</script>

<template>
    <AuthenticatedLayout>
        <div class="audit-log-container">
            <div class="audit-log-go-back-container" @click="goBack">
                <img src="/assets/icons/undo.svg" alt="Tornar" />
                <span>Tornar</span>
            </div>
            <div class="audit-log-content">
                <h1>L'usuari:</h1>
                <p v-html="auditLog.user.replaceAll(',','<br>')" class="json"></p>
                <h1>Descripció:</h1>
                <p class="json blue">{{ auditLog.description }}</p>
                <h1>Acció:</h1>
                <p class="json blue">{{ auditLog.type }}</p>
                <h1>Taula:</h1>
                <p class="json blue">{{ auditLog.table_name }}</p>
                <h1>Data i hora:</h1>
                <p class="json blue">{{ parseDate(auditLog.created_at) }}</p>
                <div v-if="auditLog.type === 'update'">
                <h1>Dades originals</h1>
                <p v-html="auditLog.old_values.replaceAll(',','<br>').replaceAll('\\n','<br>')" class="json"></p>
                <h1>Dades canviades</h1>
                <p v-html="auditLog.new_values.replaceAll(',','<br>').replaceAll('\\n','<br>')" class="json"></p>
                </div>
                <div v-if="auditLog.type === 'delete'">
                    <h1>Contingut eliminat</h1>
                    <p v-html="auditLog.old_values.replaceAll(',','<br>').replaceAll('\\n','<br>')" class="json"></p>
                </div>
                <div v-if="auditLog.type === 'create'">
                    <h1>Contingut creat</h1>
                    <p v-html="auditLog.new_values.replaceAll(',','<br>').replaceAll('\\n','<br>')" class="json"></p>
                </div>
            </div>
        </div>
</AuthenticatedLayout>

</template>

<style scoped>
    .audit-log-go-back-container {
        background: #296fa8;
        height: 50px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background 0.1s;
    }

    .audit-log-go-back-container img {
        height: 23px;
        filter: invert(100%);
    }

    .audit-log-go-back-container:hover {
        background: #1f4e7a;
        cursor: pointer;
    }

    .audit-log-go-back-container span {
        color: white;
        font-size: 1.2rem;
        margin-left: 10px;
    }

    .json {
        white-space: pre-wrap;
        background-color: #e77d0c20;
        border: 2px solid #e77d0c;
        color: #e77d0c;
        padding: 10px;
        border-radius: 10px;
    }

    .json.blue {
        background-color: #1f4e7a20;
        border: 2px solid #1f4e7a;
        color: #1f4e7a;
    }

    .audit-log-content h1 {
        font-size: 1.5rem;
        margin-top: 20px;
    }
</style>