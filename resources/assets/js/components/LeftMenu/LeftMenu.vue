<template>

    <div id="left-menu">
        <div class="content">
            <progress></progress>
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
    import Progress from './Progress.vue';

    export default {
        components: {
            'left-menu-progress': Progress
        },

        data() {
            tasks: []
        },
        mounted() {
            console.log('Component mounted.');
            axios.get('/tasks').then(response => this.tasks = response.data);

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