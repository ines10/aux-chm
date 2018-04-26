<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/20/18
 * Time: 11:15
 */
include '/Users/macbook/Desktop/untitled1/entities/fidelite.php';
//include '/Users/macbook/Desktop/untitled1/config.php';
include 'eventsC.php';
class fidelitec{
    public function ajouter( carte_fidelite $e){
        session_start();
        $db = config::getConnexion();
        $sql = "SELECT * from carte_fidelite WHERE id = $_SESSION[id]";
        $list = $db->prepare($sql);
        $list->execute();
        $nbre = $list->rowCount();
        if( $nbre == 0){
            $sql = "INSERT INTO carte_fidelite ( id,anniversaire, situation_a, nbre_enfants,date_m) VALUES ( :id ,:anniversaire, :situation_a, :nbre_enfants,:date_m)  ";
            $q = $db->prepare($sql);
            $q->bindValue(':id',$_SESSION['id']);
            $q->bindValue(':anniversaire',$e->getAnniversaire());
            $q->bindValue(':situation_a',$e->getSituationA());
            $q->bindValue(':nbre_enfants',$e->getNbreEnfants());
            $q->bindValue(':date_m',$e->getDateM());
            $q->execute();
            return $q;
        }else{
            $error = "vous avez deja une carte de fidilite ";?>
            <div class="alert-success">
                <h1>  <script>alert(<?php echo $error; ?>)</script></h1>
            </div>

            <?php
            header( "refresh:5; url=myAccount.php?id= ".$_SESSION['id'] );

        }
    }
    public function afficher(){
        $db = config::getConnexion();
        $sql = "SELECT * from carte_fidelite";
        $list = $db->query($sql);
        return $list;
    }
    public function afficheC($id){
        $db = config::getConnexion();
        $sql = "select * from users.carte_fidelite WHERE id=:id" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(":id" , $id) ;
        $q->execute() ;
        return $q->fetch(PDO::FETCH_OBJ) ;
    }
    public function verif($id){
        $db = config::getConnexion();
        $sql = "SELECT * from carte_fidelite WHERE id = $id";
        $list = $db->prepare($sql);
        $nbre = $list->rowCount();
        return $nbre;
    }
    public function verifcarte(){
        session_start();
        $k =0;
        $db = config::getConnexion();
        $sql = "SELECT * from carte_fidelite WHERE id = $_SESSION[id]";
        $list = $db->prepare($sql);
        $list->execute();
        $nbre = $list->rowCount();
        if( $nbre != 0){
            $k =$k+1;
        }
        return $k;
    }

    public function modifier(carte_fidelite $u , $id) {
        $db = config::getConnexion() ;
        $sql = "update users.carte_fidelite set  anniversaire=:anniversaire,date_m=:date_m,situation_a=:situation_a ,nbre_enfants=:nbre_enfants WHERE id=:id" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(':anniversaire', $u->getAnniversaire());
        $q->bindValue(':date_m', $u->getDateM());
        $q->bindValue(':situation_a', $u->getSituationA());
        $q->bindValue(':nbre_enfants', $u->getNbreEnfants());
        $q->bindValue(':id', $id);
        $q->execute() ;
    }
    public function supprrimer($id_carte) {
        $db = config::getConnexion() ;
        $sql = "delete from carte_fidelite WHERE id_carte=:id_carte" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(":id_carte" , $id_carte) ;
        $q->execute()  ;
        return $q ;
    }
    //verification si aujourd'hui mon anniversaire  Function return 0 ou 1
    public function verifAnnif(){
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM carte_fidelite WHERE MONTH(anniversaire) = MONTH(CURRENT_DATE ) AND DAY(anniversaire)=DAY(CURRENT_DATE )');
        $req->execute();
        $annif = $req->rowCount();
        return $annif;

    }
    public function giveAnnif(){
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM carte_fidelite WHERE MONTH(anniversaire) = MONTH(CURRENT_DATE ) AND DAY(anniversaire)=DAY(CURRENT_DATE )');
        $req->execute();
        return $req->fetch();
    }
    public function verifDateMarquants(){
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM carte_fidelite WHERE MONTH(date_m) = MONTH(CURRENT_DATE ) AND DAY(date_m)=DAY(CURRENT_DATE )');
        $req->execute();
        $date_m = $req->rowCount();
        return $date_m;

    }
    public function giveDateMarquants(){
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM carte_fidelite WHERE MONTH(date_m) = MONTH(CURRENT_DATE ) AND DAY(date_m)=DAY(CURRENT_DATE )');
        $req->execute();
        return $req->fetch();
    }
    public function updateCartePoints($id){
        $db = config::getConnexion();
        $reqUser2 = $db->prepare("UPDATE carte_fidelite SET users.carte_fidelite.points = 100 WHERE id = ?");
        $reqUser2->execute(array($id));

    }
    public function triUser(){
        $db = config::getConnexion();
        $sql="SELECT * From users.carte_fidelite WHERE situation_a ='married' AND  nbre_enfants > 0";
        $list = $db->query($sql);
        return $list;
    }
    public function triUser1(){
        $db = config::getConnexion();
        $sql="SELECT * From users.carte_fidelite WHERE situation_a ='married' AND  nbre_enfants > 0";
        $r = $db->prepare($sql);
        $r->execute();
        return $r->rowCount() ;
    }
}
