<template>
    <div class="container main" id="show-exhibit">
        <span class="returnShowcase" @click="returnToShowcase">
            <i class="material-icons">
                arrow_back
            </i>
            Back to Showcase
        </span>
        <div v-html="exhibit.exhibition">
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
                this.$emit('returnToShowcase');
            }
        }
    }
</script>

<style scoped>
    img {
    }
    .returnShowcase {
        font-size: 24px;
        cursor: pointer;
    }

</style>
