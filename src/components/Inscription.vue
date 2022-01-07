<template>
<div class="app fond">
    <form class="haut-page inscription page-inscription" @submit.prevent="creer">
        <h2>Inscription</h2>
        <section>
            <i class="pink">* La validation des conditions générales d'utilisation sont obligatoire pour s'inscrire.</i>
            <br>
            <i class="pink">** <router-link to="/contact">Contactez</router-link> un administrateur pour modifier ces champs.</i>
        </section>
        <section>
            <label for="inscription-prenom">Votre Prénom<i class="pink">*</i></label>
            <br><input type="text" id="inscription-prenom" placeholder="Prénom" v-model="Membre.prenom">
        </section>
        <section>
            <label for="inscription-nom">Votre NOM<i class="pink">*</i></label>
            <br><input type="text" id="inscription-nom"  placeholder="NOM" v-model="Membre.nom">
        </section>
        <section>
            <label for="inscription-pseudo">Votre Pseudo<i class="pink">**</i></label>
            <br> <i>{{MembreConnecte}}</i>
        </section>
        <section>
            <label for="inscription-dateNaissance">Votre Date de naissance<i class="pink">*</i></label>
            <br><input type="date" id="inscription-dateNaissance" placeholder="Date de naissance" v-model="Membre.date_de_naissance">
        </section>
        <section>
            <label for="inscription-mail">Votre Mail<i class="pink">**</i></label>
            <br> <i>{{MembreConnecteMail}}</i>
        </section>
        <section>
            <br><label for="avatar">Avatar</label>
            <i>Taille 1/1</i>
            <br><input type="file" id="avatar">
        </section>
        <section>
            <br><label for="baniere-profil">Bannière</label>
            <i>Taille 16/9</i>
            <br><input type="file" id="baniere-profil">
        </section>
        <section>
            <label for="link-siteweb">Votre site web</label>
            <br><input type="link" id="link-siteweb" placeholder="https://votresiteweb.fr" v-model="Membre.site_web">
        </section>
        <section>
            <label for="link-insta">Votre compte Instagram</label>
            <br><input type="link" id="link-insta" placeholder="https://instagram.fr" v-model="Membre.instagram">
        </section>
        <section>
            <label for="link-linkedin">Votre compte Linkedin</label>
            <br><input type="link" id="link-linkedin" placeholder="https://linkedin.fr" v-model="Membre.linkedin">
        </section>
        <section>
            <label for="link-linkedin">Votre chaîne Youtube</label>
            <br><input type="link" id="link-linkedin" placeholder="https://youtube.com" v-model="Membre.youtube">
        </section>
        <section v-if="MembreConnecteRole == 'author' || MembreConnecteRole == 'editor' || MembreConnecteRole == 'administrator'">
            <label for="specialite">Votre spécialité</label>
            <br>
            <select name="specialite" id="specialite">
                <option value="null">Aucune</option>
                <option v-for="specialite in listeOrderByName" :key="specialite.acf.id" :value="specialite.slug">{{specialite.acf.nom}}</option>
            </select>
        </section>
        <section v-if="MembreConnecteRole == 'author'">
            <label for="promotion">Votre Promotion</label>
            <br><select name="promotion" id="promotion">
                <option :value="null">Aucune</option>
                <option :value="promo.nom" v-for="promo in listeOrderByDate" :key="promo.id">{{promo.nom}}</option>
            </select>
        </section>
        <section>
            <label for="mdp">Entre votre mot de passe pour valider les modifications<i class="pink">*</i></label>
            <br><input type="password" id="mdp" placeholder="Votre mot de passe" v-model="Membre.mdp">
        </section>
        <section>
            <p>Vous n'avez pas encore de compte ? <a href="http://backmmicollection.raphaelbonin.fr/wp-login.php?action=register"><i>S'inscrire</i></a></p>
        </section>


        <br>
        <button class="red">
            <router-link to="/">Annuler</router-link>        
        </button>

        <button type="submit">
            <span>Compléter mon compte</span> 
        </button>
        
        
    </form>
