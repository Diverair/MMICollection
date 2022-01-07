
export default{
    // Serveur fournisseur de données - back-end
    host : 'https://backmmicollection.raphaelbonin.fr/wp-json/',

    hostacf : 'https://backmmicollection.raphaelbonin.fr/wp-json/wp/v2/',


    auth: 'https://backmmicollection.raphaelbonin.fr/wp-json/jwt-auth/v1/',

    admin: 'https://backmmicollection.raphaelbonin.fr/wp-admin/',

    titre: 'MMI Collection',



    MembreConnecte: null,


    // Messages
    message:{
        errCnx: "Le mot de passe ou l'identifiant ne sont pas recconus",
        errCreaCompte: "La création de votre compte a échoué",
        errCreaImage: "L'upload de l'image à échoué",
        wait: "Veuillez patienter, processus en cours...",
        envoiMail : "Mail bien envoyé",
        echecEnvoiMail : "Le mail n'a pas pu être délivré, veuillez rééssayer"
    },

    imageDefautUser : 'https://backmmicollection.raphaelbonin.fr/wp-content/uploads/2021/12/imageDefautUser.jpg',
    
    imageDefautBanniere : 'https://backmmicollection.raphaelbonin.fr/wp-content/uploads/2021/12/DptMMi.png',


    //Domaine pour filtrage
    TypeDomaineAllemand : 28925,
    TypeDomaineAnglais : 28927,
    TypeDomaineCEEO : 28929,
    TypeDomaineCSTI : 28931,
    TypeDomaineDevWeb : 28933,
    TypeDomaineEEA : 28939,
    TypeDomaineEJMN : 28935,
    TypeDomaineEMN : 28943,
    TypeDomaineEspagnol : 28937,
    TypeDomaineGestionProjet : 28944,
    TypeDomaineInfographie : 28951,
    TypeDomaineProdAudio: 28953,
    TypeDomaineProgObjetEven : 28947,
    TypeDomainePPP : 28946,
    TypeDomaineServiceReseaux : 28949,
    TypeDomaineTIC : 28942,
    
    
}