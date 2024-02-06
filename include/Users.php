<?php

class Users {
   private $errors=[];  // Tableau pour stocker les erreurs
   private $id; 
   private $lastName; 
   private $firstName; 
   private $email; 
   private $phone; 

   /* GESTION ERRROS */
   const LASTNAME_INVALID = 1;  // Code d'erreur pour un LASTNAME_INVALID
   const FIRSTNAME_INVALID = 2;  // Code d'erreur pour un  FIRSTNAME_INVALID
   const EMAIL_INVALID = 3;  // Code d'erreur pour une adresse EMAIL_INVALID

   /* CONSTUCT */
   function __construct($data = []){
    if (!empty($data)) {
        $this->hydrate($data);  // Appelle la méthode hydrate si des données sont fournies lors de l'instanciation
    }
        
   }


   /* GETTERS */
   function getId(){
    return $this->id;
    
   }
   function getLastName(){
    return $this->lastName;
   }
   function getFirstName(){
    return $this->firstName;

   }
   function getEmail(){
    return $this->email;

   }
   function getPhone(){
    return $this->phone;

   }
   function getErrors(){
    return $this->errors;

   }

   /* SETTERS */
   function setId($userId){
        if (!empty($userId)) {
            $this->id = (int) $userId; 
        }   
   }

   function setLastName($userLastname){
        if (!is_string($userLastname) || empty($userLastname) ) {
            $this->errors[] = self::FIRSTNAME_INVALID;

        } else {
            $this->lastName = $userLastname;
        }
   }

   function setFirstName($userFirstName){
        if (!is_string($userFirstName) || empty($userFirstName) ) {
            $this->errors[] = self::LASTNAME_INVALID;

        } else {
            $this->firstName = $userFirstName;
        }

   }
   function setEmail($userEmail){
        if(filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            $this->email = $userEmail;
        } else {
            $this->errors[] = self::EMAIL_INVALID;
        }     
   }

   function setPhone($userPhone){
        $this->phone = $userPhone;
   }



   /* METHODES */
   function hydrate($data = []){
        foreach ($data as $key => $value) {
            $setterMethode = 'set'.ucfirst($key); // Génère le nom du setter à appeler
            $this->$setterMethode($value); // Appelle la méthode hydrate si des données sont fournies lors de l'instanciation
        }
   }

   function isUserValide() {
        return !(empty($this->lastName) || empty($this->firstName) || empty($this->phone));
   }

}

?>