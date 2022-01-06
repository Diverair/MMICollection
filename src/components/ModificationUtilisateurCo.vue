
<template>
<div class="app fond">
    <form class="haut-page inscription page-inscription" @submit.prevent="modif" enctype="multipart/form-data">
        <h2>Modifier son compte</h2>
        <section>
            <i class="pink">* Obligatoire.</i>
            <br>
            <i class="pink">** <router-link to="/contact">Contactez</router-link> un administrateur pour modifier ces champs.</i>
        </section> 
        <section>
            <label for="inscription-prenom">Votre Prénom<i class="pink">*</i></label>
            <br><input type="text" id="inscription-prenom" placeholder="Prénom" v-model="Membre.acf.prenom" required>
        </section>
        <section>
            <label for="inscription-nom">Votre NOM<i class="pink">*</i></label>
            <br><input type="text" id="inscription-nom"  placeholder="NOM" v-model="Membre.acf.nom" required>
        </section>
        <section>
            <label for="inscription-pseudo">Votre Pseudo<i class="pink">**</i></label>
            <br> <i>{{MembreConnecte}}</i>
        </section>
        <section>
            <label for="inscription-dateNaissance">Votre Date de naissance<i class="pink">*</i></label>
            <br><input type="date" id="inscription-dateNaissance" placeholder="Date de naissance" required v-model="Membre.acf.date_de_naissance">
        </section>
        <section>
            <label for="inscription-mail">Votre Mail<i class="pink">**</i></label>
            <br> <i>{{MembreConnecteMail}}</i>
        </section>
        <section>
            <br><label for="avatar">Avatar</label>
            <div  class="previsualisationAvatar">
                <img :src="avatarData" class="preview" aspect-ratio="1/1" alt="Previsualisation de l'avatar">
            </div>
            <i>Taille 1/1</i>
            <br><input type="file" ref="file" id="avatar" @change="previewAvatar">
        </section>
        <!--<section>
            <br><label for="baniere-profil">Bannière</label>
            <i>Taille 16/9</i>
            <br><input type="file" id="baniere-profil">
        </section>-->
        <section>
            <label for="link-siteweb">Votre site web</label>
            <br><input type="link" id="link-siteweb" placeholder="https://votresiteweb.fr" v-model="Membre.acf.site_web">
        </section>
        <section>
            <label for="link-insta">Votre compte Instagram</label>
            <br><input type="link" id="link-insta" placeholder="https://instagram.fr" v-model="Membre.acf.instagram">
        </section>
        <section>
            <label for="link-linkedin">Votre compte Linkedin</label>
            <br><input type="link" id="link-linkedin" placeholder="https://linkedin.fr" v-model="Membre.acf.linkedin">
        </section>
        <section>
            <label for="link-linkedin">Votre chaîne Youtube</label>
            <br><input type="link" id="link-linkedin" placeholder="https://youtube.com" v-model="Membre.acf.youtube">
        </section>
        <section v-if="MembreConnecteRole == 'author' || MembreConnecteRole == 'editor' || MembreConnecteRole == 'administrator'">
            <label for="specialite">Votre spécialité</label>
            <br>
            <select v-model="speSelected" title="specialite" id="specialite">
                <option value="0">Aucune</option>
                <option v-for="specialite in listeOrderByName" :key="specialite.id" :value="specialite.id">{{specialite.acf.nom}}</option>
            </select>
        </section>
        <section v-if="MembreConnecteRole == 'author' || MembreConnecteRole == 'editor'">
            <label for="promotion">Votre Promotion</label>
            <br>
            <select v-model="promoSelected" title="Promos" id="promotion">
                <option value="0">Aucune</option>
                <option v-for="promo in listeOrderByDate" :key="promo.id" :value="promo.id">{{promo.nom}}</option>
            </select>
        </section>
        <section>
            <label for="mdp">Entre votre mot de passe pour valider les modifications<i class="pink">*</i></label>
            <br><input type="password" id="mdp" required placeholder="Votre mot de passe" v-model="Membre.mdp">
        </section>
        <section>
            <p>Vous n'avez pas encore de compte ? <a href="http://backmmicollection.raphaelbonin.fr/wp-login.php?action=register"><i>S'inscrire</i></a></p>
        </section>

        <div v-if="message != null">
            <i class="pink">{{message}}</i>
        </div>

        <br>
        <button class="red">
            <router-link to="/">Annuler</router-link>        
        </button>

        <button type="submit">
            <span>Modifier mon compte</span> 
        </button>
        
        
    </form>
</div>
</template>

