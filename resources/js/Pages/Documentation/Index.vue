<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

function newTab(url) {
    window.open(url, '_blank');
}

</script>

<template>
    <AuthenticatedLayout>
        <h1 class="text-2xl font-semibold text-gray-900">Manuals</h1>
        <div class="grid gap-4">
            <div class="documentation-pdf" @click="newTab('/docs/Manual_Usuari_Trueta_Mobile.pdf')">
                <img src="/assets/icons/file-pdf.svg" alt="PDF" />
                <span>Manual d'usuari per dispositius mòbils</span>
            </div>
            <div class="documentation-pdf" @click="newTab('/docs/Manual_Administrador_Gestor_Trueta_Mobile.pdf')">
                <img src="/assets/icons/file-pdf.svg" alt="PDF" />
                <span>Manual de gestor i administrador per dispositius mòbils</span>
            </div>
        </div>
        <h1 class="text-2xl font-semibold text-gray-900 mt-5">Versions i crèdits</h1>
        <div class="versions-grid">
            <div class="version-card">
                <h2>Trueta OPA Beta v0.9.0 <br>13 de juny de 2024</h2>
                <h3>Desenvolupador:</h3>
                <h3><a href="https://www.linkedin.com/in/joan-paneque-domingo-906340237/" target="_blank" class="developer-name">Joan Paneque Domingo</a></h3>

                <h3>Canvis:</h3>
                <ul>
                    <li>Migració i refactorització de tot el codi a Laravel 11</li>
                    <li>Arreglats bugs de la versió anterior</li>
                    <li>Millora de la interfície gràfica</li>
                    <li>Millora de la seguretat</li>
                    <li>Documentació creada</li>
                    <li>Eliminació del sistema multi-idioma</li>
                    <li>Funcionalitats noves: </li>
                    <ul>
                        <li>Al crear una cirurgia es pot assignar un color</li>
                        <li>Es poden modificar les cirurgies</li>
                        <li>Es poden eliminar les cirurgies</li>
                        <li>Es pot modificar un tipus de cirurgia</li>
                        <li>Es pot eliminar un tipus de cirurgia</li>
                        <li>Es pot modificar una condició de salut</li>
                        <li>Es pot eliminar una condició de salut</li>
                        <li>Nou sistema intel·ligent per autocompletar antibiòtics quan s'està definint una condició de salut</li>
                        <li>Ara els usuaris poden enviar sol·licituds d'alta als administradors</li>
                        <li>Nou apartat "Gestió d'usuaris" per administradors per controlar l'alta, baixa i sol·licituds d'usuaris</li>
                        <li>Nou apartat "Registres d'auditoria" per veure els canvis fets a la base de dades</li>
                    </ul>
                </ul>
            </div>

            <div class="version-card">
                <h2>Trueta OPA Alpha v0.1.0 <br>11 d'abril de 2024</h2>
                <h3>Desenvolupadors:</h3>
                <h3><a href="https://www.linkedin.com/in/joan-paneque-domingo-906340237/" target="_blank" class="developer-name">Joan Paneque Domingo</a></h3>
                <h3><a href="https://www.linkedin.com/in/emma-cardosa-mart%C3%ADnez-8b6b8b268/" target="_blank" class="developer-name">Emma Cardosa Martínez</a></h3>
                <h3><a href="https://www.linkedin.com/in/aniol-moreno-batlle/" target="_blank" class="developer-name">Aniol Moreno Batlle</a></h3>
                <h3><a href="https://www.linkedin.com/in/alex-escribano-reina-3560211a3/" target="_blank" class="developer-name">Alex Escribano Reina</a></h3>
                <h3><a href="https://www.linkedin.com/in/luis-antonio-arauz-ortiz-719b66207/" target="_blank" class="developer-name">Luis Antonio Arauz Ortiz</a></h3>
                <h3><a href="https://www.linkedin.com/in/adria-moya-5216881a3/" target="_blank" class="developer-name">Adrià Moya Duran</a></h3>       
            
                <h3>Contingut base:</h3>
                <ul>
                    <li>Creació de cirurgies</li>
                    <li>Creació de tipus de cirurgies</li>
                    <li>Creació de condicions de salut</li>
                    <li>Creació d'antibiòtics</li>
                    <li>Panell d'administrador</li>
                    <li>Pàgina de perfil</li>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.documentation-pdf {
    width: 100%;
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 15px;
    display: flex;
    align-items: center;
    gap: 20px;
}

.documentation-pdf img {
    height: 30px;
    width: 30px;
}

.versions-grid {
    display: grid;
    gap: 20px;
}

.version-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    background-color: #f9f9f9;
}

.version-card h2 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.version-card h3 {
    font-size: 1.2rem;
    margin-bottom: 5px;
}

.version-card ul {
    list-style-type: disc;
    padding-left: 20px;
}

.version-card ul ul {
    list-style-type: circle;
}

.developer-name {
    color: #1d4ed8;
    cursor: pointer;
    text-decoration: none;
}

.documentation-pdf {
    cursor: pointer;
}
</style>