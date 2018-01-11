<template>

    <div id="left-menu">
        <div class="content">
            <user-progress v-bind:tasks="tasks"></user-progress>
            <user-tasks></user-tasks>
        </div>
    </div>
</template>

<script>
    import Progress from './Progress.vue';
    import Tasks from './Tasks.vue';

    export default {
        components: {
            'user-progress': Progress,
            'user-tasks': Tasks
        },

        data: function () {
            return {
                tasks: []
            }
        },
        mounted() {
            console.log('Component mounted.');
            // Notice: organizing tasks into groups by day
            axios.get('/tasks').then(response => this.tasks = _.groupBy(response.data, 'day'));

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