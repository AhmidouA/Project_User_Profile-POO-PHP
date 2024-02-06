<?php

class Users {
   private $errors=[]; 
   private $id; 
   private $lastName; 
   private $firstName; 
   private $email; 
   private $phone; 

   /* GESTION ERRROS */
   const LASTNAME_INVALID = 1;
   const FIRSTNAME_INVALID = 2;
   const EMAIL_INVALID = 3;

   /* CONSTUCT */
   function __construct($data = []){

   }


   /* GETTERS */
   function getId(){
    
   }
   function getLastName(){

   }
   function getFirstName(){

   }
   function getEmail(){

   }
   function getPhone(){

   }
   function getErrors(){

   }

   /* SETTERS */
   function setId($userId){
    
   }
   function setLastName($userLastname){

   }
   function setFirstName($userFirstName){

   }
   function setEmail($userEmail){

   }
   function setPhone($userPhone){

   }



   /* METHODES */
   function hydrate($data = []){

   }
   function usUserValide() {
    
   }

}

?>