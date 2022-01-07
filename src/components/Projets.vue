<template>
    <div class="app fond">
        <section class="presentation">
            <img src="../../static/css/images/amphi.png" alt="Programmation sur écran de portable">
            <div class="presentation-text">
                <h2>MMI Collection</h2>
                <p>Vous trouverez les projets entrepris par nos étudiants, de 1997 à aujourd'hui. Revivez l’évolution du numérique !</p>
            </div>
        </section>

        <div class="corps-page page-projets">
            <section class="filtres ordi">
                <h5>Filtres</h5>

                <div class="categorie-filtres">
                    <h6>Projet</h6>
                    <div>
                        <label for="Membre">Titre projet</label>
                        <input type="text" id="TitreProjet" name="TitreProjet" v-model="keyword" placeholder="Titre du projet">
                    </div>
                </div>

                <div class="categorie-filtres">
                    <h6>Domaines</h6>
                    <select v-model="catSelected" title="Domaine">
                        <option value="0">Tous les domaines</option>
                        <option v-for="cat in listeDomaines" :key="cat.id" :value="cat.id">{{cat.nom}}</option>
                    </select>
                </div>

                <div class="categorie-filtres">
                    <h6>Types de projet</h6>
                    <select v-model="typeProjetSelected" title="Domaine">
                        <option value="0">Tous les types de projet</option>
                        <option v-for="type in listeTypesProjet" :key="type.id" :value="type.id">{{type.acf.nom}}</option>
                    </select>
                </div>
                <!--<div class="categorie-filtres">
                    <h6>Date</h6>
                    <p>Entre le</p>
                    <label for="datedebut-filtre">
                        <input type="date" id="datedebut-filtre">
                    </label>
                    <p>et le</p>
                    <label for="datefin-filtre">
                        <input type="date" id="datefin-filtre">
                    </label>
                </div>

                <div class="categorie-filtres">
                    <h6>Niveau</h6>
                    <div>
                        <label for="DUT">DUT</label>
                        <input type="checkbox" id="DUT" checked name="DUT" value="DUT">
                    </div>
                    <div>
                        <label for="BUT">BUT</label>
                        <input type="checkbox" id="BUT" checked name="BUT" value="BUT">
                    </div>
                    <div>
                        <label for="LPW">LPW</label>
                        <input type="checkbox" id="LPW" checked name="LPW" value="LPW">
                    </div>
                    <div>
                        <label for="Tout-niveau">Tout</label>
                        <input type="checkbox" id="Tout-niveau" checked name="Tout-niveau" value="Tout-niveau">
                    </div>
                </div>

                -->
                
            </section>

            <section class="presentation-projets">
                <div class="barre-info ordi">
                    <div class="tris">
                        <p>{{listeProjets.length}} projet(s) enregistré(s)</p>
                    </div>
                    <p>{{filterListeProjet.length}} projet(s) trouvé(s)</p>
                </div>

                <div class="barre-info tel">
                    <button data-toggle="modal" data-target=#FiltreModal class="BGtransparent" style="min-width:max-content">
                        <svg xmlns="http://www.w3.org/2000/svg" class="logo-projet" width="27" height="18" viewBox="0 0 27 18">
                            <path class="color-objet" id="Icon_material-filter-list" data-name="Icon material-filter-list" d="M15,27h6V24H15ZM4.5,9v3h27V9ZM9,19.5H27v-3H9Z" transform="translate(-4.5 -9)"/>
                        </svg>                        
                    </button>
                    
                    <div style="text-align: right">
                        <p>{{filterListeProjet.length}} projet(s) trouvé(s)</p>
                    </div>
                </div>

                <div class="modal hide" id="FiltreModal" ref="cnxModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div id="connexion" class="modal-dialog fond connexion" role="document">
                        <div class="cadre-connexion modal-content">
                            <div class="modal-header">
                                <button @click="fermetureModalReini(catSelected, typeProjetSelected, keyword)" class="fermetureConnexion"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="color-objet-fill croix-fermeture svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></button>
                                <div class="categorie-filtres">
                                    <h2>Filtres</h2>
                                </div>

                                <div class="categorie-filtres">
                                    <h6>Titre du projet</h6>
                                    <div>
                                        <input type="text" id="TitreProjet" name="TitreProjet" v-model="keyword" placeholder="Titre du projet">
                                    </div>
                                </div>

                                <div class="categorie-filtres">
                                    <h6>Domaines</h6>
                                    <select v-model="catSelected" title="Domaine">
                                        <option value="0">Tous les domaines</option>
                                        <option v-for="cat in listeDomaines" :key="cat.id" :value="cat.id">{{cat.nom}}</option>
                                    </select>
                                </div>

                                <div class="categorie-filtres">
                                    <h6>Types de projet</h6>
                                    <select v-model="typeProjetSelected" title="Domaine">
                                        <option value="0">Tous les types de projet</option>
                                        <option v-for="type in listeTypesProjet" :key="type.id" :value="type.id">{{type.acf.nom}}</option>
                                    </select>
                                </div>

                                <button data-toggle="modal" data-target=#FiltreModal><a>Valider</a></button>

                            </div>
                        </div>
                    </div>
                </div>

                <section class="contenu">
                    <section class="choix">
                        <router-link v-for="projet in filterListeProjet" :to="{name: 'Projet', params: {id : projet.id}}" :key="projet.id">
                            <div>
                                <img :src="projet.image.url" class="visuel" alt="Images projet">
                            </div>
                            <div>
                                <img :src="projet.logo.url" class="logo-projet" alt="Images projet">
                                <h6>{{projet.nom}}</h6>
                                <i>{{projet.date_de_debut}} - {{projet.date_de_fin}}</i>
                                <p>{{projet.description_fr | liveSubstr(170)}}</p>
                            </div>
                        </router-link>
                    </section>
                </section>
            </section>
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
            listeDomaines: [],
            listePromos:[],
            listeTypesProjet:[],
            keyword: '',
            catSelected: 0,
            typeProjetSelected: 0,
        }
    },

    created(){

        this.catSelected = this.$route.params.id;
        axios.get(param.host+"projet/v9/listeProjets")
        .then(response=>{
        this.listeProjets = response.data;
        console.log("projets", this.listeProjets)
        })
        .catch(error => console.log(error))

        axios.get(param.host+"domaine/v1/listeDomaines")
        .then(response=>{
        this.listeDomaines = response.data;
        console.log('domaines', this.listeDomaines)
        })
        .catch(error => console.log(error))

        axios.get(param.host+"promo/v4/listePromos")
        .then(response=>{
        this.listePromos = response.data;
        })
        .catch(error => console.log(error))

        axios.get(param.hostacf+"type_projet")
        .then(response=>{
        this.listeTypesProjet = response.data;
        console.log('types', this.listeTypesProjet)

        })
        .catch(error => console.log(error))
    },

    methods:{
        byCategorie: function(categorie){
            return this.listeProjets.filter(function(projet){
                return projet.domaine.id === categorie.id;
            })
        },

        filtreOrderByName: function(listeProjets){
            return listeProjets.filter(function(projet){
                return (
                    projet.nom.toLowerCase().indexOf(this.keyword.toLowerCase()) >= 0
                    ? projet
                    : ''
                )
            }.bind(this))
        },

        filtreProjetByCat: function(listeProjets){
            if(this.typeProjetSelected >0){
                return listeProjets.filter(function(projet){
                    let catProjet = projet.type.map(function(cat){ return cat.id});
                    return (
                        catProjet.indexOf(this.typeProjetSelected) >= 0 
                        ? this.typeProjetSelected 
                        : ''
                    )
                }.bind(this))
            }else{
                return listeProjets
            }
        },

        filtreProjetByType: function(listeProjets){
            if(this.catSelected >0){
                return listeProjets.filter(function(projet){
                    let catProjet = projet.domaine.map(function(cat){ return cat.id});
                    return (
                        catProjet.indexOf(this.catSelected) >= 0 
                        ? this.catSelected 
                        : ''
                    )
                }.bind(this))
            }else{
                return listeProjets
            }
        },

        fermetureModalReini: function(catSelected, typeProjetSelected, keyword){
            $("#FiltreModal").modal('hide')
            return (
                this.catSelected = 0,
                this.typeProjetSelected = 0,
                this.keyword = ''
            )
        }
    },

    computed:{
        listeProjetsOrderByName: function(){
            function compare(a, b) {
                if (a.nom < b.nom) return -1;
                if (a.nom > b.nom) return 1;
            }                
            return this.listeProjets.sort(compare)
        },

        filterListeProjet: function(){
            return this.filtreOrderByName(this.filtreProjetByCat(this.filtreProjetByType(this.listeProjetsOrderByName)));
        },
    },

    filters : {
        liveSubstr: function(string, nb){
            return string.substring(0,nb) + '...';
        }
    },
}
</script>

<style scoped>

</style>

