<?php
/** 
    * Routes spéciffiques front-end 
    * Ajout après inisialisation de l'API Rest => rest_ap_init
*/


add_action('rest_api_init', function(){
	// Function 
	function cmpNom($a, $b){
		return strcmp($a['nom'], $b['nom']);
	}


    //Nouvelle route: demo => http://backmmicollection.raphaelbonin.fr/wp-json/domaine/v1/listeDomaines
    //domaine/v1 espace de nom de la route
    //demo: endpoint/route
    register_rest_route('domaine/v1', '/listeDomaines', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'domaine'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$data[$i]['description'] = $acf['description'];
				$data[$i]['image'] = $acf['image'];
				$i++;
			}
			usort($data, "cmpNom");
			return $data;
        }
    ]);

	register_rest_route('role/v2', '/listeRoles', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'role'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$data[$i]['description'] = $acf['description'];
				$data[$i]['image'] = $acf['image'];
				$i++;
			}
			return $data;
        }
    ]);

	register_rest_route('specialite/v3', '/listeSpecialites', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'specialite'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$data[$i]['description'] = $acf['description'];
				$data[$i]['image'] = $acf['image'];
				$i++;
			}
			return $data;
        }
    ]);

	register_rest_route('promo/v4', '/listePromos', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'promo'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$data[$i]['date_de_debut'] = $acf['date_de_debut'];
				$data[$i]['date_de_fin'] = $acf['date_de_fin'];
				$i++;
			}
			return $data;
        }
    ]);

	register_rest_route('tag/v5', '/listeTags', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'tag'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$i++;
			}
			return $data;
        }
    ]);

	register_rest_route('typeprojet/v6', '/listeTypesProjet', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'typeprojet'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$data[$i]['description'] = $acf['description'];
				$data[$i]['logo'] = $acf['logo'];
				$i++;
			}
			return $data;
        }
    ]);

	register_rest_route('type_utilisateur/v7', '/listeTypesUtilisateur', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'type_utilisateur'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$data[$i]['description'] = $acf['description'];
				$data[$i]['logo'] = $acf['logo'];
				$i++;
			}
			return $data;
        }
    ]);

	register_rest_route('type_vote/v8', '/listeTypesVote', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'type_vote'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$data[$i]['description'] = $acf['description'];
				$data[$i]['logo'] = $acf['logo'];
				$i++;
			}
			usort($data, "cmpNom");
			return $data;
        }
    ]);

	register_rest_route('projet/v9', '/listeProjets', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'projet'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['nom'] = $acf['nom'];
				$data[$i]['date_de_debut'] = $acf['date_de_debut'];
				$data[$i]['date_de_fin'] = $acf['date_de_fin'];
				$data[$i]['description_fr'] = $acf['description_fr'];
				$data[$i]['description_en'] = $acf['description_en'];
				$data[$i]['url'] = $acf['url'];
				$data[$i]['logo'] = $acf['logo'];
				$data[$i]['image'] = $acf['image'];



				$domaines = [];
				$j = 0;
				if(is_array($acf['domaine'])){
					foreach($acf['domaine'] as $domaine){
						$domaines[$j]['id'] = $domaine->ID;
						$j++;
					}
				}
				$data[$i]['domaine'] = $domaines;

                $equipes = [];
                $k = 0;
                if(is_array($acf['equipe'])){
                    foreach($acf['equipe'] as $equipe){
                        $equipes[$k]['id'] = $equipe->ID;
                        $k++;
                    }
                }
                $data[$i]['equipe'] = $equipes;

                $recompenses = [];
				$l = 0;
				if(is_array($acf['recompense'])){
					foreach($acf['recompense'] as $prix){
						$recompenses[$l]['id'] = $prix->ID;
						$l++;
					}
				}
				$data[$i]['recompense'] = $recompenses;
				

				$types = [];
				$m = 0;
				if(is_array($acf['type'])){
					foreach($acf['type'] as $type){
						$types[$m]['id'] = $type->ID;
						$m++;
					}
				}
				$data[$i]['type'] = $types;

				$tags = [];
				$n = 0;
				if(is_array($acf['tag'])){
					foreach($acf['tag'] as $tag){
						$tags[$n]['id'] = $tag->ID;
						$n++;
					}
				}
				$data[$i]['tag'] = $tags;


                $appreciations = [];
				$o = 0;
				if(is_array($acf['appreciation'])){
					foreach($acf['appreciation'] as $appreciation){
						$appreciations[$o]['id'] = $appreciation->ID;
						$o++;
					}
				}

				$data[$i]['appreciation'] = $appreciations;
				$i++;        	
			}	
			return $data;
		}
    ]);

	register_rest_route('appreciation/v10', '/listeAppreciations', [
        'methods' => 'GET', // Methode d'interrogation
        'callback' => function(){ // retout des résultats
            $args = [
				'numberposts' => 999999,
				'post_type' => 'appreciation'
			];

			$posts = get_posts($args);
			$data = [];

			$i = 0;

			foreach ($posts as $post){
				$data[$i]['id'] = $post -> ID;
				$acf = get_fields($post -> ID);
				$data[$i]['professeur'] = $acf['professeur'];
				$data[$i]['date'] = $acf['date'];
				$data[$i]['appreciation'] = $acf['appreciation'];
				$data[$i]['projet'] = $acf['projet'];
				$i++;
			}
			return $data;
        }
    ]);

    /************************* Authentification ******************************/
    // Complète les informations de base raménées lors d'une authentification
    // Par user/mot de passe
    // 2: paramètres: Sdata, les données déjà existantes de l'utilisateur
    // $user : L'utilisateur
    function jwt_auth_function ($data, $user){
        // Rôles de l'utilisateur
        $data['user_role'] = $user-> roles;
        // id de l'utilisateur
        $data['user_id'] = $user->ID;
        // avatar de l'utilisateur
        $data['avatar'] = get_avatar_url($user->ID);
        return $data;
    }
    add_filter( 'jwt_auth_token_before_dispatch', 'jwt_auth_function', 10, 2 );

	// Role d'u membre sur un projet
	function getMembre($idUser){
		$args = [
			'numberpost' => 999999,
			'post_type' => 'utilisateur'
		];

		$posts = get_posts($args);
		$data = [];
		$z = 0;
		foreach($posts as $post){
			$data[$z]['id'] = $post->ID;
			$acf = get_fields($post ->ID);

			if($acf['compte']['ID'] == $idUser){
				$utilisateur = get_post($acf['utilisateur'][0]->ID);
				$acfUtilisateur = get_fields ($acf['utilisateur'][0]->ID);
				$data[$z]['utilisateur'] = $acfUtilisateur;
				$data[$z]['utilisateur']['id'] = $acf['utilisateur'][0]->ID; 
				$z++;
			}
		}
	}

	function checkLoggedInUser(){
		$currentuserid_fromjwt = get_current_user_id();
		$data = get_userdata($currentuserid_fromjwt);
		$data->acces = getAcces($data->roles);
		$data->membre = getMembre($data->ID);

		return $data;
	}
});