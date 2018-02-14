<!--<template>
    <div id="gallery" class="row list-group">
        <h1>Welcome to the Gallery</h1>
        <div class="item col-xs-6 col-md-4" v-for="artifact in artifacts">
            <div class="thumbnail" @click="$modal.show('foo')">
                <img class="group list-group-image" :src="artifact.image" :alt="artifact.title"/>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">{{ artifact.title }}</h4>
                    <p class="group inner list-group-item-text">{{ artifact.description }}</p>
                </div>
            </div>
        </div>

        <modal name="foo" height="auto" @before-open="beforeOpen">

            <img src="http://via.placeholder.com/250x350" alt="This image">
            <h1>Title</h1>
            <p>aslcknsdlnsdnos dofnsfnlsk dpaskfnaslfno fsdlkfnsd dslffknsdlns sldkfnlkfn alfnaknf lanflaknfa lakfnalfn</p>

        </modal>
    </div>

</template>-->
<<template>
    <div class="container">

        <!-- The Gallery View -->
        <h1>Welcome to the Gallery</h1>
        <hr>
        <div class="row">
            <div class="item" v-for="(artifact, index) in artifacts">
                <div class="thumbnail" @click="openModal(artifact)">
                    <img :src="artifact.image" :alt="artifact.title">
                    <h4>{{ artifact.title }}</h4>
                    <p>{{ artifact.description}}</p>
                </div>
            </div>
        </div>

        <!-- Modal View -->
        <Artifact v-if="showModal">
            <img slot="image" :src="modalImage" :alt="modalTitle" class="img-responsive">
            <h3 slot="header" class="modal-title">
                {{ modalTitle }}
            </h3>
            <p slot="body">{{ modalDescription }}</p>
            <div slot="footer">
                <button type="button" class="btn btn-outline-info" @click="closeModal()"> Close </button>
            </div>
        </Artifact>

    </div>
</template>

<script>
    //import { mapGetter, mapActions } from 'vuex'
    import Artifact from './Artifact.vue'


    export default {

        data: function(){
            return {
                artifacts: [],
                showModal: false,
                modalImage: '',
                modalTitle: '',
                modalDescription: ''
            }
        },
        components: {
            Artifact
        },

        mounted() {
            axios.get('/getartifacts').then(response => {
            this.artifacts = response.data;
                }).catch((error) => {
                console.log(error.config);
            });
        },
        methods: {
            openModal: function(modalArtifact) {
                this.showModal = true;
                this.modalImage = modalArtifact.image;
                this.modalTitle = modalArtifact.title;
                this.modalDescription = modalArtifact.description;
            },
            closeModal: function() {
                this.showModal = false;
            },
        }

    }
</script>

<style lang="scss" scoped>
    .row {
        -moz-column-width: 18em;
        -webkit-column-width: 18em;
        -moz-column-gap: 1em;
        -webkit-column-gap:1em;

    }

    .item {
        display: inline-block;
        padding:  .25rem;
        width:  100%;
    }

    .well {
        position:relative;
        display: block;
    }

</style>