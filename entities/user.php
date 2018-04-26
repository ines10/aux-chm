<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/1/18
 * Time: 12:55
 */
class user{
        private $id;
        private $nom;
        private $email;
        private $password;
        private $confirmation_token;
        private $gender;
        private $adresse;
        private $favoris;
        private $telephone;
        private $confirmed_at;
        private $role_id;
        private $reset_token;
        private $remember_token;
        private $photo;

    public function getPhoto(){
        return $this->photo;
    }

    public function setPhoto($photo){
        $this->photo = $photo;
    }
    public function getId() {
      return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getNom(){
        return $this->nom;
    }

    public function getGender(){
        return $this->gender;
    }
    public function setGender($gender){
        $this->gender = $gender;
    }
    public function getAdresse(){
        return $this->adresse;
    }
    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }
    public function getFavoris(){
        return $this->favoris;
    }
    public function setFavoris($favoris){
        $this->favoris = $favoris;
    }
    public function setNom($nom){
         $this->nom = $nom;
    }
    public function getEmail(){
         return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function getConfirmationToken(){
        return $this->confirmation_token;
    }
    public function setConfirmationToken($confirmation_token){
        $this->confirmation_token = $confirmation_token;
    }

    public function getTelephone(){
        return $this->telephone;
    }
    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }

 public function __construct( $nom , $email ,$gender,$adresse,$favoris,$telephone, $password ,$photo ){
     $this->setNom($nom);
     $this->setEmail($email);
     $this->setGender($gender);
     $this->setAdresse($adresse);
     $this->setFavoris($favoris);
     $this->setTelephone($telephone);
     $this->setPassword($password);
     $this->setPhoto($photo);

 }


}