<template>
    <div class="app fond">
        <div>
            <div class="haut-page accueil ordi tablette">
                <h1>MMI COLLECTION</h1>
            </div>

            <section class="presentation">
                <img src="https://cdn.pixabay.com/photo/2017/10/10/21/49/youtuber-2838945_960_720.jpg" alt="Programmation sur écran de portable">
                <div class="presentation-text">
                    <h2>MMI Collection</h2>
                    <p>Vous trouverez l’intégralité des projets entrepris par nos étudiants, de 1997 à aujourd'hui. Revivez l’évolution du numérique !</p>
                </div>
            </section>

            <hr>

            <div class="corps-page">
                <h2>Les catégories de projets</h2>

                <section class="contenu contenu-accueil">
                        <section class="choix">
                        <router-link :to="{name: 'Projets', params: {id : '0'}}">
                                <div>
                                <img src="../../static/css/images/Dptmmi.png" class="visuel" alt="Images projet">
                                </div>
                                <div>
                                    <h6>Tous les projets</h6>
                                    <p></p>
                                </div>
                                <p>Venez découvrir les projets !</p>
                            </router-link>
                            <router-link v-for="categorie in listeOrderByName" :to="{name: 'Projets', params: {id : categorie.id}}" :key="categorie.id">
                                <div>
                                <img :src="categorie.image" class="visuel" alt="Images projet">
                                </div>
                                <div>
                                    <h6>{{categorie.nom}}</h6>
                                    <p>{{categorie.description_fr}}</p>
                                </div>
                                <p>Venez découvrir les projets !</p>
                            </router-link>
                        </section>
                    </section>


            </div>
        </div>
    </div>
</template>

<script>
import param from '@/param/param'

export default {
  name: 'Accueil',
  data () {
    return {
      listeDomaines: []
    }
  },

  created(){
    axios.get(param.host+"domaine/v1/listeDomaines")
    .then(response=>{
      this.listeDomaines = response.data;
    })
    .catch(error => console.log(error))
  },

  computed:{
     listeOrderByName: function(){
      function compare(a, b) {
        if (a.nom < b.nom) return -1;
        if (a.nom > b.nom) return 1;
      }
      return this.listeDomaines.sort(compare)
    },
  },
}
</script>

<style scoped>

</style>

