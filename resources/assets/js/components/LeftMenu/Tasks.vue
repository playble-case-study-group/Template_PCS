<template>
    <div id="user-tasks">
        <h1>Tasks</h1>
        <ul>
            <li v-for="task in getCurrentTasks(tasks)">
                <input type="checkbox"
                       v-if="task.complete"
                       v-bind:value="task.id"
                       v-on:click="checkedTask(task.id)"
                       checked>
                <input type="checkbox"
                       v-else
                       v-bind:value="task.id"
                       v-on:click="checkedTask(task.id)">
                {{ task.title }}
            </li>
        </ul>

        {{ checkbox }}
        <button v-on:click="test()">Check</button>
    </div>
</template>

<script>
    export default {
        props: ['tasks', 'user'],
        mounted() {
            this.tasks.forEach(function (day) {
                console.log(day)
            });
//            let currentTasks = tasks[this.user.current_day];
//            currentTasks.forEach(task => {
//                task.complete ? this.checkbox.push(task.id) : false;
//            })
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
                console.log(taskId, complete);
                let complete = 0;
                console.log(task);
                axios.post('/tasks/complete' ,{
                    id: taskId,
                    complete: complete
                }).then( response => {
                    console.log(response)
                });
            },
            test: function () {

            }
        }
    }
</script>