
<template>
  <div id="app">
    <header class="">
        <div>
            <router-link to="/">
                <svg xmlns="http://www.w3.org/2000/svg" class="logo-header" viewBox="0 0 44.888 44">
                    <path class="color-objet-stroke" id="mmi-stroke-logo" d="M67.873,17.051l-10.471,41L46.93,34.989,60.6,45.239,52.165,22.177,67.873,40.113,83.582,22.177,75.125,45.3,88.818,34.989,78.346,58.051Z" transform="translate(-45.43 -15.551)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"/>
                </svg>
            </router-link>
        </div>

        <h1>MMI Collection</h1> 
       
        <div v-if="MembreConnecte != null">
            <div class="membre-header" v-for="membre in listeMembres" :key="membre.id">
                <div class="membre-header" v-if="membre.compte.ID == MembreConnecteID">
                    <router-link :to="{name: 'Compte', params: {id : membre.id}}"><h5>{{MembreConnecte}}</h5></router-link>
                    <router-link :to="{name: 'Compte', params: {id : membre.id}}">
                        <img v-if="membre.logo == null" :src="imageDefautUser" class="img-header" alt="Logo compte connecté">
                        <img v-if="membre.logo != null" :src="membre.logo.url" class="img-header" alt="Logo compte connecté">
                    </router-link>
                </div> 
            </div>
        </div>

        <button data-toggle="modal" data-target=#cnxModal class="BGtransparent cursor" v-if="MembreConnecte == null" style="min-width:max-content">
            <h5 class="ordi">Se connecter</h5>
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-in-alt" class="tel color-objet-fill svg-inline--fa fa-sign-in-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M416 448h-84c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h84c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32h-84c-6.6 0-12-5.4-12-12V76c0-6.6 5.4-12 12-12h84c53 0 96 43 96 96v192c0 53-43 96-96 96zm-47-201L201 79c-15-15-41-4.5-41 17v96H24c-13.3 0-24 10.7-24 24v96c0 13.3 10.7 24 24 24h136v96c0 21.5 26 32 41 17l168-168c9.3-9.4 9.3-24.6 0-34z"></path></svg>
        </button>
        <button v-if="MembreConnecte != null" @click="deconnect" class="BGtransparent cursor"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="color-objet-fill-red svg-inline--fa fa-sign-out-alt fa-w-16 img-header" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg></button>



        <div class="bouton-menu" onclick="document.documentElement.classList.toggle('menu-open')">
            <div class="bouton-menu-bar">
            </div>
            <nav class="menu">
                <ul>
                    <li class="li-menu"><router-link to="/">Accueil</router-link></li>
                    <li class="li-menu"><router-link :to="{name: 'Projets', params: {id : 0}}">Projets</router-link></li>
                    <!--<li><router-link to="/vote">Votes</router-link></li>-->
                    <li class="li-menu"><router-link to="/contact">Contact</router-link></li>
                    <li class="li-menu" v-if="MembreConnecteRole == 'administrator' || MembreConnecteRole == 'author' || MembreConnecteRole == 'editor'"><router-link to="/manuelajoutprojet">Manuel d'ajout projet</router-link></li>
                    <li class="li-menu" v-if="MembreConnecteRole == 'administrator' || MembreConnecteRole == 'author' || MembreConnecteRole == 'editor'"><a :href="ajoutProjet">Ajout Projet</a></li>
                    <li v-if="MembreConnecte != null" class="tel li-menu">
                        <div v-for="membre in listeMembres" :key="membre.id">
                            <div v-if="membre.compte.ID == MembreConnecteID">
                                <router-link :to="{name: 'Compte', params: {id : membre.id}}">Mon compte</router-link>
                            </div>
                        </div>
                    </li>
                </ul>
                 
            </nav>
        </div>
    </header>
    
    <div class="modal hide" id="cnxModal" ref="cnxModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div id="connexion" class="modal-dialog fond connexion" role="document">
            <div class="cadre-connexion modal-content">
                <div class="modal-header">
                    <button data-toggle="modal" data-target=#cnxModal class="fermetureConnexion cursor"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="color-objet-fill croix-fermeture svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></button>
                    <h2 class="modal-title" id="exampleModalLabel">Connexion</h2>

                    <label for="identifiant-connexion"></label>
                    <input type="text" id="identifiant-connexion" placeholder="Identifiant" v-model="utilisateur.username"><br>

                    <label for="mdp-connexion"></label>
                    <input type="password" id="mdp-connexion" placeholder="Mot-de-passe" v-model="utilisateur.password"><br>
                    <p style="text-align: left; margin-left: 30px"><a href="https://backmmicollection.raphaelbonin.fr/wp-login.php?action=lostpassword">Mot de passe oublié ?</a></p>


                    <div v-if="message != null">
                        <i class="pink">{{message}}</i>
                    </div>

                    <button type="button" class="close" aria-label="Close" @click="connect">
                        Se connecter
                    </button>
                    <p>Vous n'avez pas encore de compte ? <a href="http://backmmicollection.raphaelbonin.fr/wp-login.php?action=register"><i>S'inscrire</i></a></p>
                </div>
            </div>
        </div>
    </div>
    
    <div v-if="MembreConnecte != null">
        <div v-if="Afficher == true" class="complementInscription">
            <form class="haut-page inscription page-inscription" @submit.prevent="creer" enctype="multipart/form-data">
                <h2>Complétez votre inscription</h2>
                <section>
                    <i class="pink">* Obligatoire</i>
                    <br>
                    <i class="pink">** <router-link to="/contact">Contactez</router-link> un administrateur pour modifier ces champs.</i>
                </section>
                <section>
                    <label for="inscription-prenom">Votre Prénom<i class="pink">*</i></label>
                    <br><input type="text" required id="inscription-prenom" placeholder="Prénom" v-model="Membre.prenom">
                </section>
                <section>
                    <label for="inscription-nom">Votre NOM<i class="pink">*</i></label>
                    <br><input type="text" required id="inscription-nom"  placeholder="NOM" v-model="Membre.nom">
                </section>
                <section>
                    <label for="inscription-pseudo">Votre Pseudo<i class="pink">**</i></label>
                    <br> <i>{{MembreConnecte}}</i>
                </section>
                <section>
                    <label for="inscription-dateNaissance">Votre Date de naissance<i class="pink">*</i></label>
                    <br><input type="date" id="inscription-dateNaissance" required placeholder="Date de naissance" v-model="Membre.date_de_naissance">
                </section>
                <section>
                    <label for="inscription-mail">Votre Mail<i class="pink">**</i></label>
                    <br> <i>{{MembreConnecteMail}}</i>
                </section>
                <section>
                    <br><label for="avatar">Avatar</label>
                    <div  class="previsualisationAvatar">
                        <img :src="avatarData" aspect-ratio="1/1" class="preview" alt="Previsualisation de l'avatar">
                    </div>
                    <i>Taille 1/1</i>
                    <br><input type="file" ref="file" id="avatar" @change="previewAvatar">
                </section>
                <!---->
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
                    <br><input type="" id="link-linkedin" placeholder="https://youtube.com" v-model="Membre.youtube">
                </section>
                <section v-if="MembreConnecteRole == 'author' || MembreConnecteRole == 'editor' || MembreConnecteRole == 'administrator'">
                    <label for="specialite">Votre spécialité</label>
                    <br>
                    <select name="specialite" id="specialite">
                        <option value="null">Aucune</option>
                        <option v-for="specialite in listeOrderByName" :key="specialite.acf.id" :value="specialite.slug">{{specialite.acf.nom}}</option>
                    </select>
                </section>
                <section v-if="MembreConnecteRole == 'author' || MembreConnecteRole == 'editor'">
                    <label for="promotion">Votre Promotion</label>
                    <br>
                    <select v-model="promoSelected" title="Promos">
                        <option value="0">Aucune</option>
                        <option v-for="promo in listeOrderByDate" :key="promo.id" :value="promo.id">{{promo.nom}}</option>
                    </select>
                </section>
                <section>
                    <label for="mdp">Entre votre mot de passe pour valider les modifications<i class="pink">*</i></label>
                    <br><input type="password" required id="mdp" placeholder="Votre mot de passe" v-model="Membre.mdp">
                </section>

                <section>                
                    <p style="text-align: left;"><a href="https://backmmicollection.raphaelbonin.fr/wp-login.php?action=lostpassword">Mot de passe oublié ?</a></p>
                </section>

                <p class="pink">{{message}}</p>

                <br>
                <button class="red" @click="deconnect">
                    <span>Se deconnectter</span>        
                </button>

                <button type="submit">
                    <span>Compléter mon compte</span> 
                </button>
            </form>
        </div>
    </div>

    
    <router-view/>
    
    

    <footer>
        <div class="text-footer">
            <address class="footer-gauche">
                <p>MMi Montbéliard</p>
                <a href="https://goo.gl/maps/sULy3Nk3PTtPmj9HA">4 place Tharradin<br>
                25200 Montbéliard
                </a>
                <br>
                <a href="tel:+33381994734">03.81.99.47.34</a><br>
                <a href="https://mmimontbeliard.fr">mmimontbeliard.fr</a>
            </address>
            <section class="footer-centre">
                <svg xmlns="http://www.w3.org/2000/svg" class="logo-footer" viewBox="0 0 44.888 44">
                    <path class="color-objet-stroke-footer" id="mmi-stroke-logo" d="M67.873,17.051l-10.471,41L46.93,34.989,60.6,45.239,52.165,22.177,67.873,40.113,83.582,22.177,75.125,45.3,88.818,34.989,78.346,58.051Z" transform="translate(-45.43 -15.551)" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="3"/>
                </svg>
            </section>
            <section class="footer-droit">
                <div>
                    <a href="https://www.facebook.com/mmimontbeliard">
                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" class="logo-reseaux-footer svg-inline--fa fa-facebook-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="#FAFAFA" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                            </path>
                        </svg>
                    </a>
                    <a href="https://twitter.com/MMImontbeliard">
                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter-square" class="logo-reseaux-footer svg-inline--fa fa-twitter-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="#FAFAFA" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z">
                            </path>
                        </svg>
                    </a>
                    <br class="ordi">
                    <a href="https://www.linkedin.com/school/mmimontbeliard/">
                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="logo-reseaux-footer svg-inline--fa fa-linkedin-in fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#FAFAFA" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                        </path>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/mmi_montbeliard/">
                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="logo-reseaux-footer svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                            <path fill="#FAFAFA" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                    </a>
                </div>
            </section>
        </div>
        <div class="lien-footer">
            <router-link to="/mentionslegales/#politiqueconfidentialite">Politique de confidentialité</router-link><br class="tel">
            <router-link to="/mentionslegales">- Mentions Légales -</router-link><br class="tel">
            <router-link to="/mentionslegales">Conditions générales d'utilisations</router-link>
        </div>
       
    </footer>

  </div>