<script>
    import param from '@/param/param'
    import appService from '@/services/appService'

    export default {
        name: 'ModificationUtilisateurCo',
        data () {
            return {
                listePromos:[],
                listeSpes:[],
                Membre: {
                    id: 0,
                    acf:{
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
                        logo: null,
                    }
                },
                utilisateur:{
                    username: null,
                    password: null,
                    token: null,
                    id: 0,
                    avatar: null,
                    role: null
                },
                avatarData: null,
                message: null,
                promoSelected: 0,
                speSelected: 0
            }
        },

        created(){
            let utilisateurLocal = appService.getLocal();
            this.imageDefautUser = param.imageDefautUser;
            this.avatarData = this.imageDefautUser;


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

            axios.get(param. hostacf+"type_utilisateur")
            .then(response=>{
                this.listeTypeUser = response.data;
            })
            .catch(error => console.log(error))

            this.Membre.id = this.$route.params.id;
            console.log('id du Membre', this.Membre.id);
            axios.get(param.hostacf+"utilisateur/" + this.Membre.id)
            .then(response=>{
                console.log('response', response);
                this.Membre = response.data;
                console.log('Membre', this.Membre);
                this.avatar = this.Membre.acf.logo;
                this.avatarData = this.Membre.acf.logo.url;
                this.speSelected = this.Membre.acf.specialite[0].ID;
                console.log("spe membre", this.Membre.acf.specialite[0].ID)
                this.promoSelected = this.Membre.acf.promo[0].ID;

                let d = this.Membre.acf.date_de_naissance.split("/");
                this.Membre.acf.date_de_naissance = d[2]+"-"+d[1]+"-"+d[0]
            })
            .catch(error => console.log(error))

        },

        methods:{
            previewAvatar: function(event) {

                // Mise à jour de la photo du participant
                this.avatar = this.$refs.file.files[0];
                console.log(this.$refs.file.files[0])

                // Reference to the DOM input element
                // Reference du fichier à prévisualiser
                var input = event.target;
                // On s'assure que l'on a au moins un fichier à lire
                if (input.files && input.files[0]) {
                    // Creation d'un filereader
                    // Pour lire l'image et la convertir en base 64
                    var reader = new FileReader();
                    // fonction callback appellée lors que le fichier a été chargé
                    reader.onload = (e) => {
                        // Read image as base64 and set to imageData
                        // lecture du fichier pour mettre à jour
                        // la prévisualisation
                        this.avatarData = e.target.result;
                    }
                    // Demarrage du reader pour la transformer en data URL (format base 64)
                    reader.readAsDataURL(input.files[0]);        
                }
            },

            modif: function(){
                let params = new FormData();
                params.append('username', this.MembreConnecte);
                params.append('password', this.Membre.mdp);
                this.message = null;

                axios({
                    method : 'post',
                    url : param.auth+'token',
                    data : params
                })
                .then(function (response){
                    let token = response.data.token;

                    const formDataAvatar = new FormData();
                    let avatarfile = document.querySelector('#avatar');
                    formDataAvatar.append("title", this.MembreConnecte+"Avatar");
                    formDataAvatar.append('file', this.avatar);
                    formDataAvatar.append("status", 'publish');

                    let headers = {
                        'Authorization' : 'Bearer' + token,
                        'Content-Type' : 'multipart/form-data'
                    }

                    axios({
                        method: 'post', 
                        url : param.hostacf+'media', 
                        data: formDataAvatar,
                        headers:headers
                    })
                    .then(function (response){
                        console.log('retour upload image', response);

                        let idAvatar = response.data.id;
                        console.log('idImage', idAvatar);
                        let urlAvatar = response.data.source_url;
                        console.log('url Image', urlAvatar);

                        if(idAvatar != undefined){
                            axios({
                                method: 'post',
                                data:{
                                    title : this.MembreConnecte,
                                    status : "publish",
                                    fields : {
                                        nom :               this.Membre.acf.nom,
                                        prenom :            this.Membre.acf.prenom,
                                        pseudo :            this.MembreConnecte,
                                        date_de_naissance : this.Membre.acf.date_de_naissance,
                                        mail:               this.MembreConnecteMail,
                                        site_web:           this.Membre.acf.site_web,
                                        instagram:          this.Membre.acf.instagram,
                                        linkedin:           this.Membre.acf.linkedin,
                                        youtube:            this.Membre.acf.youtube,
                                        specialite:         this.Membre.acf.specialite,
                                        promo:              this.Membre.acf.promo,
                                        banniere:           this.Membre.acf.banniere,
                                        logo:               idAvatar,
                                        compte:             this.MembreConnecteID,
                                        role:               this.MembreConnecteRole,

                                    }
                                },
                                url: param.hostacf+'utilisateur/'+this.Membre.id,
                                headers: { 'Authorization' : 'Bearer'+token}
                            })
                            .then(function(response){
                                console.log("Retour création Membre", response);
                                this.$router.push('/compte/'+this.Membre.id);
                            }.bind(this))
                            .catch(error => console.log(error))
                        }
                    }
                    .bind(this))
                    .catch(error => {
                        console.log('erreur création media');
                        console.log(error);
                    })

                    axios({
                        method: 'post',
                        data:{
                            title : this.MembreConnecte,
                            status : "publish",
                            fields : {
                                nom :               this.Membre.acf.nom,
                                prenom :            this.Membre.acf.prenom,
                                pseudo :            this.MembreConnecte,
                                date_de_naissance:  this.Membre.acf.date_de_naissance,
                                mail:               this.MembreConnecteMail,
                                site_web:           this.Membre.acf.site_web,
                                instagram:          this.Membre.acf.instagram,
                                linkedin:           this.Membre.acf.linkedin,
                                youtube:            this.Membre.acf.youtube,
                                specialite:         this.Membre.acf.specialite,
                                promo:              this.Membre.acf.promo,
                                banniere:           this.Membre.acf.banniere,
                                logo:               this.idAvatar,
                                compte:             this.MembreConnecteID,
                                role:               this.MembreConnecteRole,
                            }
                        },
                        url: param.hostacf+'utilisateur/'+this.Membre.id,
                        headers: { 'Authorization' : 'Bearer'+token}

                    })
                    .then(function(response){
                        console.log("Retour modif Membre", response);
                        this.$router.push('/compte/'+this.Membre.id);
                    }.bind(this))
                    .catch(error => console.log(error))

                    
                }.bind(this))
                .catch(error => 
                    this.message = param.message.errCnx
                )
            
            },
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

            listeOrderByTypeUtilisateur: function(){
                function compare(a, b) {
                    if (a.slug < b.slug) return -1;
                    if (a.slug > b.slug) return 1;
                }                
                return this.listeTypeUser.sort(compare)
            }
        },
    }
</script>

<style scoped>

</style>

