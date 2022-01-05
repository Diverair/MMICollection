<template>
    <div class="app fond">
        <div class="profil tutoprojet">
            <h2>Tutoriel de création d'un projet</h2>
            <p>Commencez par vous diriger vers la page pour créer votre projet en cliquant sur <i><a href="https://backmmicollection.raphaelbonin.fr/wp-admin/post-new.php?post_type=role_projet" class="pink">ce lien</a></i> ou en utilisant le lien disponible dans le menu.</p>
            <img src="../../static/css/images/Menu.jpg" alt="Lien pour ajouter projet Menu">
            <p>Connectez vous avec les identifiants que vous utilisez pour MMI Collection</p>
            <img src="../../static/css/images/ConnexionWP.jpg" alt="Connexion WordPress">
            <p>Vous arrivez ensuite sur la page <i><a href="https://backmmicollection.raphaelbonin.fr/wp-admin/post-new.php?post_type=role_projet" class="pink">rôle sur le projet</a></i>.</p>
            <p>Il vous suffira d'appuyer sur <span class="blue">Ajouter</span> en haut à gauche</p>
            <img src="../../static/css/images/PageRoleProjet.jpg" alt="Page de tout les membres d'un projet et du rôle de chacun">
            <p>Ajouter les différentes informations demandées.</p>
            <p>Pour s'y retrouver plus facilement lors de la recherche. Merci de bien vouloir respecter les nomamges.</p>
            <p>Exemple de nommage, pour mon cas, j'ai les <span class="">rôles</span> le chef de projet et le responsable développement du <span class="pink">projet</span> MMI Collection, mon <span class="blue">pseudo</span> sur ce site est Raph. <br> Il faut donc que chacun des membres du projet soit préalablement inscrit sur le site.</p>
            <p></p>
            <ul>
                <li><i>- Titre de la page <b class="orange">(1)</b></i> - <span class="blue">Raph </span> <span class="pink">MMI Collection</span></li>
                <li><i>- LE <span class="blue">membre</span> <b class="orange">(2)</b></i> - <span class="blue">Raph </span></li>
                <li><i>- Le ou les <span class="color-red">rôle(s)</span> <b class="orange">(3)</b></i> <span class="color-red">Chef de projet</span> et <span class="color-red">Responsable développement</span></li>
                <li><i>- LE <span class="pink">projet</span> <b class="orange">(4)</b></i> - <span class="pink">MMI Collection </span></li>
            </ul>
            <p>Il vous suffit ensuite d'appuyer sur le bouton <span class="blue">Publier</span><i><b class="orange"> (5)</b></i> qui se trouve en haut à droite.</p>
            <p><b class="color-red">IMPORTANT :</b> Il faut bien mettre qu'un seul membre et projet par publication. Il faut donc en faire une pour chaque membre et pour chaque projet.</p>
            <img src="../../static/css/images/AjoutRoleProjet.jpg" alt="Remplir les différentes information pour la publication Role sur le projet">
            <p>Après l'avoir fait pour chacun des membres, vous allez maintenant créer la publication pour votre projet avec ce <i><a href="https://backmmicollection.raphaelbonin.fr/wp-admin/post-new.php?post_type=projet" class="pink">lien</a></i> ou en allant dans la barre des menus à gauche dans WordPress et en cliquant sur Projets puis sur <span class="blue">Ajouter</span> en haut à gauche.</p>
            <img src="../../static/css/images/PageProjet.jpg" alt="Lien pour aller sur la page des projets enregistrés">
            <img src="../../static/css/images/AjoutProjet.jpg" alt="Lien pour aller sur l'ajout d'un projet">
            <p>Il vous reste plus qu'à rentrer les différents champs nécessaires pour créer votre projet et le mettre en ligne en utilsiant le bouton <span class="blue">Publier</span>.</p>
            <img src="../../static/css/images/Projet1.jpg" alt="remplir les différents champs acf du projet">
            <img src="../../static/css/images/Projet2.png" alt="remplir les différents champs acf du projet">
            <img src="../../static/css/images/Projet3.png" alt="remplir les différents champs acf du projet">
            <p>Félicitation, vous venez de mettre en ligne votre projet. n'hésitez pas à aller voir s'il vous le retrouves bien sur la page de tout les <i><router-link class="pink" to="/projets">Projets</router-link></i>.</p>
        </div>
    
    
    </div>
</template> 

<script>
    import param from '@/param/param'

    export default {
        name: 'ManuelAjoutProjet',
        data () {
            return {}
        },
    }
</script>

<style scoped>

</style>

