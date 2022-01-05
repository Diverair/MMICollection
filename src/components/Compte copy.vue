<template>
    <div class="app fond">
        <div class="modal hide" id="BanModal" ref="cnxModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div id="connexion" class="modal-dialog fond connexion" role="document">
                <div class="cadre-connexion modal-content">
                    <div class="modal-header">
                        <button data-toggle="modal" data-target=#BanModal class="fermetureConnexion cursor"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="plus" class="color-objet-fill croix-fermeture svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg></button>
                        <h2 class="modal-title" id="exampleModalLabel">Modification Bannière</h2>

                        <section>
                            <br><label for="baniere-profil"></label>
                            <div class="previsualisationBanniere">
                                <img :src="banniereData" class="preview" alt="Previsualisation de la banniere">
                            </div>
                            <br>
                            <i>Taille 16/9</i>
                            <br>
                            <br>
                            <div class="parent-div cursor">
                                <button class="btn-upload cursor">Choisir le fichier</button>
                                <input type="file" id="baniere" ref="file" class="cursor" @change="previewBanniere" name="upfile">
                            </div>
                        </section>

                        <button type="button" class="close" aria-label="Close" @click="BanniereUpload">
                            Définir
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <section class="profil">
            <div class="image-avatar">
                <div class="banniere">
                    <img v-if="Membre.acf.banniere == null" :src="imageDefautBanniere" alt="Bannière par défaut">
                    
                    <img v-if="Membre.acf.banniere != null" :src="Membre.acf.banniere.url" alt="Bannière personnalisée de profil">

                    <div class="parent-div-banniere" v-if="MembreConnecteID == Membre.acf.compte.ID">
                        <button data-toggle="modal" data-target=#BanModal class="ModalBanniere cursor BGtransparent" >
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil-alt" class="logo-header color-objet-fill svg-inline--fa fa-pencil-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497.9 142.1l-46.1 46.1c-4.7 4.7-12.3 4.7-17 0l-111-111c-4.7-4.7-4.7-12.3 0-17l46.1-46.1c18.7-18.7 49.1-18.7 67.9 0l60.1 60.1c18.8 18.7 18.8 49.1 0 67.9zM284.2 99.8L21.6 362.4.4 483.9c-2.9 16.4 11.4 30.6 27.8 27.8l121.5-21.3 262.6-262.6c4.7-4.7 4.7-12.3 0-17l-111-111c-4.8-4.7-12.4-4.7-17.1 0zM124.1 339.9c-5.5-5.5-5.5-14.3 0-19.8l154-154c5.5-5.5 14.3-5.5 19.8 0s5.5 14.3 0 19.8l-154 154c-5.5 5.5-14.3 5.5-19.8 0zM88 424h48v36.3l-64.5 11.3-31.1-31.1L51.7 376H88v48z"></path></svg>
                        </button>
                    </div>
                </div>
                <div class="fond-avatar">
                    <img v-if="Membre.acf.logo == null" :src="imageDefautUser" class="avatar" alt="Bannière par défaut">
                    <img v-if="Membre.acf.logo != null" :src="Membre.acf.logo.url" class="avatar" alt="Votre bannière de profil">            
                </div>
                <div class="role-utilisateur" v-if="Membre.acf.role == 'subscriber'">
                    <svg class="color-objet-fill" xmlns="http://www.w3.org/2000/svg" width="48.916" height="55.904" viewBox="0 0 48.916 55.904">
                        <path id="user-solid" d="M24.458,27.952A13.976,13.976,0,1,0,10.482,13.976,13.975,13.975,0,0,0,24.458,27.952Zm9.783,3.494H32.418a19.007,19.007,0,0,1-15.92,0H14.675A14.679,14.679,0,0,0,0,46.121v4.542A5.242,5.242,0,0,0,5.241,55.9H43.675a5.242,5.242,0,0,0,5.241-5.241V46.121A14.679,14.679,0,0,0,34.241,31.446Z"/>
                    </svg>
                </div>  
                <div class="role-utilisateur" v-if="Membre.acf.role == 'author'">
                    <svg class="color-objet-fill" xmlns="http://www.w3.org/2000/svg" width="58.365" height="66.058" viewBox="0 0 58.365 66.058">
                        <path id="Tracé_178" data-name="Tracé 178" d="M317.253,42.441l-11.77,11.77-11.77-11.77a16.544,16.544,0,0,0-15.864,16.508v1.184a5.922,5.922,0,0,0,5.921,5.922H327.2a5.922,5.922,0,0,0,5.921-5.921V58.949A16.544,16.544,0,0,0,317.253,42.441ZM278.066,10.407l.834.195v7.607a3.01,3.01,0,0,0-.117,5.213l-2.032,8.118c-.226.9.274,1.822.99,1.822h5.447c.717,0,1.212-.925.99-1.824l-2.034-8.118a3.011,3.011,0,0,0-.116-5.213V11.35l8.6,2.072a16.65,16.65,0,1,0,31.537,7.428,16.391,16.391,0,0,0-1.824-7.428L332.884,10.4a2.074,2.074,0,0,0,0-4.1L308.076.3A11.179,11.179,0,0,0,302.9.3L278.066,6.282A2.087,2.087,0,0,0,278.066,10.407Z" transform="translate(-276.297 0.003)"/>
                    </svg>
                </div> 
                <div class="role-utilisateur" v-if="Membre.acf.role == 'editor'">
                    <svg class="color-objet-fill " xmlns="http://www.w3.org/2000/svg" width="71.496" height="57.197" viewBox="0 0 71.496 57.197">
                        <path id="chalkboard-teacher-solid" d="M23.235,39.323a2.556,2.556,0,0,0-.789.122,14.736,14.736,0,0,1-4.574.772,14.749,14.749,0,0,1-4.575-.772,2.549,2.549,0,0,0-.788-.122A12.513,12.513,0,0,0,0,51.9,5.348,5.348,0,0,0,5.361,57.2H30.384A5.348,5.348,0,0,0,35.747,51.9,12.513,12.513,0,0,0,23.235,39.323Zm-5.362-3.575A10.724,10.724,0,1,0,7.148,25.024,10.724,10.724,0,0,0,17.873,35.748ZM66.132,0h-42.9a5.459,5.459,0,0,0-5.362,5.54v5.185a14.137,14.137,0,0,1,7.15,1.988V7.15H64.345V39.323H57.2v-7.15H42.9v7.15H34.379a14.238,14.238,0,0,1,4.434,7.15H66.132a5.459,5.459,0,0,0,5.362-5.54V5.54A5.459,5.459,0,0,0,66.132,0Z" transform="translate(0.002)"/>
                    </svg>
                </div> 
                <div class="role-utilisateur roleadmin" v-if="Membre.acf.role == 'administrator'">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="color-objet-fill svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg>
                </div> 
                <div class="barre-nav-utilisateur ordi">
                    <router-link :to="{name: 'ModificationUtilisateurCoInscription', params: {id : Membre.id}}" v-if="MembreConnecteID == Membre.acf.compte.ID"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="color-objet-fill svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg></router-link>
                    <a :href="Membre.acf.site_web" v-if="Membre.acf.site_web != null"><svg xmlns="http://www.w3.org/2000/svg" class="color-objet-fill" width="24" height="24" viewBox="0 0 24 24"><path id="link-solid" d="M15.309,8.69a7.121,7.121,0,0,1,.017,10.059l-.017.017-3.15,3.15A7.125,7.125,0,0,1,2.083,11.84L3.823,10.1a.749.749,0,0,1,1.279.5,8.638,8.638,0,0,0,.454,2.471.754.754,0,0,1-.177.779l-.613.613a3.375,3.375,0,1,0,4.742,4.8l3.15-3.15a3.374,3.374,0,0,0,0-4.773,3.511,3.511,0,0,0-.485-.4.752.752,0,0,1-.326-.591,1.867,1.867,0,0,1,.548-1.4l.987-.987a.753.753,0,0,1,.965-.081,7.148,7.148,0,0,1,.962.806Zm6.606-6.607a7.133,7.133,0,0,0-10.076,0L8.69,5.233l-.017.017a7.126,7.126,0,0,0,.979,10.865.753.753,0,0,0,.965-.081l.987-.987a1.867,1.867,0,0,0,.548-1.4.752.752,0,0,0-.326-.591,3.512,3.512,0,0,1-.485-.4,3.374,3.374,0,0,1,0-4.773l3.15-3.15a3.375,3.375,0,1,1,4.742,4.8l-.613.613a.754.754,0,0,0-.177.779A8.638,8.638,0,0,1,18.9,13.4a.749.749,0,0,0,1.279.5l1.739-1.739a7.133,7.133,0,0,0,0-10.076Z" transform="translate(0.001 0.001)"/></svg></a>   
                    <a :href="Membre.acf.instagram" v-if="Membre.acf.instagram != null"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="color-objet-fill svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></a> 
                    <a :href="Membre.acf.linkedin" v-if="Membre.acf.linkedin != null"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="color-objet-fill svg-inline--fa fa-linkedin-in fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg></a>
                    <a :href="Membre.acf.youtube" v-if="Membre.acf.youtube != null"><svg xmlns="http://www.w3.org/2000/svg" class="color-objet-fill" viewBox="0 0 45.58 32.33"><defs></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M32.38,32.33H13.2A13.2,13.2,0,0,1,0,19.13V13.2A13.2,13.2,0,0,1,13.2,0H32.38a13.2,13.2,0,0,1,13.2,13.2v5.93A13.2,13.2,0,0,1,32.38,32.33ZM18.07,9.24V22.06l12.3-6.41Z"/></g></g></svg></a>
                </div>
            </div>
            <div class="barre-nav-utilisateur-tel tel">
                <router-link :to="{name: 'ModificationUtilisateurCoInscription', params: {id : Membre.id}}"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="color-objet-fill svg-inline--fa fa-user-edit fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"></path></svg></router-link>
                <a :href="Membre.site_web" v-if="Membre.acf.site_web != null"><svg xmlns="http://www.w3.org/2000/svg" class="color-objet-fill" width="24" height="24" viewBox="0 0 24 24"><path id="link-solid" d="M15.309,8.69a7.121,7.121,0,0,1,.017,10.059l-.017.017-3.15,3.15A7.125,7.125,0,0,1,2.083,11.84L3.823,10.1a.749.749,0,0,1,1.279.5,8.638,8.638,0,0,0,.454,2.471.754.754,0,0,1-.177.779l-.613.613a3.375,3.375,0,1,0,4.742,4.8l3.15-3.15a3.374,3.374,0,0,0,0-4.773,3.511,3.511,0,0,0-.485-.4.752.752,0,0,1-.326-.591,1.867,1.867,0,0,1,.548-1.4l.987-.987a.753.753,0,0,1,.965-.081,7.148,7.148,0,0,1,.962.806Zm6.606-6.607a7.133,7.133,0,0,0-10.076,0L8.69,5.233l-.017.017a7.126,7.126,0,0,0,.979,10.865.753.753,0,0,0,.965-.081l.987-.987a1.867,1.867,0,0,0,.548-1.4.752.752,0,0,0-.326-.591,3.512,3.512,0,0,1-.485-.4,3.374,3.374,0,0,1,0-4.773l3.15-3.15a3.375,3.375,0,1,1,4.742,4.8l-.613.613a.754.754,0,0,0-.177.779A8.638,8.638,0,0,1,18.9,13.4a.749.749,0,0,0,1.279.5l1.739-1.739a7.133,7.133,0,0,0,0-10.076Z" transform="translate(0.001 0.001)"/></svg></a>   
                <a :href="Membre.instagram" v-if="Membre.acf.instagram != null"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" class="color-objet-fill svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg></a> 
                <a :href="Membre.linkedin" v-if="Membre.acf.linkedin != null"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" class="color-objet-fill svg-inline--fa fa-linkedin-in fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path></svg></a>
                <a :href="Membre.youtube" v-if="Membre.acf.youtube != null"><svg xmlns="http://www.w3.org/2000/svg" class="color-objet-fill" viewBox="0 0 45.58 32.33"><defs></defs><g id="Calque_2" data-name="Calque 2"><g id="Calque_1-2" data-name="Calque 1"><path class="cls-1" d="M32.38,32.33H13.2A13.2,13.2,0,0,1,0,19.13V13.2A13.2,13.2,0,0,1,13.2,0H32.38a13.2,13.2,0,0,1,13.2,13.2v5.93A13.2,13.2,0,0,1,32.38,32.33ZM18.07,9.24V22.06l12.3-6.41Z"/></g></g></svg></a>
            </div>

            <div class="profil-info">       
                <div class="profil-desc">

                    {{Membre}}
                    <h2 class="Nom-utilisateur">{{Membre.acf.prenom}} {{Membre.acf.nom}}</h2>
                    <br>
                    <i v-if="Membre.acf.promo[0] != null">{{Membre.acf.promo[0].post_title}}</i>
                    <br>
                    <p v-if="Membre.acf.specialite != null">{{Membre.acf.specialite[0].post_title}}</p>
                    <i v-if="Membre.acf.specialite == null || Membre.acf.specialite == 0">Aucune spécialité pour le moment (S4)</i>
                </div>
            </div>  
        </section>
        
        <nav class="tablette nav">
            <ul>
                <li><a href="compte.html#projets-realises"><h3>Projets réalisés</h3></a></li>
                <li><a href="compte.html#projets-enregistres"><h3>Liste de lecture</h3></a></li>
                <li><a href="compte.html#Acteurs"><h3>Collègue</h3></a></li>
            </ul>
        </nav>
        
        <!--<div class="scroll-snap">
            <section class="section-projet Projets-similaires" id="projets-realises">
                <div class="ligne-titre">
                    <h3>Projets réalisés</h3>
                    <hr>
                </div>
                
                <ul class="carrousel">
                    <li v-for="projet in listeProjet" :key="projet.id" class="choix">
                        <router-link :to="{name: 'Projet', params: {id : projet.id}}" >
                            <div>
                                <img :src="projet.acf.image.url" class="visuel" alt="Images projet">
                            </div>
                            <div>
                                <img :src="projet.acf.logo.url" class="logo-projet" alt="Images projet">
                                <h6>{{projet.acf.nom}}</h6>
                                <i>{{projet.acf.date_de_debut}} - {{projet.acf.date_de_fin}}</i>
                            </div>
                        </router-link>
                    </li>
                </ul>
            </section>

            <section class="section-projet Projets-similaires" id="projets-enregistres" v-if="Membre.acf.compte.ID == MembreConnecteID">
                <div class="ligne-titre">
                    <h3>Liste de lecture</h3>
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
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="projet.html">
                            <img src="css/images/Memo_1.jpg" class="visuel-projet" alt="Visuel de projet">
                            <div>
                                <img src="css/images/mmi.png" class="logo-projet" alt="Logo projet">
                                <h6>Refonte site dpt MMI</h6>
                                <i>Sept. 2021 - Janv 2022</i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="projet.html">
                            <img src="css/images/Memo_1.jpg" class="visuel-projet" alt="Visuel de projet">
                            <div>
                                <img src="css/images/mmi.png" class="logo-projet" alt="Logo projet">
                                <h6>Refonte site dpt MMI</h6>
                                <i>Sept. 2021 - Janv 2022</i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="projet.html">
                            <img src="css/images/Memo_1.jpg" class="visuel-projet" alt="Visuel de projet">
                            <div>
                                <img src="css/images/mmi.png" class="logo-projet" alt="Logo projet">
                                <h6>Refonte site dpt MMI</h6>
                                <i>Sept. 2021 - Janv 2022</i>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="projet.html">
                            <img src="css/images/Memo_1.jpg" class="visuel-projet" alt="Visuel de projet">
                            <div>
                                <img src="css/images/mmi.png" class="logo-projet" alt="Logo projet">
                                <h6>Refonte site dpt MMI</h6>
                                <i>Sept. 2021 - Janv 2022</i>
                            </div>
                        </a>
                    </li>
                </ul>
            </section>

            <section class="section-projet" id="Acteurs">
                <div class="ligne-titre">
                    <h3>Partenaires</h3>
                    <hr>
                </div>
                <ul class="carrousel">
                    <li>
                        <a href="compte.html">
                            <img src="css/images/avatar-nathan.png" class="avatar" alt="Images projet">
                            <div class="text-center">
                                <h4>Nathan Baumann</h4>
                                <p><i>Responsable Communication</i></p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="compte.html">
                            <img src="css/images/avatar-raph.png" class="avatar" alt="Images projet">
                            <div class="text-center">
                                <h4>Raphaël BONIN</h4>
                                <p><i>Chef de projet</i></p>
                                <p><i>Responsable développement</i></p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="compte.html">
                            <img src="css/images/avatar-benoit.png" class="avatar" alt="Images projet">
                            <div class="text-center">
                                <h4>Benoît CLAUDE</h4>
                                <p><i>Responsable design</i></p>
                            </div>
                        </a>
                    </li>
                </ul>
            </section>
        </div>-->
    </div>

