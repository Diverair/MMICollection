<template>
<div class="app fond">
    <form class="haut-page inscription page-inscription" ref="form" @submit.prevent="sendEmail">
                <h2>Contact</h2>
                 <section>
                    <i class="pink">* Obligatoire.</i>
                </section>
                <section>
                    <label for="contact-mail">Votre Mail<i class="pink">*</i></label>
                    <br><input type="email" id="contact-mail" placeholder="Mail" v-model="Mail" name="user_email">
                </section>
                <section>
                    <label for="pseudo">Votre Pseudo<i class="pink">*</i></label>
                    <br><input type="text" id="pseudo" placeholder="Votre Pseudo" v-model="Pseudo" name="user_name">
                </section>
                <section>
                    <label for="message">Votre message<i class="pink">*</i></label>
                    <br>
                    <textarea id="message" placeholder="Votre message" v-model="msg" name="message"></textarea>
                </section>

                 <section>
                    <p>Vous pouvez également vous <a href="http://backmmicollection.raphaelbonin.fr/wp-login.php?action=register"><i>inscrire</i></a> pour avoir plus de fonctionnalités disponibles</p>
                </section>
                <div v-if="message != null">
                    <i class="pink">{{message}}</i>
                </div>

                <button class="btn-contact-form">
                    <a>Envoyer</a>
                </button>
            </form>
    <div class="corps-page mentions-legales">
        <section id="Resaux-sociaux">
            <hr>
            <h2>Nos réseaux</h2>
        </section>
        <div class="reseaux-contact">
            <a href="https://www.facebook.com/mmimontbeliard">
                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" class="logo-reseaux-contact svg-inline--fa fa-facebook-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#FAFAFA" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                    </path>
                </svg>
            </a>
            <a href="https://twitter.com/MMImontbeliard">
                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter-square" class="logo-reseaux-contact svg-inline--fa fa-twitter-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#FAFAFA" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z">
                    </path>
                </svg>
            </a>
            <br class="tel">
            <a href="https://www.linkedin.com/school/mmimontbeliard/">
                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="logo-reseaux-contact svg-inline--fa fa-linkedin-in fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="#FAFAFA" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                </path>
                </svg>
            </a>
            <a href="https://www.instagram.com/mmi_montbeliard/">
                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="logo-reseaux-contact svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="#FAFAFA" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                    </path>
                </svg>
            </a>
        </div>

        <section id="Nous-retrouver">
            <hr>
            <h2>Nous retrouver</h2>
        </section>

        <section id="Respo-legal">
            <p>
                <b>Adresse postale &nbsp: </b><span>MMi Montbéliard 4 place Tharradin 25200 Montbéliard</span><br>
                <b>Tél &nbsp: </b><a href="tel:+33381994734">03.81.99.47.34</a><br>
                <b>Email &nbsp: </b><a href="mailto:dut-mmi-montbeliard@univ-fcomte.fr">dut-mmi-montbeliard@univ-fcomte.fr</a><br>
                <b>Site internet &nbsp: </b><a href="https://mmimontbeliard.fr">mmimontbeliard.fr</a><br>
                <b>SIRET &nbsp: </b><span>19251215000488</span><br>
                <b>Représentant légal &nbsp: </b><span>Monsieur Alain LAMBOUX-DURAND</span>
            </p>

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2695.7144644401683!2d6.803090316073565!3d47.49547560364032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4792172655793f9f%3A0x1b3b0f76560084ad!2sD%C3%A9partement%20MMI!5e0!3m2!1sfr!2sfr!4v1636885343016!5m2!1sfr!2sfr" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </section>

        <section id="equipedev">
            <hr>
            <h2>Réalisation</h2>
        </section>
        <section class="carrousel contact">
            <div style="text-align:center">
                <a href="compte.html">
                    <img src="../../static/css/images/avatar-nathan.png" class="avatar" alt="Images projet">
                    <div class="text-center">
                        <h4>Nathan Baumann</h4>
                        <p><i>Responsable Communication</i></p>
                    </div>
                </a>
            </div>

            <div style="text-align:center">
                <a href="compte.html">
                    <img src="../../static/css/images/avatar-raph.png" class="avatar" alt="Images projet">
                    <div class="text-center">
                        <h4>Raphaël BONIN</h4>
                        <p><i>Chef de projet</i></p>
                        <p><i>Responsable développement</i></p>
                    </div>
                </a>
            </div>

            <div style="text-align:center">
                <a href="compte.html">
                    <img src="../../static/css/images/avatar-benoit.png" class="avatar" alt="Images projet">
                    <div class="text-center">
                        <h4>Benoît CLAUDE</h4>
                        <p><i>Responsable design</i></p>
                    </div>
                </a>
            </div>
        </section>
        <section class="text-center">
            <p>Projet réalisé dans le cadre de notre projet de 3e semestre.</p>
        </section>
    </div>
</div>
</template>

<script>
    import param from '@/param/param'
    import appService from '@/services/appService'

    export default {
        name: 'Contact',
        data () {
            return{
                utilisateur:{
                    username: null,
                    password: null,
                    token: null,
                    id: 0,
                    avatar: null,
                    role: null
                },
                Mail : null,
                Pseudo : null,
                msg: '',
                message: null
            }
        },

        created(){ 
            let utilisateurLocal = appService.getLocal();

            if(utilisateurLocal != null){
                this.utilisateur = utilisateurLocal;
                this.MembreConnecte = this.utilisateur.nom;
                this.MembreConnecteAvatar = param.imageDefautUser;
                this.MembreConnecteRole = this.utilisateur.role;
                this.MembreConnecteID = this.utilisateur.id;
                this.MembreConnecteMail = this.utilisateur.email;
                this.Afficher = this.utilisateur.Afficher;
                this.Mail = this.MembreConnecteMail,
                this.Pseudo = this.MembreConnecte
            }else{
                this.MembreConnecte = null;
                this.MembreConnecteAvatar = null;
                this.MembreConnecteRole = null;
                this.MembreConnecteID = null;
                this.MembreConnecteMail = null;
            }

            
        }, 
        methods: {
            sendEmail() {
            emailjs.sendForm('service_3qkvief', 'template_7s5hsug', this.$refs.form, 'user_4FEXOoWTMcZDug622CzA6')
                .then((result) => {
                    console.log('SUCCESS!', result.text);
                    this.message = param.message.envoiMail
                    this.$router.push('/');
                }, (error) => {
                    console.log('FAILED...', error.text);
                    this.message = param.message.echecEnvoiMail
                });
            }
        }
    }
</script>

<style scoped>

</style>

