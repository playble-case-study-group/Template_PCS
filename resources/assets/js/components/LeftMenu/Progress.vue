<template>
    <div id="user-progress">
        <h1>Progress</h1>
        <ul>
            <li v-for="day in tasks">
                <span v-for="task in day">{{task.title}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log(this.tasks)
        },
        props: ['tasks']
    }
</script>
