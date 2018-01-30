<template>
    <div id="gallery">
        <h1>Welcome to the Gallery</h1>
        <artifact></artifact>
    </div>
</template>

<script>
    import { mapGetter, mapActions } from 'vuex'
    import Artifact from './Artifact.vue'

    export default {

        mounted() {
            console.log('Component mounted.')
        },
        components: {
            'artifact': Artifact
        },
        methods: mapActions([

        ])
    }
</script>
