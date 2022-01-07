<template>
    <div class="app fond">
        <section class="presentation page-projet">
            <img src="../../static/css/images/Memo_1.jpg" alt="Programmation sur écran de portable">
            <div class="presentation-text">
                <h2>Votes</h2>
                <p>Texte explicatif fonctionnement vote</p>
            </div>
        </section>

        <nav class="tablette nav">
            <ul>
                <li v-for="typeVote in listeOrderByName" :key="typeVote.acf.id">
                    <a href="vote.html#grandPrixJury"><h3>{{typeVote.acf.nom}}</h3></a></li>
            </ul>
        </nav>

        <div class="scroll-snap" v-for="typeVote in listeOrderByName" :key="typeVote.acf.id">
            <section class="section-projet" id="grandPrixJury">
                <div class="ligne-titre">
                    <h3>{{typeVote.acf.nom}}</h3>
                    <hr>
                </div>
                <ul class="carrousel">
                    <li>
                        <a href="projet.html">
                            <img src="css/images/Memo_1.jpg" class="visuel-projet" alt="Visuel de projet">
                            <div>
                                <img src="css/images/mmi.png" class="logo-projet" alt="Logo projet">
                                <h6>Refonte site dpt MMI</h6>
                                <i>Sept. 2021 - Janv 2022</i>
                            </div>‡
                        </a>
                    </li>
                </ul>
            </section>
            <button class="bouton-vote">
                <router-link to="/projets">{{typeVote.acf.nom}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.622" height="30.622" viewBox="0 0 30.622 30.622">
                        <path id="arrow-alt-circle-right-regular" class="flechebouton" data-name="arrow-alt-circle-right-regular" d="M38.622,23.311A15.311,15.311,0,1,0,23.311,38.622,15.308,15.308,0,0,0,38.622,23.311Zm-27.658,0A12.347,12.347,0,1,1,23.311,35.658,12.344,12.344,0,0,1,10.963,23.311Zm4.445,1.235V22.076a.743.743,0,0,1,.741-.741h7.162V17.2a.742.742,0,0,1,1.266-.525l6.112,6.112a.741.741,0,0,1,0,1.05l-6.112,6.112a.741.741,0,0,1-1.266-.525V25.286H16.149A.743.743,0,0,1,15.408,24.546Z" transform="translate(-8 -8)"/>
                    </svg>
                </router-link>
            </button>
        </div>
    </div>
</template>

<script>
    import param from '@/param/param'

    export default {
        name: 'Projets',
        data () {
            return {
                listeProjets: [],
                listeTypesVote: [],
                listePromos:[],
            }
        },

        created(){
            axios.get(param.host+"projet/v9/listeProjets")
            .then(response=>{
            console.log('response', response);
            this.listeProjets = response.data;
            console.log('liste', this.listeProjets);
            })
            .catch(error => console.log(error))

            axios.get(param.hostacf+"type_vote")
            .then(response=>{
            console.log('response', response);
            this.listeTypesVote = response.data;
            console.log('liste Vote', this.listeTypesVote);
            })
            .catch(error => console.log(error))
        },

        computed:{
            listeOrderByName: function(){
                function compare(a, b) {
                        if (a.acf.nom < b.acf.nom) return -1;
                        if (a.acf.nom > b.acf.nom) return 1;
                }
                return this.listeTypesVote.sort(compare);
            }
        },
                

        filters : {
            liveSubstr: function(string, nb){
                return string.substring(0,nb) + '...';
            }
        }
    }
</script>

<style scoped>

</style>

