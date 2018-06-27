<template>
    <div id="exhibit-editor" class="container">
        <vue-mce
                v-model="submission"
                :config="config"
                ref="ref"
                name="exhibit"
                @init="handleInit"
                @error="handleError"
                @input="handleInput"
                @change="handleChange"
                @destroy="handleDestroy">
        </vue-mce>
        <button @click="saveChanges" class="btn btn-success">Save</button>
    </div>
</template>


<script>
import vSelect  from 'vue-select'
import { mapGetters, mapActions } from 'vuex'
import { component } from 'vue-mce';

export default {
        components: {
          'v-select': vSelect,
          'vue-mce': component,
        },
        created() {
            let images = [];
            this.gallery.forEach( function(artifact) {
                images.push({title: artifact.title, value: artifact.image});
            });

            this.config.image_list = images;

        },
        props: {
            groups: Array,
            gallery: Array,
            exhibition: String,
        },
        data: function() {
            return {
                submission: '',
                config: {
                    height: 500,
                    inline: false,
                    theme: 'modern',
                    fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 34px 38px 42px 48px 54px 60px",
                    plugins: 'preview searchreplace autolink directionality  visualblocks visualchars fullscreen image link media table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools  contextmenu colorpicker textpattern',
                    toolbar1: 'formatselect fontsizeselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
                    image_list: [],
                    image_dimensions: false,
                    content_css: [
                        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                        '//www.tinymce.com/css/codepen.min.css'
                    ],
                },
            }
        },
        methods: {
            handleInit (editor) {
                /* This handler fires when tinymce editor is successfully initialized.
                 Receives tinymce editor instance as argument

                 You can save the editor instance to variable and
                 call editor.setContent(yourContent) any time you want */
                if(this.exhibition){
                    this.submission = this.exhibition;
                }
            },

            handleError (err) {
                /* Fires when an error occurred. Receives error object */
                console.log(err);
            },

            handleInput (value) {
                /* Fires whenever editor content changes. Receives generated HTML */
                console.log(value)
                this.submission = value;
            },

            handleChange (value) {
                /* Fires only when editor emits focusout event. Receives generated HTML */
            },

            handleDestroy (editor) {
                /* Fires before VueMce component destroys. Receives tinymce editor instance */
                this.$emit('updateExhibit', this.submission);
            },
            saveChanges: function() {
                let html = this.submission;
                axios.post('/saveExhibit', {
                    data: html
                }).then(res => console.log(res))
                    .catch(err => consoel.log(err))
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