</template>

<script>
import param from '@/param/param'
import appService from '@/services/appService'


export default { // Exportable pour pouvoir être importé
    name: 'App',
    data(){
        return{
            utilisateur:{
                username: null,
                password: null,
                token: null,
                id: 0,
                avatar: null,
                role: null, 
                Afficher: true
            },
            MembreConnecte: null,
            MembreConnecteAvatar: null,
            MembreConnecteRole: null,
            MembreConnecteMail: null,
            message: null,
            messageCrea: null,
            ajoutProjet: null,
            listeMembres:[],
            Membre: {
                id:0,
                nom: null,
                prenom: null,
                date_de_naissance: null,
                site_web: null,
                instagram: null,
                linkedin: null,
                youtube: null,
                specialite: 0,
                promo: 0,
                banniere: null,
                logo: null,
            },
            Afficher: true,
            reussite: false,
            file: null,
            avatarData: null,
            valide: true,
            imageDefautUser: null,
            promoSelected: 0,
            speSelected: 0    
        }
    },
    
    created(){
        let utilisateurLocal = appService.getLocal();
        this.ajoutProjet = param.admin+'post-new.php?post_type=projet';
        this.imageDefautUser = param.imageDefautUser;
        this.avatarData = this.imageDefautUser;
        


        if(utilisateurLocal != null){
            this.utilisateur = utilisateurLocal;
            this.MembreConnecte = this.utilisateur.nom;
            this.MembreConnecteAvatar = param.imageDefautUser;
            this.MembreConnecteRole = this.utilisateur.role;
            this.MembreConnecteID = this.utilisateur.id;
            this.MembreConnecteMail = this.utilisateur.email;
            this.Afficher = this.utilisateur.Afficher;
        }

        axios.get(param.host+"utilisateur/v11/listeUtilisateurs")
        .then(response=>{
            this.listeMembres = response.data;
            console.log('membres', this.listeMembres)
        })
        .catch(error => console.log(error))

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

        connect: function(){
            appService.removeLocal();
            this.MembreConnecte = null;
            this.MembreConnecteAvatar = null;
            this.MembreConnecteRole = null;
            this.MembreConnecteID = null;
            this.MembreConnecteMail = null;
            this.message = null;
            this.Afficher = true;

            // Connexion utilisateur avec user/mot de passe
            let params = new FormData();
            params.append('username', this.utilisateur.username);
            params.append('password', this.utilisateur.password);

            axios({
                method : 'post',
                url : param.auth+'token',
                data : params
            }).then(function(response){

                    //console.log("response", response);
                
                this.utilisateur = response.data;
                this.MembreConnecte = this.utilisateur.user_display_name;
                this.MembreConnecteAvatar = this.utilisateur.avatar;
                this.MembreConnecteRole = this.utilisateur.user_role;
                this.MembreConnecteID = this.utilisateur.user_id;
                this.MembreConnecteMail = this.utilisateur.user_email;


                for(let i = 0; i < this.listeMembres.length; i++){
                    let membre = this.listeMembres[i];
                    if(membre.compte.ID == this.MembreConnecteID){
                        this.Afficher = false;
                    }
                }
                
                let localValues = {
                    id : this.utilisateur.user_id,
                    nom : this.utilisateur.user_display_name,
                    role : this.utilisateur.user_role[0],
                    token : this.utilisateur.token,
                    email : this.utilisateur.user_email,
                    avatar : this.utilisateur.avatar,
                    Afficher : this.Afficher,
                }

                

                appService.setLocal(localValues);
                
                
                if(this.message == null){
                    $("#cnxModal").modal('hide');
                    this.$router.push('/');
                    location.reload();
                }
            }.bind(this)).catch(error => {
                //console.log("erreur connexion", error);
                this.message = param.message.errCnx;

            })
        },

        creer: function(){
            let idAvatar = undefined;
            let params = new FormData();
            params.append('username', this.MembreConnecte);
            params.append('password', this.Membre.mdp);

            axios({
                method : 'post',
                url : param.auth+'token',
                data : params
            })
            .then(function (response){
                let token = response.data.token;

                const formDataAvatar = new FormData();
                let avatarfile = document.querySelector('#avatar');
                formDataAvatar.append("title", this.MembreConnecteID+"Avatar");
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
                                    nom :               this.Membre.nom,
                                    prenom :            this.Membre.prenom,
                                    pseudo :            this.MembreConnecte,
                                    date_de_naissance:  this.Membre.date_de_naissance,
                                    mail:               this.MembreConnecteMail,
                                    site_web:           this.Membre.site_web,
                                    instagram:          this.Membre.instagram,
                                    linkedin:           this.Membre.linkedin,
                                    youtube:            this.Membre.youtube,
                                    specialite:         this.speSelected,
                                    promo:              this.promoSelected,
                                    banniere:           null,
                                    logo:               this.idAvatar,
                                    compte:             this.MembreConnecteID,
                                    role:               this.MembreConnecteRole,
                                }
                            },
                            url: param.hostacf+'utilisateur/',
                            headers: { 'Authorization' : 'Bearer'+token}
                        })
                        .then(function(response){
                            console.log("Retour création Membre", response);
                            appService.removeLocal();
                    
                            this.MembreConnecte = null;
                            this.MembreConnecteAvatar = null;
                            this.MembreConnecteRole = null;
                            this.MembreConnecteID = null;
                            this.MembreConnecteMail = null;
                            this.Afficher = false;
                            
                            this.$router.push('/');

                            location.reload();
                        }.bind(this))
                        .catch(error => console.log(error))
                    }
                }
                .bind(this))
                .catch(error => {
                    console.log('erreur création media');
                    console.log(error);
                })

                if(idAvatar == undefined){
                    axios({
                        method: 'post',
                        data:{
                            title : this.MembreConnecte,
                            status : "publish",
                            fields : {
                                nom :               this.Membre.nom,
                                prenom :            this.Membre.prenom,
                                pseudo :            this.MembreConnecte,
                                date_de_naissance:  this.Membre.date_de_naissance,
                                mail:               this.MembreConnecteMail,
                                site_web:           this.Membre.site_web,
                                instagram:          this.Membre.instagram,
                                linkedin:           this.Membre.linkedin,
                                youtube:            this.Membre.youtube,
                                specialite:         this.Membre.specialite,
                                promo:              this.Membre.promo,
                                banniere:           null,
                                logo:               this.idAvatar,
                                compte:             this.MembreConnecteID,
                                role:               this.MembreConnecteRole,
                                
                            }
                        },
                        url: param.hostacf+'utilisateur/',
                        headers: { 'Authorization' : 'Bearer'+token}

                    })
                    .then(function(response){
                        console.log("Retour création Membre", response);
                        this.Afficher = false;
                        appService.removeLocal();
                
                        this.MembreConnecte = null;
                        this.MembreConnecteAvatar = null;
                        this.MembreConnecteRole = null;
                        this.MembreConnecteID = null;
                        this.MembreConnecteMail = null;
                        this.Afficher = false;
                        
                        this.$router.push('/');

                        location.reload();

                    }.bind(this))
                    .catch(error => console.log(error))
                }
                
            }.bind(this))
            .catch(error => 
                console.log(error)            
            )
        
        },

        deconnect:function(){
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
            this.MembreConnecteMail = null;
            this.Afficher = true;
            
            this.$router.push('/');
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
            return this.listeSpes.sort(compare);
        },
    },
}
</script>

<style>

</style>


