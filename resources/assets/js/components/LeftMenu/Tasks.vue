<template>
    <div id="user-tasks">
        <h1>Tasks</h1>
        <ul>
            <li v-for="task in getCurrentTasks(tasks)">
                <input type="checkbox" v-bind:value="task.id" v-model="checkbox" v-on:click="checkedTask(task.id)" >
                {{ task.title }}
            </li>
        </ul>
        {{ checkbox }}
    </div>
</template>

<script>
    export default {
        props: ['tasks', 'user'],
        mounted() {

        },
        data: function () {
            return {
                checkbox: []
            }
        },
        methods: {
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
        }
    }
</script>