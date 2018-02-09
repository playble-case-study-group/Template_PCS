<template>
    <div id="artifact">

        <h1>This is an Artifact</h1>

    </div>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {

        mounted() {
            console.log('Component mounted.')
        },

        methods: mapActions([
        ])
    }
</script>