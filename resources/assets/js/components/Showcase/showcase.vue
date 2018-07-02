<template>
    <div class="container main" id="showcase">
        <div v-if="activeExhibit == null">
            <div class="greeting">
                <img class="hero" src="img/Skyline.jpg">
                <span class="title">
                    <h1 class="large">Student Exhibitions</h1>
                    <h3 class="subtitle">Learn more about the Spanish Civil War</h3>
                </span>
            </div>
            <div class="content">
                <p class="description">
                    Ut efficitur sapien et libero faucibus, id aliquam lorem venenatis. Suspendisse accumsan, velit ac dapibus lacinia, nisi mauris luctus tortor, id interdum felis lectus ac nisi. Curabitur faucibus sem sed ornare vestibulum. Nam vitae tempus massa, vitae facilisis purus. Nulla posuere consectetur turpis vel congue. Morbi nunc tortor, gravida non maximus ac, bibendum at orci. Integer at accumsan diam. Integer nec volutpat metus, nec commodo tortor.
    <br><br>
                    Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus sagittis lectus eros, quis rhoncus ligula semper ac. Nulla a massa neque. Proin in eleifend lectus, id aliquet lectus. Etiam gravida velit et eros scelerisque pretium. Aliquam suscipit ipsum nec diam interdum, ut congue mi scelerisque. Morbi turpis tellus, sollicitudin eget ultrices ac, molestie vestibulum est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vivamus sagittis lectus eros, quis rhoncus ligula semper ac. Nulla a massa neque. Proin in eleifend lectus, id aliquet lectus.
                </p>
                <div class="card-columns">
                    <div class="card exhibit"
                         id="exhibit.group_exhibition_id"
                         v-for="single in showcase"
                         @click="showGroupSelection(single.group_exhibition_id)">
                        <img class="card-img-top" :src="getRandomGalleryImage()" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Exhibit {{ single.group_exhibition_id }}</h5>
                            <p class="card-text">{{ getYear(single.created_at) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <show-exhibit v-else
                      @returnToShowcase="clearExhibit"
                      :exhibit="activeExhibit" >

        </show-exhibit>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        mounted() {
        },
        props: {
            showcase: Array,
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
            getRandomGalleryImage: function () {
                return this.gallery[Math.floor(Math.random()*this.gallery.length)].image;
            },
            showGroupSelection: function(group_id) {
                window.location.href = "/showcase/" + group_id;
            },
            clearExhibit: function(){
                this.activeExhibit = null;
            },
            getYear: function(date) {
                return date.toString().substring(0, 4);
            }
        }

    }
</script>

<style scoped>
    .hero {
        width: 100%;
        opacity: .4;
    }
    .content {
        margin: 40px 80px;
    }
    .greeting {
        position: relative;
        text-align: center;
    }
    .large {
        font-size: 42pt;
    }
    .title {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    .subtitle {
        color: #4A4A4A;
    }

    .card {
        cursor: pointer;
        height: 200px;
        width: 200px;
    }
    .card-img-top {
        width: 100%;
        height: 70%;
    }

    .card-body{
        text-align: center;
        background-color: #96281b;
        color: white;
        font-family: "Raleway", san-serif;
        padding: 0.5rem;
    }
    .card-title {
        margin-bottom: 0;
    }
    .card-text {
       font-size: 10pt;
    }
    .card-columns {
        margin-top: 80px;
    }

</style>
