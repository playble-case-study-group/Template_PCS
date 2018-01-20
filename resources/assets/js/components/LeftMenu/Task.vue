<template>
    <li>
        <input v-if="complete" type="checkbox" checked v-on:click="check(task.id)">
        <input v-else type="checkbox" v-on:click="check(task.id)">
        {{ task.title }}
    </li>
</template>

<script>

    export default {
        props: ['task', 'complete'],
        mounted() {

        },
        data: function () {
            return {
                taskComplete: this.complete
            }
        },
        methods: {
            check: function (id) {
                this.taskComplete = !this.taskComplete;
                axios.post('/tasks/complete',{id: id, complete: this.taskComplete})
                    .then((response)=>{
//                        console.log(response)
                    }).catch((error)=>{
//                    console.log(error.response.data)
                })
            }
        }
    }
</script>