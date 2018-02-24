<template>
    <div id="user-tasks">
        <h1>Tasks</h1>
        <ul>
            <li v-for="task in getCurrentTasks(tasks)">
                <input type="checkbox" v-bind:value="task.id" v-model="checkbox" v-on:click="checkedTask(task.id)" >
                {{ task.title }}
            </li>

            <user-task v-for="task in CURRENT_TASKS" v-bind:task="task" v-bind:complete="task.complete" v-bind:key="task.id"></user-task>

        </ul>
        <hr>
    </div>
</template>

<script>
    import Task from './Task.vue'
    import { mapGetters } from 'vuex'

    export default {
        components: {
            'user-task': Task
        },
        props: ['tasks', 'user'],
        mounted() {

        },
        computed: {
            ...mapGetters([
                'CURRENT_TASKS'
            ])
        },
        data: function () {
            return {

            }
        },
        methods: {
<<<<<<< HEAD
            getCurrentTasks: function (tasks) {
                return tasks[this.user.current_day];
            },
            checkedTask: function (taskId) {
                console.log(taskId)
            },
            isComplete: function (complete) {
                if(complete) {
                    return true;
                } else {
                    return false;
                }
            }
=======

>>>>>>> f952291f89808c54ba37b27efc3ae811f4d9f8c3
        }
    }
</script>

<style scoped>
    ul {
        list-style: none;
        padding-left: 0;
    }

</style>
