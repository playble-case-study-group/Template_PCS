<template>
    <div id="gallery" class="row list-group">
        <h1>Welcome to the Gallery</h1>
        <div class="item col-xs-4 col-lg-4" v-for="artifact in artifacts">
            <div class="thumbnail">
                <img class="group list-group-image" :src="artifact.image" :alt="artifact.title" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">{{ artifact.title }}</h4>
                    <p class="group inner list-group-item-text">{{ artifact.description }}</p>
                </div>
            </div>
        </div>
        <artifact></artifact>
    </div>
</template>

<script>
    //import { mapGetter, mapActions } from 'vuex'
    import Artifact from './Artifact.vue'
    import Vue from 'vue'

    export default {

        mounted() {
            console.log('Component mounted.')
        },
        data: function(){
            return {
                artifacts: []
            }
        },
        components: {
            'artifact': Artifact
        },

        mounted() {
            axios.get('/getartifacts').then(response => {
            this.artifacts = response.data;
                }).catch((error) => {
                console.log(error.config);
            });
        }

    }
</script>
