<<template>
    <div class="container">

        <!-- The Gallery View -->
        <h1>Welcome to the Gallery</h1>
        <h1>{{ user.id }}</h1>
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
            <form slot="body" action="" method="post">
                <div class="form-group">
                    <h4>Title</h4>
                    <input id="formTitle" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Please enter a title..." :value="modalTitle">
                </div>
                <div>
                    <h4>Description</h4>
                    <textarea id="formDescription" placeholder="Please add artifact description..." class="form-control" rows="4" :value="modalDescription"></textarea>
                </div>
            </form>
            <div slot="footer">
                <button type="button" class="btn btn-outline-info" @click="closeModal()"> Close </button>
                <button type="button" class="btn btn-primary" @click="saveChanges()">Save changes</button>
            </div>
        </Artifact>
    </div>
</template>

<script>
    //import mapState from 'vuex'
    import Artifact from './Artifact.vue'
    import axios from 'axios';

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
            saveChanges: function() {
                axios.post('/gallery', {
                    user: this.user.id,
                    artifactTitle: 'hello',
                    artifactDescription: 'hello',
                    artifactImage: 'https://google.com'
                }).then(function(){
                    console.log('SUCCESS!!');
                }).catch(function(){
                    console.log('FAILURE!!');
                });
            }
        },
        computed: {
            user: function() {
                return this.$store.state.user;
            }
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

