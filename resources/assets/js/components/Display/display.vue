<template>
    <div class="container main" id="display">
        <div class="banner">
            <h3 class="title" v-if="exhibit.group_id != 0">Group {{ exhibit.group_id }}'s Exhibit</h3>
            <h3 class="title"  v-else>{{ this.$store.state.user.name }}'s Exhibit</h3>
        </div>

        <span class="returnShowcase" @click="returnToShowcase">
            <i class="material-icons">
                keyboard_arrow_left
            </i>
            <span class="link">Back to Showcase</span>
        </span>
        <div v-html="exhibit.exhibition" class="content">
            {{ exhibit.exhibition }}
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        mounted() {
        },
        props: {
            exhibit: Object,
        },
        data: function() {
            return {
            }
        },
        computed: {

        },
        methods: {
            returnToShowcase: function() {
                window.location.href ='/showcase';
            }
        }
    }
</script>

<style scoped>
    img {
    }
    .returnShowcase {
        font-size: 12pt;
        cursor: pointer;
        display: inline-flex;
        padding-left: 6px;
        color: #4a4a4a;
    }
    .banner {
        background-color: #96281b;
        color: white;
        height: 160px;
        text-align: center;
        display: flex;
    }
    .title {
        font-size: 32pt;
        margin: auto;
    }
    .content {
        padding: 40px 80px;
    }
    .link {
        padding-left: 3px;
    }

</style>
