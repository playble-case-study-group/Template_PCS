<template>
    <div id="display" class="container">
        <div v-if="!edit">
            <button  @click="toggleEdit" class="btn btn-primary toggle">Edit Exhibition</button>
            <div v-html="this.display">
                {{ this.display }}
            </div>
        </div>


        <div v-else>
            <button  @click="toggleEdit" class="btn btn-primary toggle">View Exhibition</button>
            <exhibit-editor
                    :groups="this.groups"
                    :gallery="this.gallery"
                    :exhibition="this.display"
                    @updateExhibit="updateExhibit">
            </exhibit-editor>
        </div>
    </div>
</template>


<script>

import { mapGetters, mapActions } from 'vuex'
import exhibitEditor from './exhibitEditor.vue'
import ExhibitEditor from "./exhibitEditor";

export default {
        components: {
            ExhibitEditor,
            'exhibit-editor': exhibitEditor
        },
        mounted() {
            this.display = this.exhibition.exhibition;
        },
        props: {
            groups: Array,
            gallery: Array,
            exhibition: Object,
        },
        data: function() {
            return {
                edit: false,
                display: ''
            }
        },
        methods: {
            toggleEdit: function() {
                this.edit = !this.edit;
            },
            updateExhibit: function(value) {
                this.display = value;
            }
        }

    }
</script>

<style scoped>
    .tinymce {
        height: 75%;
        margin-top: 80px;
    }
</style>
