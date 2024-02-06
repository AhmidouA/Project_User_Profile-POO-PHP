<?php

class Admin {

    private $bddPDO;

    /* CONSTUCT */
    function __construct(PDO $db){ // paramètre un objet PDO
        $this->bddPDO = $db; // Constructeur qui nous permet de nous connecter ala db
    }



    /* METHODE */
    function insert(Users $user) {
        $request = $this->bddPDO->prepare('INSERT INTO users(lastName, firstName, email, phone) 
            value (:lastName, :firstName, :email, :phone)');

    }
}


?>