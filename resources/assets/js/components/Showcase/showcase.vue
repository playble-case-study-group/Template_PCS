<template>
    <div class="container main" id="showcase">
        <div v-if="activeExhibit == null">
            <h1>Student Exhibitions</h1>
            <a @click="showGroupSelection(exhibit.group_exhibition_id)"
               v-for="exhibit in exhibits">

                <div class="exhibit" id="exhibit.group_exhibition_id">
                    <img class="contrain-img" :src="getRandomGalleryImage()">
                    <h2 class="group-exhibit">
                        Exhibit {{ exhibit.group_exhibition_id }}
                    </h2>
                </div>

            </a>
        </div>
        <show-exhibit v-else
                      @returnToShowcase="clearExhibit"
                      :exhibit="activeExhibit" >

        </show-exhibit>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import showExhibit from './showExhibit.vue'
    import ShowExhibit from "./showExhibit";

    export default {
        mounted() {
        },
        components: {
            ShowExhibit,
            'show-exhibit': showExhibit
        },
        props: {
            exhibits: Array,
            gallery: Array,
        },
        data: function() {
            return {
                activeExhibit: null,
            }
        },
        computed: {

        },
        methods: {
            getActivePath: function() {
                this.isActive = window.location.pathname;
            },
            getRandomGalleryImage: function () {
                return this.gallery[Math.floor(Math.random()*this.gallery.length)].image;
            },
            showGroupSelection: function(group_id) {
                this.activeExhibit = this.exhibits.filter( function(exhibit){
                    if(exhibit.group_exhibition_id == group_id){
                        return exhibit;
                    }
                })[0];
            },
            clearExhibit: function(){
                this.activeExhibit = null;
            }
        }

    }
</script>

<style scoped>
    img {
       height: 15rem;
        width: 15rem;
        opacity: .5;
    }
    .exhibit {
        position: relative;
        text-align: center;
    }
    .group-exhibit {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: black;
    }
</style>
