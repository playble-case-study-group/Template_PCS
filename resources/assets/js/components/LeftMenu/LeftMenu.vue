<template>

    <div id="left-menu">
        <div class="content">
            <user-progress v-bind:tasks="tasks">
            </user-progress>

            <user-tasks v-bind:user="user">
            </user-tasks>
            <div id="next-day">
                <button v-on:click="NEXT_DAY()">NEXT DAY</button>
            </div>
        </div>
    </div>
</template>

<script>
    import Progress from './Progress.vue';
    import Tasks from './Tasks.vue';
    import Counter from '../Counter.vue';
    import {mapActions} from 'vuex';

    export default {
        components: {
            'user-progress': Progress,
            'user-tasks': Tasks,
            'counter': Counter
        },
        props: ['user'],
        data: function () {
            return {
                tasks: []
            }
        },
        mounted() {

        },
        methods: {
            ...mapActions(['NEXT_DAY'])
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