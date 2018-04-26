<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/1/18
 * Time: 13:38
 */
include '/Users/macbook/Desktop/untitled1/entities/user.php';
include '/Users/macbook/Desktop/untitled1/config.php';
class userC{
    public function str_random($length){
        $alphabet = "0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
        return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
    }
    public function register(user $u){
        session_start();
        $db = config::getConnexion();
            $sql = "INSERT INTO user ( nom,password, email,gender,adresse,favoris,telephone, confirmation_token,confirmed_at,photo) VALUES (:nom ,:password , :email ,:gender,:adresse,:favoris,:telephone, :confirmation_token,NOW(),:photo)  ";
            $q = $db->prepare($sql);
            $token = userC::str_random(10);
            $q->bindValue(':nom', $u->getNom());
            $q->bindValue(':password', sha1($u->getPassword()));
            $q->bindValue(':email', $u->getEmail());
            $q->bindValue(':gender', $u->getGender());
            $q->bindValue(':adresse', $u->getAdresse());
            $q->bindValue(':favoris', $u->getFavoris());
            $q->bindValue(':telephone', $u->getTelephone());
            $q->bindValue(':confirmation_token', $token);
            $q->bindValue(':photo', $u->getPhoto());
            $q->execute();
            //
//            $db->prepare('UPDATE user SET confirmation_token=NULL ,confirmed_at = NOW() , reset_token = 1 WHERE email = ?')->execute([ $u->getEmail()]);
            //
        return $q;

    }
    public function afficheFavoris($id){

        $db = config::getConnexion();
        $sql = "select * from user WHERE id=:id" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(":id" , $id) ;
        $q->execute() ;
        return $q;
    }
    public function verifmailuser($email){
        $i=0;
        $db = config::getConnexion();
        $req = $db->prepare('SELECT id FROM user WHERE email = ?');
        $req->execute([$email]);
        $user = $req->rowCount();
        if ($user !=0) {
            $i = $i+1;
        }
        return $i;
    }
    public function verifuser($email){
        $j = 0 ;
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * FROM user WHERE (email = :email )  AND confirmed_at IS NOT NULL');
        $req->execute(['email' => $email]);
        $user = $req->rowCount();

             if ($user == 0) {
                 $j = $j+1;
        } else {
            $j = 0;
        }
        return $j;
    }
    public function supprrimer($id) {
        $db = config::getConnexion() ;
        $sql = "delete from user WHERE id=:id" ;
        $sqlC = "delete from users.carte_fidelite WHERE id=:id";
        $q = $db->prepare($sql) ;
        $qC = $db->prepare($sqlC);
        $q->bindValue(":id" , $id) ;
        $qC->bindValue(":id" , $_GET['id']);
        $q->execute()  ;
        $qC->execute();
        return $q ;
    }
    public function confirm(user $u)
    {
        $bool = 0;
        $user_id = $u->getId();
        $token = $u->getConfirmationToken();
        $db = config::getConnexion();
        $req = $db->prepare('SELECT * from user WHERE id = ?');
        $req->execute(['$user_id']);
        $user = $req->fetch();
        if ($user && $user['confirmation_token'] == $token) {
            session_start();
            $db->prepare('UPDATE user SET confirmation_token=NULL ,confirmed_at = NOW() , reset_token = 1 WHERE id = ?')->execute([$user_id]);
            $_SESSION['auth'] = $user;
            $bool = 1;
        } else {

            $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
            $bool = 0;
        }
        return $bool;
    }
    public function afficheFidele(){
    $db = config::getConnexion() ;
    $reqF = $db->prepare("SELECT id FROM users.carte_fidelite WHERE  points > 1000");
    $reqF->execute();
    $Finfo = $reqF->fetch();
        $reqU= $db -> prepare("SELECT * from user where id =?");
        $reqU->execute(array($Finfo['id']));
        return $reqU;

}
    public function afficher1(){
        $db = config::getConnexion();
        $sql = "SELECT * from user";
        $list = $db->query($sql);
        return $list;
    }
    public function affiche($id){
    $db = config::getConnexion();
    $sql = "select * from user WHERE id=:id" ;
    $q = $db->prepare($sql) ;
    $q->bindValue(":id" , $id) ;
    $q->execute() ;

    return $q->fetch(PDO::FETCH_OBJ) ;
}
    public function afficher(){
        $db = config::getConnexion() ;
        if(isset($_GET['id']) and $_GET['id']>0){
            $getid = intval($_GET['id']);
            $reqq = $db->prepare("SELECT * FROM user WHERE id = ?");
            $reqq->execute(array($getid));
            $userinfo = $reqq->fetch();
        }?>
    <div class="book-form">
        <p align="center">Mon compte</p>
        <div align="center" class="btn-warning">
            nom : <?php echo $userinfo['nom'];?>
             <br/>
             <br/>
             email : <?php echo $userinfo['email'];?> <br/>
             <br/>
            adresse : <?php echo $userinfo['adresse'];?> <br/>
            <br/>
            telephone : <?php echo $userinfo['telephone'];?> <br/>
            <br/>
            favoris : <?php echo $userinfo['favoris'];?> <br/>
            <br/>
             <?php
             $req= $db->prepare("SELECT * from users.carte_fidelite WHERE id = ?");
             $req->execute(array($userinfo['id']));
             $r = $req->rowCount();
             $row=$req->fetch();
             if ($r!=0) {
                 echo "Anniversaire :".$row['anniversaire'] . "<br/>";
                 echo "date marquant :" . $row['date_m'] . "<br/>";
                 echo "situation_A :" . $row['situation_a'] . "<br/>";
                 echo "nbre_enfants :" . $row['nbre_enfants'] . "<br/>";
                 echo "nbre de points :" . $row['points'] . "<br/>";
?>
                 <br>
                 <br>
                 telechargez votre Barcode pour profiter de vos offres chez nous !
                 <br>
                 <br>
                 <p>
                     <a href="../views/barcode.php?id=<?php echo $userinfo['id']
                     ?>" class="btn btn-info btn-lg">
                         <span class="glyphicon glyphicon-barcode"></span> Barcode
                     </a>
                 </p>

                 <?php

             }
             ?>

                 <br/>
                 <div class="book-form">
                     <button class="btn-link">
                     <a href="../views/editAccount.php?id=<?php echo $userinfo['id']
                     ?>">modifier mon profil</a>
                     </button>
                    <br/>
                     <button class="btn-link">
                     <a href="../views/logout.php?id=<?php echo $userinfo['id']
                     ?>"> se deconnecter</a>
                     </button>
                 </div>
             </div>
        </div>
<!--</div>-->
<?php    }
    public function modifier(user $u , $id) {
        $db = config::getConnexion() ;
        $sql = "update users.user set  nom=:nom,email=:email,adresse=:adresse,favoris=:favoris,telephone=:telephone,password=:password WHERE id =:id" ;
        $q = $db->prepare($sql) ;
        $q->bindValue(':nom', $u->getNom());
        $q->bindValue(':password', sha1($u->getPassword()));
        $q->bindValue(':email', $u->getEmail());
        $q->bindValue(':adresse', $u->getAdresse());
        $q->bindValue(':favoris', $u->getFavoris());
        $q->bindValue(':telephone', $u->getTelephone());
        $q->bindValue(':id', $id);
        $q->execute() ;
    }
    public function afficherechercheavance($str) {
        $db = config::getConnexion();
        $sql = "select * from users.user WHERE nom LIKE :str " ;
        $q = $db->prepare($sql) ;
        $q->bindValue(":str" , $str."%") ;
        $q->execute() ;
        return $q->fetchAll() ;
    }
    public function CountVisit(){
        $i=0;
        date_default_timezone_set('Africa/Tunis');
        $date= explode('/',date('d/m/Y'));
        $d=strtotime("tomorrow");
        $k =  explode('-',date("Y-m-d", $d) );
        $dateNow =date('H');
        if($dateNow == 00) {
            $i = $i + 1;}
            $ip = fopen("last_ip$i.txt", 'c+');
            $check = fgets($ip);
            $file = fopen("counter$i.txt", 'c+');
            $count = intval(fgets($file));
            if ($_SERVER['REMOTE_ADDR'] != $check) {
                fclose($ip);
                $ip = fopen("last_ip$i.txt", 'w+');
                fputs($ip, $_SERVER['REMOTE_ADDR']);
                $count++;
                fseek($file, 0);
                fputs($file, $count);
            }
            fclose($file);
            fclose($ip);
            return $count;

    }
    public function connecteNow(){
        $db = config::getConnexion();
        date_default_timezone_set('Africa/Tunis');
        //session_start();
        $temps_session = 15 ;
        $temps_actuel = date("U");
        $ip_user = $_SERVER['REMOTE_ADDR'];
        $reqIp_exist = $db ->prepare("SELECT * from onligne WHERE user_ip = ?");
        $reqIp_exist->execute(array($ip_user));
        $ip_exist = $reqIp_exist->rowCount();
        if($ip_exist == 0){
            $add_ip = $db->prepare("INSERT INTO onligne(user_ip,temps) VALUES (?,?)");
            $add_ip->execute(array($ip_user,$temps_actuel));
        }else{
            $update_ip = $db->prepare("UPDATE onligne SET temps = ? WHERE user_ip = ?");
            $update_ip->execute(array($temps_actuel,$ip_user));

        }
        $session_delete_time = $temps_actuel - $temps_session;
        $del_ip = $db->prepare("DELETE FROM onligne WHERE temps < ?");
        $del_ip->execute(array($session_delete_time));
        $show_user_nbr = $db->prepare("SELECT id FROM onligne");
        $req = $db->prepare("select * from user where id = (select id from onligne )");
        $req->execute();
        $userinfo = $req->fetch();
        $userinfo['id'];
         $userinfo['nom'];
         $userinfo['email'];
        $user_nbr = $req->rowCount();
//    $user_nbr = $show_user_nbr->fetch();
        echo $user_nbr['id'];
//if(isset($_GET['id']) and $_GET['id']>0) {
//    $getid = intval($_GET['id']);
//    $req = $db->prepare("SELECT * FROM user WHERE id = ?");
//    $req->execute(array($getid));
//    $userinfo = $req->fetch();
//fetch()
//while
//echo

        echo $user_nbr.  "users ";
        return $user_nbr;}
    public function updateUserID($id){
        $db = config::getConnexion();
        $reqUser = $db->prepare("update user set role_id = '0'  where id = ? ");
        $reqUser->execute(array($id));
    }
    public function updateID(){
        $db = config::getConnexion();
        $req1 = $db->prepare("select id from user WHERE role_id = 0 ");
        $req1->execute();
        $c=$req1->rowCount();
        $cc=$req1->fetch();
            $req2 = $db->prepare("UPDATE user SET role_id =  1 WHERE id = ?");
            $req2->execute(array($cc['id']));

    }
    public function sendSms($destination,$msg){
        include_once("/Users/macbook/Desktop/untitled1/ViaNettSMS_PHP/ViaNettSMS.php");
        $Username = "ines.atia@esprit.tn";
        $Password = "h52tl";
        $MsgSender = "coucou";
        $DestinationAddress = $destination;
        $Message = $msg;
// Create ViaNettSMS object with params $Username and $Password
        $ViaNettSMS = new ViaNettSMS($Username, $Password);
        try
        {
            // Send SMS through the HTTP API
            $Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
            // Check result object returned and give response to end user according to success or not.
            if ($Result->Success == true)
                $Message = "Message successfully sent!";
            else
                $Message = "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
        }
        catch (Exception $e)
        {
            //Error occured while connecting to server.
            $Message = $e->getMessage();
        }
        return $Message;
    }
    public function verifToken($email){
        $db = config::getConnexion();
        $r=$db->prepare("SELECT confirmation_token  , id from user where email = ?");
        $r->execute(array($email));
        return $r->fetch();
    }
    public function rememberMe(){
        $db = config::getConnexion();
        if (!isset($_SESSION['id']) AND isset($_COOKIE['email'], $_COOKIE['password']) AND !empty($_COOKIE['email']) AND !empty($_COOKIE['password'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = sha1($_POST['password']);
            $req = $db->prepare('SELECT * FROM user WHERE (email = :email ) AND (password = :password) AND confirmed_at IS NOT NULL');
            $req->execute([$_COOKIE['email'], $_COOKIE['password']]);
            $user = $req->rowCount();
            if ($user != 1) {
                $userinfo = $req->fetch();
                $_SESSION['id'] = $userinfo['id'];
                $_SESSION['nom'] = $userinfo['nom'];
                $_SESSION['email'] = $userinfo['email'];
            }
        }
    }
    public function countUser(){
        $pdo = config::getConnexion();
        $req = $pdo->prepare("SELECT * From user");
        $req->execute();
        $a =$req->rowCount();
        return $a;
    }
}






