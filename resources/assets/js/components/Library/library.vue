<template>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="btn-group" role="group" aria-label="...">
                    <button type="button" class="btn btn-default" @click="changeLang('english')">English</button>
                    <button type="button" class="btn btn-default" @click="changeLang('spanish')">Spanish</button>
                </div>
                <h1>menu</h1>
                <div v-for="article in wiki" @click="showContent(article.id)" class="menubtn" :id="'title-' + article.id">
                    {{article[currentLang].title}}
                </div>
            </div>
            <div class="col-sm-9" id="content-container">
                <h1>{{currentTitle}}</h1>
                    <p id="content">
                        {{currentContent}}
                    </p>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetter, mapActions } from 'vuex'

    export default {

        mounted() {
            console.log('Component mounted.')
        },
        data: function () {
            return {
                wiki:[
                    {

                        id: 1,
                        english: {
                            title: "Civil War",
                            content: " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae porttitor justo, sed ultricies sapien. Suspendisse imperdiet leo volutpat maximus finibus. Proin aliquet lectus nec neque consequat, in sagittis nunc congue. Aenean viverra tellus odio, sed sodales ante mattis sed. Phasellus vestibulum enim quis nunc scelerisque auctor. Duis est libero, rhoncus ac dui id, pretium aliquet eros. Nam ut posuere turpis, a rutrum ipsum.\n" +
                            "\n" +
                            "Integer pretium, lacus nec posuere suscipit, ipsum enim ullamcorper leo, id blandit erat magna ac magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Pellentesque et quam ac erat hendrerit laoreet eu at ex. Nam et varius dolor. Pellentesque consectetur aliquet mi. Morbi congue sem nec orci tempus, a scelerisque elit fringilla. Suspendisse auctor tortor vitae diam porttitor pharetra. Praesent eu velit varius mi fermentum vulputate. Sed nec risus sit amet eros mollis volutpat ut fringilla orci. Duis laoreet erat eu erat volutpat venenatis. Nulla faucibus, nibh in sollicitudin tempor, sem sem malesuada odio, sed mattis elit diam nec lorem. Integer eu elit sit amet dui volutpat pretium eget vulputate purus. ",
                            subtitles: ['one', 'two']
                        },
                        spanish: {
                            title: "Guerra Civil",
                            content: "hola taco burrito",
                            subtitles: ['uno', 'dos']


                        }
                    },
                    {

                        id: 2,
                        english: {
                            title: "Spain",
                            content: "Etiam dignissim interdum ultrices. Donec sagittis vestibulum eros vel vulputate. Aliquam at ante viverra massa feugiat mollis id vitae velit. Maecenas ultricies ligula dignissim eros cursus aliquam. Sed ante dui, hendrerit lacinia purus non, vulputate placerat erat. Praesent eleifend gravida sem. Pellentesque imperdiet, tellus vitae gravida venenatis, arcu est facilisis orci, nec volutpat est enim vitae odio. Curabitur sit amet quam fermentum, pulvinar elit sit amet, efficitur erat. Cras gravida iaculis massa auctor volutpat. ",
                            subtitles: ['one', 'two', 'three']
                        },
                        spanish: {
                            title: "España",
                            content: "More tacos and burrtios please.",
                            subtitles: [
                                {
                                    id: 3,
                                    title: "Again",
                                    content: "This is some content in a subtitle."
                                },
                                {
                                    id: 4,
                                    title: "here",
                                    content: "more subtitle content here."
                                }
                            ]
                        }


                    },
                ],
                currentTitle:"",
                currentContent:"",
                currentLang:"spanish",
                currentArticle: 1
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

            }
        }
    }
</script>

<style scoped>
    .menubtn {
        cursor:pointer;

    }

</style>
