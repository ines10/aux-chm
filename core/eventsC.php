<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/27/18
 * Time: 12:21
 */
include '/Users/macbook/Desktop/untitled1/entities/events.php';
include 'userC.php';
class eventsC{
    public function ajouter( event $ev){
        session_start();
        $db = config::getConnexion();
        $sql = "INSERT INTO event ( eventname,date, duration, starttime,endtime,category) VALUES ( :eventname , :date , :duration , :starttime,:endtime,:category)  ";
        $q = $db->prepare($sql);
        $q->bindValue(':eventname',$ev->getEventname());
        $q->bindValue(':date',$ev->getDate());
        $q->bindValue(':duration',$ev->getDuration());
        $q->bindValue(':starttime',$ev->getStarttime());
        $q->bindValue(':endtime',$ev->getEndtime());
        $q->bindValue(':category',$ev->getCategory());
        $q->execute();
        return $q;
    }

    public function afficher(){
        $db = config::getConnexion();
        $sql = "SELECT * from event  WHERE date >  NOW() ";
        $liste = $db->query($sql);
        $liste->execute();
        return $liste;
    }
    public function affichagetirdecroisant() {
        $db= config::getConnexion() ;
        $sql = "select * from event ORDER BY date DESC " ;
        $liste = $db->query($sql) ;
        $liste->execute();
        return $liste ;
    }
    public function affichagetirecroissant() {
        $db= config::getConnexion() ;
        $sql = "select * from event ORDER BY date ASC " ;
        $liste = $db->query($sql) ;
        $liste->execute();
        return $liste ;
    }
    public function affiche($id_event){
        $db = config::getConnexion();
        $sql = "select * from event WHERE id_event=:id_event" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(":id_event" , $id_event) ;
        $q->execute() ;
        return $q->fetch(PDO::FETCH_OBJ) ;
    }
    //affichage des evenements du jour
    public function display(){
        $db = config::getConnexion();
        $sql ="SELECT * FROM event WHERE date = CURDATE() AND  category = 'public' ";
        $liste = $db->query($sql);
        $count =$liste->rowCount();
        $liste->execute();
        return $liste;
    }
    public function supprrimer($id_event) {
        $db = config::getConnexion() ;
        $sql = "delete from event WHERE id_event=:id_event" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(":id_event" , $id_event) ;
        $q->execute()  ;
        return $q ;
    }
    public function update($id_event , $ev) {
        $db = config::getConnexion() ;
        $sql = "update  event SET eventname =:eventname WHERE id_event=:id_event" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(":eventname" , $ev->getEventname()) ;
        $q->bindValue(":id_event" , $id_event) ;
        $q->execute()  ;
        return $q ;
    }
    public function modifier(event $e ,$id_event){
        $db = config::getConnexion() ;
        $sql = "update event set  eventname=:eventname,date=:date,duration=:duration,starttime=:starttime,endtime=:endtime,category=:category WHERE id_event =:id_event" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(':eventname', $e->getEventname());
        $q->bindValue(':date', $e->getDate());
        $q->bindValue(':duration', $e->getDuration());
        $q->bindValue(':starttime', $e->getStarttime());
        $q->bindValue(':endtime', $e->getEndtime());
        $q->bindValue(':category', $e->getCategory());
        $q->bindValue(':id_event', $id_event);
        $q->execute() ;

    }
    public function updateEvent(){

        $db = config::getConnexion();
        $reqverif = $db->prepare("SELECT * from event WHERE eventname = 'annif/date_m' AND date = NOW() AND  duration = 1 AND starttime = 09 AND endtime = 18 AND category = 'private'");
        $reqverif->execute();
        $r = $reqverif->rowCount();
             if ($r != 0) {
                 $reqEvent = $db->prepare("INSERT INTO event SET eventname = 'annif/date_m', date = NOW(), duration = 1, starttime = 09 ,endtime = 18,category = 'private'");
                 $reqEvent->execute();
             }
    }
}
