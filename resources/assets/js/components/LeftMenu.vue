<template>

    <div id="left-menu">
        <div class="content">
            <h1>Progreso</h1>
            <ul>
                <li>
                    <input type="checkbox" checked="checked"/>
                    <input type="checkbox" checked="checked"/>
                    <input type="checkbox" checked="checked"/>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    #left-menu {
        min-width: 240px;
        max-width: 240px;
        min-height: 100vh;
        background-color: white;
        box-shadow: 2px 1px 2px;
    }
    .content {
        padding: 20px;
    }

    ul {
        list-style: none;
        padding-left: 0 !important;
    }
</style>