<template>
    <div class="container" id="editor">
        <div class="row">
            <div class="col-sm-4 col-md-3" id="libraryMenu">
                <div :class="['btn-group', 'd-none', 'd-sm-block', 'd-md-none']" role="group" aria-label="..." v-for="lang in languages">
                    <button type="button" :class="['btn', currentLang == lang ? 'btn-invert' : 'btn-default']" @click="changeLang(lang)">{{ lang.charAt(0).toUpperCase() + lang.slice(1) }}</button>
                </div>
                <h1>menu</h1>

                <div v-for="article in wiki" @click="showContent(article.id)" class="menubtn" :id="'title-' + article.id">
                    {{article[currentLang].title}}

                </div>
            </div>
            <from method="post">
                <textarea class="col-sm-8 col-md-9" id="content-container" v-model="currentContent" @keyup.space="updateArticle()" @keyup.enter="updateArticle()">
                </textarea>
            </form>
            
            {{tempArt}}
        </div>


    </div>
</template>

<script>
    import { mapGetter, mapActions } from 'vuex'


    export default {

        mounted() {
            console.log('Component mounted.')
        },

        props: [
            'wiki'

        ],
        data: function () {
            return {

                currentTitle:"",
                currentContent:"",
                currentLang:"spanish",
                currentArticle: 1,
                languages: ['english', 'spanish'],
                test:"# h1 \nthis is some text\n## h2\nmore text\n### h3",
                tempArt:""
            }
        },
        methods: {
            showContent: function (id) {
                let content = this.wiki.find( title => title.id == id);

                this.currentTitle = content[this.currentLang].title;
                this.currentContent = content[this.currentLang].content;
                this.currentArticle = id;

            },
            changeLang: function (lang) {
                this.currentLang = lang;
                this.showContent(this.currentArticle);

            },
            updateArticle: function () {
                this.tempArt = this.currentContent;
            }
        //    create function to update database on key up
        //    update both front and back end


        },
        computed: {

        }
    }
</script>

<style scoped>
    .menubtn {
        cursor:pointer;

    }



    #editor {
        background-color: white;
        margin-left: 40px;
        padding: 20px;
        box-shadow: 2px 1px 2px;
    }

    #libraryMenu {
        height: 80vh;
        border-right: solid 1px #4A4A4A;
    }

    #content-container {
        padding-left: 40px;
        padding-right: 40px;
        height: 80vh;
    }

    #content-container h1 {
        margin-top: 0px;

    }

</style>