</div>
</template>

<script>
    import param from '@/param/param'
    import appService from '@/services/appService'


    export default {
        name: 'Inscription',
        data () {
            return {
                listePromos:[],
                listeSpes:[],
                Membre: {
                    nom: null,
                    prenom: null,
                    date_de_naissance: null,
                    site_web: null,
                    instagram: null,
                    linkedin: null,
                    youtube: null,
                    specialite: {},
                    promo: {},
                    banniere: null,
                    logo: null
                },
                utilisateur:{
                    username: null,
                    password: null,
                    token: null,
                    id: 0,
                    avatar: null,
                    role: null
                },
                reussite: false,
            }
        },

        created(){
            let utilisateurLocal = appService.getLocal();

            if(utilisateurLocal != null){
                this.utilisateur = utilisateurLocal;
                this.MembreConnecte = this.utilisateur.nom;
                this.MembreConnecteAvatar = this.utilisateur.avatar;
                this.MembreConnecteRole = this.utilisateur.role;
                this.MembreConnecteID = this.utilisateur.id;
                this.MembreConnecteMail = this.utilisateur.email;
            }

            axios.get(param. host+"promo/v4/listePromos")
            .then(response=>{
                this.listePromos = response.data;
            })
            .catch(error => console.log(error))

            axios.get(param. hostacf+"specialite")
            .then(response=>{
                this.listeSpes = response.data;
            })
            .catch(error => console.log(error))
        },

        methods:{
            creer: function(){
                let params = new FormData();
                params.append('username', this.MembreConnecte);
                params.append('password', this.Membre.mdp);

                axios({
                    method : 'post',
                    url : param.auth+'token',
                    data : params
                }).then(function (response){
                    let token = response.data.token;

                    axios({
                        method: 'post',
                        data: {
                            title : this.MembreConnecte,
                            status : "publish",
                            fields: {
                                prenom:             this.Membre.prenom,
                                nom:                this.Membre.nom,
                                pseudo:             this.MembreConnecte,
                                mail:               this.MembreConnecteMail,
                                date_de_naissance:  this.Membre.date_de_naissance,
                                site_web:           this.Membre.site_web,
                                instagram:          this.Membre.instagram,
                                linkedin:           this.Membre.linkedin,
                                youtube:            this.Membre.youtube,
                                specialite:         this.Membre.specialite,
                                promo:              this.Membre.promo,
                                banniere:           this.Membre.banniere,
                                logo:               this.Membre.logo,
                                compte:             this.MembreConnecteID,
                            }
                        },
                        url: param.hostacf+'utilisateur/',
                        headers: { 'Authorization': 'Bearer' + token }
                    }).then(function(response){
                        if(response.data != null){
                            this.reussite = true;
                            console.log(reussite)
                        }

                        this.$router.push('/');
                        this.titre = param.titre;
                        this.utilisateur = {
                            id : null,
                            nom : null,
                            role : null,
                            token : null,
                            email : null,
                            avatar : null,
                        }
                        appService.removeLocal();
                        
                        this.MembreConnecte = null;
                        this.MembreConnecteAvatar = null;
                        this.MembreConnecteRole = null;
                        this.MembreConnecteID = null;
                        
                    }.bind(this))
                    .catch(error => console.log(error)) 
                }.bind(this))
                .catch(error => console.log(error)) 
            }       
        },

        computed:{
            listeOrderByDate: function(){
                function compare(a, b) {
                        if (a.nom < b.nom) return 1;
                        if (a.nom > b.nom) return -1;
                }
                return this.listePromos.sort(compare);
            },

            listeOrderByName: function(){
                function compare(a, b) {
                        if (a.acf.nom < b.acf.nom) return -1;
                        if (a.acf.nom > b.acf.nom) return 1;
                }                
                return this.listeSpes.sort(compare)
            },

        },
    }
</script>

<style scoped>

</style>