</template>

<script>
import param from '@/param/param'
import appService from '@/services/appService'


export default {
    name: 'Compte',
    data () {
        return {
            Membre: {
                acf:{
                    nom: null,
                    prenom: null,
                    pseudo: null,
                    date_de_naissance: null,
                    mail: null,
                    site_web: null,
                    instagram: null,
                    linkedin: null,
                    youtube: null,
                    specialite: null,
                    promo: {},
                    compte: {},
                    banniere: null,
                    logo: null,
                    role: null
                }
            },
            listeProjets:[],
            banniereData : param.imageDefautBanniere,

        }
    },

    created(){
        let utilisateurLocal = appService.getLocal();
        this.imageDefautUser = param.imageDefautUser;
        this.imageDefautBanniere = param.imageDefautBanniere;
        this.banniereData = param.imageDefautBanniere;

        

        if(utilisateurLocal != null){
            this.utilisateur = utilisateurLocal;
            this.MembreConnecte = this.utilisateur.nom;
            this.MembreConnecteAvatar = param.imageDefautUser;
            this.MembreConnecteRole = this.utilisateur.role;
            this.MembreConnecteID = this.utilisateur.id;
        }

        this.Membre.id = this.$route.params.id;
        axios.get(param.hostacf+"utilisateur/" + this.Membre.id)
        .then(response=>{
            this.Membre = response.data;
        })
        .catch(error => console.log(error))

        axios.get(param.hostacf+"projet/")
        .then(response=>{
            this.listeProjets = response.data;
        })
        .catch(error => console.log(error))

        axios.get(param.hostacf+"role_projet/")
            .then(response=>{
                this.listeRoleProjet = response.data;
            })
            .catch(error => console.log(error))
    }, 

    methods:{
        previewBanniere: function(event) {
            // Mise à jour de la photo du participant
            this.banniere = this.$refs.file.files[0];
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
                    this.banniereData = e.target.result;
                }
                // Demarrage du reader pour la transformer en data URL (format base 64)
                reader.readAsDataURL(input.files[0]);        
            }
        },

        BanniereUpload: function(){
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
                const formDataBanniere = new FormData();
                let bannierefile = document.querySelector('#banniere');
                formDataBanniere.append('file', this.banniere);
                formDataBanniere.append("title", this.MembreConnecteID+"Banniere");
                formDataBanniere.append("status", 'publish');

                axios({
                    method: 'post', 
                    url : param.hostacf+'media', 
                    data: formDataBanniere,
                    headers:headers
                })
                .then(function (response){
                    console.log('retour upload image', response);

                    let idBanniere = response.data.id;
                    console.log('idImage', idBanniere);
                    let urlBanniere = response.data.source_url;
                    console.log('url Image', urlBanniere);

                    if(idAvatar != undefined){
                        axios({
                            method: 'post',
                            data:{
                                title : this.MembreConnecte,
                                status : "publish",
                                fields : {
                                    banniere: idBanniere,
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

            })
        },
    }
}
</script>

<style scoped>

</style>

