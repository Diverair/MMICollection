// Importation des objets
import Vue from 'vue'
import Router from 'vue-router'


// Import des composants
import Accueil            from '@/components/Accueil'
import Projets            from '@/components/Projets'
import Projet             from '@/components/Projet'
import Compte             from '@/components/Compte'
import Vote               from '@/components/Vote'



import MentionsLegales    from '@/components/Mentions-legales'
import Contact            from '@/components/Contact'
import ManuelAjoutProjet    from '@/components/ManuelAjoutProjet'



import Inscription        from '@/components/Inscription'
import ModificationUtilisateurCoInscription        from '@/components/ModificationUtilisateurCo'



import VisuelProjet       from '@/components/VisuelProjet'

// On précise l'utilisation du routage
Vue.use(Router)


// Définition des routes
export default new Router({
  routes: [
    {path: '/',                           name: 'Accueil',                                          component: Accueil},
    {path: '/projets/:id',                name: 'Projets',                                          component: Projets},
    {path: '/projet/:id',                 name: 'Projet',                                           component: Projet},
    {path: '/compte/:id',                 name: 'Compte',                                           component: Compte},
    {path: '/vote',                       name: 'Vote',                                             component: Vote},




    {path: '/mentionslegales',            name: 'MentionsLegales',                                  component: MentionsLegales},
    {path: '/contact',                    name: 'Contact',                                          component: Contact},
    {path: '/manuelajoutprojet',          name: 'ManuelAjoutProjet',                                component: ManuelAjoutProjet},


    {path: '/inscription',                name: 'Inscription',                                      component: Inscription},
    {path: '/modificationutilisateurco/:id',  name: 'ModificationUtilisateurCoInscription',         component: ModificationUtilisateurCoInscription},


    {path: '/visuelprojet',               name: 'Visuelprojet',                                     component: VisuelProjet},


  ]
})


