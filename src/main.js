// Importation des objets
import Vue from 'vue'
// Import du composant APP.vue
import App from './App'
// Import du composant de routage
import router from './router'

// Précision de l'envirronement de developpement 
Vue.config.productionTip = true

// Composant principal de l'application
new Vue({
  el: '#app', // Portée sur l'id app
  router,		// Utilise le router
  components: { App }, // Utilse le composant App.vue
  template: '<App/>' // Utilise le template App
})


