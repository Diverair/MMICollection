<template>
   <div class="app fond">
        <div id="visuels-projet-grand">
            <img src="../../static/css/images/MMICollection.png" alt="Le visuel du projet en grand">

            <ul class="carrousel">
                <li><img src="../../static/css/images/MMICollection.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/projets.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/Profil.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/projet.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/Contact.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/MMICollection-clair.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/projets-clair.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/Contact-clair.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/Profil-clair.png" alt="Le visuel du projet en petit"></li>

                <li><img src="../../static/css/images/projet-clair.png" alt="Le visuel du projet en petit"></li>
            </ul>
        </div>
    </div>
</template>

<script>
import param from '@/param/param'

export default {
  name: 'VisuelProjet',
  data () {
    return {
        projet:{},
        listeProjets:{},
        ceprojet:{}
    }
  },

  created(){
    this.projet.id = this.$route.params.id;
    console.log('id projet', this.projet.id)
    axios.get(param.host+"projet/v9/listeProjets")
    .then(response=>{
      console.log('response', response);
      this.listeProjets = response.data;
      this.ceprojet = this.listeProjets.id[this.projet.id];
      console.log('liste', this.ceprojet);
    })
    .catch(error => console.log(error))
  }
}
</script>

<style scoped>

</style>

