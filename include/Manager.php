<?php

class Manager {

    private $bddPDO;

    /* CONSTUCT */
    function __construct(PDO $db){ // paramètre un objet PDO
        $this->bddPDO = $db; // Constructeur qui nous permet de nous connecter à la db
    }



    /* METHODE */
    function insert(Users $user) {
        $request = $this->bddPDO->prepare('INSERT INTO users(lastName, firstName, email, phone) 
            value (:lastName, :firstName, :email, :phone)');

        $request->bindValue(':lastName', $user->getLastName());
        $request->bindValue(':firstName', $user->getFirstName());
        $request->bindValue(':email', $user->getEmail());
        $request->bindValue(':phone', $user->getPhone());

        $request->execute();
        $request->closeCursor();

    }

    function getUsers() {
        // Préparation de la requête SQL pour récupérer tous les utilisateurs de la base de données
        $request = $this->bddPDO->query('SELECT * FROM users_db.users ORDER BY lastName ASC');
    
        // Définition du mode de récupération des résultats de la requête :
        // - PDO::FETCH_CLASS : Récupérer les résultats sous forme d'objets d'une classe spécifiée
        // - PDO::FETCH_PROPS_LATE : Remplir les propriétés de l'objet après avoir appelé son constructeur
        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');
    
        // Exécution de la requête et récupération de tous les utilisateurs sous forme d'un tableau d'objets Users
        $allUsers = $request->fetchAll();
       
        // Utilisation de var_dump() pour afficher le contenu du tableau $allUsers
        // var_dump($allUsers);
    
        // Fermeture du curseur de la requête pour libérer les ressources
        $request->closeCursor();
    
        // Retourner tous les utilisateurs récupérés de la base de données
        return $allUsers;
    }

    function getUser($userId) {
        $request = $this->bddPDO->prepare('SELECT * FROM users WHERE id =:id');

        $request->bindValue(':id', (int)$userId, PDO::PARAM_INT);
        $request->execute();

        // Définition du mode de récupération des résultats de la requête :
        // - PDO::FETCH_CLASS : Récupérer les résultats sous forme d'objets d'une classe spécifiée
        // - PDO::FETCH_PROPS_LATE : Remplir les propriétés de l'objet après avoir appelé son constructeur
        $request->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Users');

        $user = $request->fetch();
        $request->closeCursor();
        return $user;

    }

    function updateUser(Users $user) {
        $request = $this->bddPDO->prepare('UPDATE users 
            SET lastName=:lastName, firstName=:firstName, email=:email, phone=:phone
            WHERE id=:id');

            $request->bindValue(':id', $user->getId(), PDO::PARAM_INT);
            $request->bindValue(':lastName', $user->getLastName());
            $request->bindValue(':firstName', $user->getFirstName());
            $request->bindValue(':email', $user->getEmail());
            $request->bindValue(':phone', $user->getPhone());

            $request->execute();
            $request->closeCursor();
            

    }
    
}


?>
