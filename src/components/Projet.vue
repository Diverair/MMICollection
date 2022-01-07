<template>
    <div class="app fond">
        <section class="profil">
            <div class="image-avatar">
                <div class="banniere">
                    <img :src="projet.acf.image.url" alt="Programmation sur écran de portable">
                </div>
                <div class="fond-avatar">
                    <img :src="projet.acf.logo.url" class="avatar" alt="Votre phoro de profil">
                </div>
                <div class="barre-nav-utilisateur">
                    <a :href="edit" v-if="MembreConnecte != null"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="color-objet-fill svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg></a>
                    <a v-if="projet.acf.url != null" :href="projet.acf.url"><svg xmlns="http://www.w3.org/2000/svg" class="color-objet-fill" width="24" height="24" viewBox="0 0 24 24"><path id="link-solid" d="M15.309,8.69a7.121,7.121,0,0,1,.017,10.059l-.017.017-3.15,3.15A7.125,7.125,0,0,1,2.083,11.84L3.823,10.1a.749.749,0,0,1,1.279.5,8.638,8.638,0,0,0,.454,2.471.754.754,0,0,1-.177.779l-.613.613a3.375,3.375,0,1,0,4.742,4.8l3.15-3.15a3.374,3.374,0,0,0,0-4.773,3.511,3.511,0,0,0-.485-.4.752.752,0,0,1-.326-.591,1.867,1.867,0,0,1,.548-1.4l.987-.987a.753.753,0,0,1,.965-.081,7.148,7.148,0,0,1,.962.806Zm6.606-6.607a7.133,7.133,0,0,0-10.076,0L8.69,5.233l-.017.017a7.126,7.126,0,0,0,.979,10.865.753.753,0,0,0,.965-.081l.987-.987a1.867,1.867,0,0,0,.548-1.4.752.752,0,0,0-.326-.591,3.512,3.512,0,0,1-.485-.4,3.374,3.374,0,0,1,0-4.773l3.15-3.15a3.375,3.375,0,1,1,4.742,4.8l-.613.613a.754.754,0,0,0-.177.779A8.638,8.638,0,0,1,18.9,13.4a.749.749,0,0,0,1.279.5l1.739-1.739a7.133,7.133,0,0,0,0-10.076Z" transform="translate(0.001 0.001)"/></svg></a>
                </div>
            </div>
            <div class="profil-info">
                <h2 class="Nom-projet">{{projet.acf.nom}}</h2>
                    <p>{{projet.acf.description_fr}}</p>
            </div>
        </section>

        <div class="scroll-snap">
            <section class="section-projet" id="Visuels">
                <div class="ligne-titre">
                    <h3>Visuels</h3>
                    <hr>
                </div>
                <ul class="carrousel">
                    <li>
                        <div v-if="projet.acf.visuel.length == 0">
                            <div>
                                <img :src="projet.acf.image.url" class="visuel-projet" alt="Visuel de projet">
                            </div>
                        </div>
                        <div v-if="projet.acf.visuel.length >= 1" class="flex">
                            <div v-for="visuel in projet.acf.visuel" :key="visuel.id">
                                <img :src="visuel.full_image_url" class="visuel-projet" alt="Visuel de projet">
                            </div>
                        </div>

                    </li>
                </ul>
            </section>


            <section class="section-projet" id="Acteurs">
                <div class="ligne-titre">
                    <h3>Acteurs</h3>
                    <hr>
                </div>
                <ul class="carrousel">
                    <li class="flex">
                        <div v-for="roleprojet in listeRoleProjet" :key="roleprojet.id">
                            <div v-if="roleprojet.projet[0].ID == projet.id" >
                                <div v-for="membre in listeMembres" :key="membre.id" >
                                    <div v-if="membre.id == roleprojet.utilisateur[0].ID">
                                        <router-link :to="{name: 'Compte', params: {id : membre.id}}" >
                                            <div class="Infos-Acteur" style="text-align: center">
                                                <div class="Zone-avatar">
                                                    <img v-if="membre.logo == null" :src="imageDefautUser" class="avatar" alt="Logo compte connecté">
                                                    <img v-if="membre.logo != null" :src="membre.logo.url" class="avatar" alt="Logo compte connecté">
                                                </div>
                                                <div class="text-center">
                                                    <h4>{{membre.prenom}} {{membre.nom}}</h4>
                                                    <div v-for="role in listeRoles" :key="role.id">
                                                        <div v-if="roleprojet.role.length == 1">

                                                            {{roleprojet.role.id}}
                                                            <i v-if="role.id == roleprojet.role[0].id">{{role.acf.nom}}</i>  
                                                        </div>

                                                        <div v-if="roleprojet.role.length == 2">
                                                            <i v-if="role.id == roleprojet.role[0].id">{{role.acf.nom}}</i>  
                                                            <i v-if="role.id == roleprojet.role[1].id">{{role.acf.nom}}</i>  
                                                        </div>

                                                        <div v-if="roleprojet.role.length == 3">
                                                            <i v-if="role.id == roleprojet.role[0].id">{{role.acf.nom}}</i>  
                                                            <i v-if="role.id == roleprojet.role[1].id">{{role.acf.nom}}</i>  
                                                            <i v-if="role.id == roleprojet.role[2].id">{{role.acf.nom}}</i>  
                                                        </div>

                                                        <div v-if="roleprojet.role.length == 4">
                                                            <i v-if="role.id == roleprojet.role[0].id">{{role.acf.nom}}</i>  
                                                            <i v-if="role.id == roleprojet.role[1].id">{{role.acf.nom}}</i>  
                                                            <i v-if="role.id == roleprojet.role[2].id">{{role.acf.nom}}</i>  
                                                            <i v-if="role.id == roleprojet.role[3].id">{{role.acf.nom}}</i>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                           
                        </div>  
                    </li>
                </ul>
            </section>

            <section class="section-projet" id="Appreciations">
                <div class="ligne-titre">
                    <h3>Appréciations</h3>
                    <hr>
                </div>
                <ul class="carrousel">
                    <li class="appreciation">
                         <div v-for="appreciation in listeAppreciations" :key="appreciation.id">
                            <div v-if="appreciation.acf.projet[0].ID == projet.id"> 
                                <div>
                                    <p>{{appreciation.acf.appreciation | liveSubstr(400)}}</p>
                                    <div v-for="membre in listeMembres" :key="membre.id">
                                        <div v-if="membre.id == appreciation.acf.membre_du_jury[0].ID">
                                            <img v-if="membre.logo == null" :src="imageDefautUser" class="img-header" alt="Logo compte connecté">
                                            <img v-if="membre.logo != null" :src="membre.logo.url" class="img-header" alt="Logo compte connecté">
                                            <h6>{{membre.prenom}} {{membre.nom}}</h6>
                                        </div>
                                    </div>
                                    <br>
                                    <i>{{appreciation.acf.date_de_soutenance}}</i>
                                </div>
                            </div>
                        </div>  
                    </li>
                </ul>
            </section>

            <section class="section-projet" id="Recompense">
                <div class="ligne-titre">
                    <h3>Récompense(s)</h3>
                    <hr>
                </div>
                <ul class="carrousel">
                    <li class="flex" v-if="projet.acf.recompense != ''">
                        <div class="Infos-Recompense" v-for="recompense in listeRecompenses" :key="recompense.id">
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}" v-if="projet.acf.recompense.length == 0" class="text-center PlaqueRecompense">
                                <img :src="recompense.acf.image.url" alt="" class="avatar">
                                <h6>{{recompense.acf.nom}}</h6>
                            </router-link>
                            
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}"  v-if="projet.acf.recompense.length == 1" class="text-center PlaqueRecompense">
                                <div v-if="recompense.id == projet.acf.recompense[0].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                            </router-link>
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}"  v-if="projet.acf.recompense.length == 2"  class="text-center PlaqueRecompense">
                                <div v-if="recompense.id == projet.acf.recompense[0].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[1].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                            </router-link>
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}" v-if="projet.acf.recompense.length == 3" class="text-center PlaqueRecompense">
                                <div v-if="recompense.id == projet.acf.recompense[0].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[1].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[2].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                            </router-link>
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}" v-if="projet.acf.recompense.length == 4" class="text-center PlaqueRecompense">
                                <div v-if="recompense.id == projet.acf.recompense[0].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[1].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[2].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[3].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                            </router-link>
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}" v-if="projet.acf.recompense.length == 5" class="text-center PlaqueRecompense">
                                <div v-if="recompense.id == projet.acf.recompense[0].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[1].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[2].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[3].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[4].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                            </router-link>
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}" v-if="projet.acf.recompense.length == 6" class="text-center PlaqueRecompense">
                                <div v-if="recompense.id == projet.acf.recompense[0].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[1].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[2].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[3].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[4].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[5].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                            </router-link>
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}" v-if="projet.acf.recompense.length == 6" class="text-center PlaqueRecompense">
                                <div v-if="recompense.id == projet.acf.recompense[0].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[1].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[2].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[3].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[4].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[5].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[6].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                            </router-link>
                            <router-link :to="{name: 'Projet', params: {id : projet.id}}" v-if="projet.acf.recompense.length == 7" class="text-center PlaqueRecompense">
                                <div v-if="recompense.id == projet.acf.recompense[0].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[1].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[2].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[3].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[4].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[5].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[6].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                                <div v-if="recompense.id == projet.acf.recompense[7].ID">
                                    <img :src="recompense.acf.image.url" alt="" class="avatar">
                                    <h6>{{recompense.acf.nom}}</h6>
                                </div>
                            </router-link>
                        </div>  
                    </li>
                    <li v-if="projet.acf.recompense == ''">
                        <p>Aucune récompense pour le moment</p>
                    </li>
                </ul>
            </section>

            <!--<section class="section-projet" id="Projets-similaires">
                <div class="ligne-titre">
                    <h3>Projets Similaires</h3>
                    <hr>
                </div>
                <ul class="carrousel">
                    <li>
                        <a href="projet.html">
                            <img src="../../static/css/images/mmimontbeliard.png" class="visuel-projet" alt="Visuel de projet">
                            <div>
                                <img src="css/images/mmi.png" class="logo-projet" alt="Logo projet">
                                <h6>Refonte site dpt MMI</h6>
                                <i>Sept. 2021 - Janv 2022</i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="projet.html">
                            <img src="../../static/css/images/memo.png" class="visuel-projet" alt="Visuel de projet">
                            <div>
                                <img src="css/images/MeMOLogoBlanc.png" class="logo-projet" alt="Logo projet">
                                <h6>Site internet de la MéMO</h6>
                                <i>Sept. 2021 - Janv 2022</i>
                            </div>
                        </a>
                    </li>
                </ul>
            </section>-->
        </div>
    </div>
