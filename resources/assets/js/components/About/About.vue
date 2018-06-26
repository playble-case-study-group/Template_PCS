<template>
    <div id="characters" class="container main">
        <div class="display">
            <h1 class="greeting">
                <img class="logo" src="img/about4.jpg">
            </h1>
            <div class="text-container">
            <h2 class="red-heading">Our History</h2>
            <p>
                When the Museo Nacional Centro de Arte Reina Sofía opened its doors in 1990, it stood as a modern, contemporary Spanish museum on an international scale. Nevertheless, its building has gone through many challenges in order to achieve this goal. patient care.

<br><br>
                The Museo Reina Sofia, an autonomous organization depending on the Spanish Ministry of Culture, was created by Royal Decree 535/88 of May 1988. With its headquarters in San Carlos Hospital, the Collection was made up of works conserved at the time by the Spanish Museum of Contemporary Art. On 10 September 1992, their Majesties King Juan Carlos and Queen Sofia inaugurated the Permanent Collection of the Museo Nacional Centro de Arte Reina Sofía, which until then had only held temporary exhibitions. Now a bona fide museum, its goals – as set forth in the aforementioned decree – were to conserve, expand and exhibit its collections; to promote the general public’s knowledge of and access to contemporary art in its various manifestations; to hold exhibitions at the international level, and to offer training, educational and assessment activities related to its holdings.


            </p>
            <h2 class="red-heading">Our Mission Statement</h2>
                <img class="col-sm-5 nanobot" src="images/gallery/Artifact_11.jpg">
            <p>
                Although museums as public institutions remain important in the general scheme of creative industries, they have lost some of their influence, or at least their privileged position, in defining what is understood to be culture.
<br><br>
                Today's world of culture is shaped, on the one hand, by the prominent figures in the culture and communications industry and, on the other, by the diffuse magma of culture producers whose actions are governed by the subordination of their creative singularity. This subordination is manifested in artists having to sell their creative capacity or in their being expropriated of it.  In addition, we are in the midst of a systemic crisis to which the museum is not immune. If the economic paradigm based on speculation and easy money has proven unsustainable, it should also be clear that the primacy of the building and of art as spectacle over the museum's artistic program has ceased to be valid. There is therefore a pressing need to invent other models.

            </p>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {

        props: {
            characters: Array
        },
        created() {
            this.selectedCharacter = this.characters[0];
        },
        mounted() {
            let selected = '#' + this.selectedCharacter.character_id;
            $(selected).toggleClass(' active');
            this.previous = selected;
        },
        data: function(){
            return {
                selectedCharacter: null,
                previous: null
            }
        },
        methods:{
            selectCharacter: function (character) {
                $(this.previous).toggleClass(' active');
                this.selectedCharacter = character;
                let selected = '#' + character.character_id;
                this.previous = selected;
                $(selected).toggleClass(' active');
            }
        }
    }
</script>

<style scoped lang="scss">
    @import "../../../sass/_variables.scss";
    .logo {
        width: 100%;
        height: 100%;
    }
    .row {
        justify-content: center;
    }
    .sans-serif {
        font-family: Raleway, sans-serif;
    }
    .red-heading {
        color: #942921;
    }
    .display {
        max-width: 1024px;
        margin: auto;
    }
    .text-container {
        margin: 80px;
    }
    .nanobot{
        float: right;
    }
    .quote {
        float: left;
    }


</style>