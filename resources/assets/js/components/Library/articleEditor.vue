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
            <form>
                <textarea class="col-sm-8 col-md-9" id="content-container" v-model="currentContent" @keyup="setTime">
                </textarea>
            </form>

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

                currentTitle: ":)",
                currentContent: "Select an Article",
                currentLang: "spanish",
                currentArticle: 1,
                currentPair: 1,
                languages: ['english', 'spanish'],
                // languages: ['spanish'],
                test: "# h1 \nthis is some text\n## h2\nmore text\n### h3",
                // tempArt: "",
                timeout: null
            }
        },
        methods: {
            showContent: function (id) {
                let content = this.wiki.find( title => title.id == id);

                this.currentTitle = content[this.currentLang].title;
                this.currentContent = content[this.currentLang].content;
                this.currentArticle = content[this.currentLang].id;
                this.currentPair = id;
                // this.currentArticle = 2;

            },
            changeLang: function (lang) {
                this.currentLang = lang;
                this.showContent(this.currentPair);

            },
            updateArticle: function () {
                // let content = this.wiki.find( title => title.id == this.currentArticle);

                let content = this.wiki.find( title => title.id == this.currentPair);
                content[this.currentLang].content = this.currentContent;

                let data = {
                    id: this.currentArticle,
                    content: this.currentContent
                };

                axios.put("/editor/" + this.currentArticle, data).then(response => {
                    console.log(response.data)
                })
                
                // this.tempArt = this.currentContent;


                // content[this.currentLang].content = this.currentContent;
                // console.log(content);
                // console.log(content[this.currentLang].content);


                console.log(content);
                console.log(content[this.currentLang].content);

            },
            setTime: function () {
                

                clearTimeout(this.timeout);
                this.timeout = setTimeout(this.updateArticle, 2000);


            }



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

