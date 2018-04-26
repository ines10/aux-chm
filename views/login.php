<?php
///**
// * Created by PhpStorm.
// * User: macbook
// * Date: 3/11/18
// * Time: 15:36
// */
//
session_start();
include "../core/userC.php";
$db = config::getConnexion();
if(!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = sha1($_POST['password']);
    if($_POST['email'] == 'admin.admin@gmail.tn' AND $_POST['password']=='admin'){
        header("location:/untitled1/backend/indexAdmin.php");
    }
    else{
    $req = $db->prepare('SELECT * FROM user WHERE (email = :email ) AND (password = :password) AND confirmed_at IS NOT NULL');
    $req->execute(['email' => $email,'password' => $password]);
    $user = $req->rowCount();
    if ($user != 0) {
        $user = $req->fetch();
        $_SESSION['id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['favoris'] = $user['favoris'];
        $_SESSION['gender'] = $user['gender'];
        $_SESSION['adresse'] = $user['adresse'];
        $_SESSION['telephone'] = $user['telephone'];

        if(isset($_POST['rememberme'])){
            $u=new userC();
            $u->rememberMe();
            setcookie('email',$email,time()+365*24*3600,null,null,false,true);
            setcookie('password',$password,time()+365*24*3600,null,null,false,true);

        }
        header("location:myAccount.php?id=" .$_SESSION['id']);

    }else{
        header("location:../index1.php");
    }

}}
?>
<!--------------------------------LOGIN WITH GOOGLE API ---------------------------------------------------->
<?php
require_once('/Users/macbook/Desktop/untitled1/9-1/settings.php');
require_once('/Users/macbook/Desktop/untitled1/9-1/google-login-api.php');
if(isset($_GET['code'])) {
    try {
        $gapi = new GoogleLoginApi();
        $data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
        $access_token = $data['access_token'];
        $user_info = $gapi->GetUserProfileInfo($access_token);
        echo '<pre>';print_r($user_info); echo '</pre>';
        $_SESSION['logged_in'] = 1;
    }
    catch(Exception $e) {
        echo $e->getMessage();
        exit();
    }
}
?>