</template>

<script>
import param from '@/param/param'
import appService from '@/services/appService'

export default {
    name: 'Projet',
    data () {
        return {
            projet:{
                id: 0,
                acf:{
                    appreciation: null,
                    date_de_debut: null,
                    date_de_fin: null,
                    description_en: null,
                    description_fr: null,
                    domaine: null,
                    equipe: null,
                    image: null,
                    logo: null,
                    nom: null,
                    recompense: null,
                    type: null,
                    url: null,
                    visuel: null,
                }
            },
            listeRoleProjet:[],
            listeAppreciations:[],
            listeMembres:[],
            listeRecompenses:[],
            listeRoles:[],
            edit: null,
            imageDefautUser: null,
        }
    },

    created(){
        let utilisateurLocal = appService.getLocal();
        this.imageDefautUser = param.imageDefautUser;
        this.imageDefautBanniere = param.imageDefautBanniere;

        if(utilisateurLocal != null){
            this.utilisateur = utilisateurLocal;
            this.MembreConnecte = this.utilisateur.nom;
            this.MembreConnecteAvatar = param.imageDefautUser;
            this.MembreConnecteRole = this.utilisateur.role;
            this.MembreConnecteID = this.utilisateur.id;
        }
        this.projet.id = this.$route.params.id;
        this.edit = "https://backmmicollection.raphaelbonin.fr/wp-admin/post.php?post="+this.$route.params.id+"&action=edit"
        axios.get(param.hostacf+"projet/" + this.projet.id)
        .then(response=>{
            this.projet = response.data;
            if(this.projet.acf.visuel == false){
                this.projet.acf.visuel = null;
            }
            console.log('projet', this.projet)
        })
        .catch(error => console.log(error))

        axios.get(param.host+"role_projet/v12/listeRolesProjet")
        .then(response=>{
            this.listeRoleProjet = response.data;
            console.log('role projet', this.listeRoleProjet)

        })
        .catch(error => console.log(error))

        axios.get(param.host+"utilisateur/v11/listeUtilisateurs")
        .then(response=>{
            this.listeMembres = response.data;
            console.log('Membres', this.listeMembres);
        })

        axios.get(param.hostacf+"appreciation/")
        .then(response=>{
            this.listeAppreciations = response.data;
            console.log('Appréciations', this.listeAppreciations);
        })

        axios.get(param.hostacf+"type_vote/")
        .then(response=>{
            this.listeRecompenses = response.data;
            console.log('Type de vote', this.listeRecompenses);
        })

        axios.get(param.hostacf+"role/")
        .then(response=>{
            this.listeRoles = response.data;

        })
        .catch(error => console.log(error))
    },

    methods:{
        listeMembreProjet: function(projet){
            return this.listeRoleProjet.filter(function(membres){
                    return membres.id === projet;
            })
        },

        listeRoleMembreProjet: function(role, projet){
            return this.listeMembreProjet(projet).filter(function(rolemembre){
                    return rolemembre.id === role;
            })
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
.banniere{
    margin-bottom: 0;
}

.profil-info{
    width: calc(100% - 40px);
    display: block;
    margin: 50px 20px 10px;
}

.profil-info>h2{
    margin: 100px 0 35px;
}


li.appreciation,
.flex{
    display: flex;
}

li.appreciation>div>div,
.flex>div>div{
    margin: 0 25px;
}

li.appreciation>div>div:first-of-type
.flex>div>div:first-of-type{
    margin-left: 0;
}

li.appreciation>div>div>div>p{
    border-radius: 20px;
    width: 325px;
    height: 174.06px;
    padding: 15px;
}

.flex>div>div>div>div,
.Infos-Recompense>a>div{
    width: 300px;
    height: max-content;
    text-align: center;
}

.Infos-Recompense>a>div{
    margin: 0 20px;
}

.Zone-avatar{
    width: 200px;
    height: 200px;
    overflow:hidden;
    border-radius: 100px;
    margin: 0 auto;
}

.Zone-avatar>.avatar{
    width: 100%;
    height: auto;
    position: relative;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
}


li.appreciation>div>div>div>div>div>img{
    float: left;
    margin: 0;
}

li.appreciation>div>div>div>div>div>h6{
    margin: 0;
    margin-left: 50px;
    width: 100%;
}

</style>

