<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/19/18
 * Time: 16:43
 */
class carte_fidelite{
    private $anniversaire;
    private $situation_a;
    private $nbre_enfants;
    private $date_m;
    public function getDateM(){
        return $this->date_m;
    }
    public function setDateM($date_m){
        $this->date_m = $date_m;
    }
    public function getAnniversaire(){
        return $this->anniversaire;
    }
    public function setAnniversaire($anniversaire){
        $this->anniversaire = $anniversaire;
    }
    public function getSituationA(){
        return $this->situation_a;
    }
    public function setSituationA($situation_a){
        $this->situation_a = $situation_a;
    }
    public function getNbreEnfants(){
        return $this->nbre_enfants;
    }
    public function setNbreEnfants($nbre_enfants){
        $this->nbre_enfants = $nbre_enfants;
    }
    public function __construct( $anniversaire, $situation_a, $nbre_enfants,$date_m ) {
        $this->setAnniversaire($anniversaire);
        $this->setSituationA($situation_a);
        $this->setNbreEnfants($nbre_enfants);
        $this->setDateM($date_m);
    }


}