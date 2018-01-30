<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        <ul>
                            <li v-for="task in $store.state.tasks">
                                {{ task.id }}
                                <button @click="toggleTask(task.id)">Toggle</button>
                            </li>
                        </ul>
                        {{ $store.state.tasks }}
                        <div class="btn">Done</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetter, mapActions } from 'vuex'

    export default {

        mounted() {
            console.log('Component mounted.')
        },
        methods: mapActions([
            'toggleTask'
        ])
    }
</script>
