<template>
    <div id="user-tasks">
        <h1>Tasks</h1>
        <ul>
            <user-task v-for="task in tasks" v-bind:task="task" v-bind:complete="task.complete" v-bind:key="task.id"></user-task>
        </ul>
    </div>
</template>

<script>
    import Task from './Task.vue';

    export default {
        components: {
            'user-task': Task
        },
        props: ['tasks', 'user'],
        mounted() {

        },
        data: function () {
            return {

            }
        },
        methods: {

        }
    }
</script>

<style scoped>
    ul {
        list-style: none;
        padding-left: 0;
    }

</style>
