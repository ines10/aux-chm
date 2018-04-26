<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/21/18
 * Time: 14:22
 */

session_start();
include "../core/fidelitec.php";
$db = config::getConnexion();
$e =new fidelitec();
$ec = $e->verif($_SESSION['id']);
//echo $ec;
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Aux champs elysées </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!--// Meta tag Keywords -->
    <!-- css files -->
    <link href="../web/css/store.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/stylepanier.css" rel="stylesheet" type="text/css" media="all" />
    <link href='//fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="../web/js/jquery-1.11.1.min.js"></script>
    <script>$(document).ready(function(c) {
            $('.alert-close').on('click', function(c){
                $('.message').fadeOut('slow', function(c){
                    $('.message').remove();
                });
            });
        });
    </script>
    <script>$(document).ready(function(c) {
            $('.alert-close1').on('click', function(c){
                $('.message1').fadeOut('slow', function(c){
                    $('.message1').remove();
                });
            });
        });
    </script>
    <script>$(document).ready(function(c) {
            $('.alert-close2').on('click', function(c){
                $('.message2').fadeOut('slow', function(c){
                    $('.message2').remove();
                });
            });
        });
    </script>
    <script>

        $ = function(id) {
            return document.getElementById(id);
        }

        var show = function(id) {
            $(id).style.display ='block';
        }
        var hide = function(id) {
            $(id).style.display ='none';
        }
    </script>
    <link href="../web/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> <!-- Bootstrap-Core-CSS -->
    <link href="../web/css/style.css" rel="stylesheet" type="text/css" media="all" /> <!-- Style-CSS -->
    <link rel="stylesheet" href="../web/css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
    <link rel="stylesheet" href="../web/css/popups.css">
    <link rel="stylesheet" href="../web/css/flexslider.css" type="text/css" media="screen" property="" /> <!-- Flexslider-CSS -->
    <link rel="stylesheet" href="../web/css/team.css" type="text/css" media="screen" property="" /> <!-- Team-CSS -->
    <!-- <link rel="stylesheet" href="css/smoothbox.css" type='text/css' media="all" /> <!-- Smoothbox-CSS -->
    <link href="../web/css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" /> <!-- Time-script-CSS -->
    <!-- //css files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Oleo+Script:400,700&amp;subset=latin-ext" rel="stylesheet">
    <!-- //online-fonts -->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Custom Theme files -->
    <link href="../web/css/stylecard.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- Custom Theme files -->
    <script type="text/javascript" src="../web/js/js.min.js"></script>
    <script type="text/javascript" src="../web/js/addtocart.js"></script>
    <script>$(document).ready(function(c) {
            $('.alert-close').on('click', function(c){
                $('.message').fadeOut('slow', function(c){
                    $('.message').remove();
                });
            });
        });
    </script>
    <script>$(document).ready(function(c) {
            $('.alert-close1').on('click', function(c){
                $('.message1').fadeOut('slow', function(c){
                    $('.message1').remove();
                });
            });
        });
    </script>
    <script>$(document).ready(function(c) {
            $('.alert-close2').on('click', function(c){
                $('.message2').fadeOut('slow', function(c){
                    $('.message2').remove();
                });
            });
        });
    </script>
</head>
<body>
<!--main-->
<!-- banner -->
<div data-vide-bg="../web/video/food">
    <div class="center-container">
        <div class="banner wthree">
            <div class="container">
                <div class="banner_top">
                    <div class="col-md-6 col-sm-4 col-xs-4 logo">
                        <h1><a href="../index1.php">Aux Champs<span>Elysées</span></a></h1>
                    </div>
    <div class="col-md-5 callbacks_container form-w3l-agil3">
        <div class="book-form">
    <div align="center">
        <p>Edition de mon profil</p>
        <div align="center">
            <?php
            $u = new userC() ;
            $AA = $u->affiche($_SESSION['id']); ;
            $i = 0 ;
            foreach ($AA as $key=>$value){
                $tab[$i]= $value ;
                $i++ ;
            }
            if($ec == 0 ){
            $A = $e->afficheC($_SESSION['id']);
            $j = 0 ;
            foreach ($A as $key=>$value){
                $tabc[$j]= $value ;
                $j++ ;
            }}
            ?>
            <form class="" action="modifierUser.php?id=<?php echo $_SESSION['id'];?>" method="post" >
                <label>Nom</label>
                <br>
                <input type="text" name="nom" value="<?php echo  $tab[1]?>">
                <br>
                <label>email</label>
                <br>
                <input type="text" name="email" value="<?php echo  $tab[2]?>">
                <br>
                <label>adresse</label>
                <br>
                <input type="text" name="adresse" value="<?php echo  $tab[4]?>">
                <br>
                <label>favoris</label>
                <br>
                <input type="text" name="favoris" value="<?php echo  $tab[5]?>">
                <br>
                <label>telephone</label>
                <br>
                <input type="text" name="telephone" value="<?php echo  $tab[6]?>">
                <br>
                <label>Password</label>
                <br>
                <input type="password" name="password" >
                <br>
                <input type="submit" value="modifier mon compte">
                <br>
            </form>
            <?php
            if($ec == 0 ){
?>
            <form class="" action="modifierCarte.php?id=<?php echo $tabc[1]?>" method="post" >
                <label>situation amoureuse</label>
                <br>
                <input type="text" name="situation_a" value="<?php echo  $tabc[4]?>" required>
                <br>
                <label>nbre d'enfants</label>
                <br>
                <input type="text" min="0" name="nbre_enfants" value="<?php echo  $tabc[5]?>" required>
                <br>
                <label>Anniversaire</label>
                <br>
                <input  id="datefield" type="date" name="anniversaire" value="<?php echo  $tabc[2]?>" required><br>
                <label>date_marquants</label>
                <br>
                <input id="datefield1" type="date" name="date_m" value="<?php echo  $tabc[3]?>" required>
                <!--                <input type="text" name="post" value="--><?php //echo  $tab[3]?><!--">-->
                <!--                <br>-->
                <!--                <legend>Image </legend>-->
                <br>

                <input type="submit" value="modifier ma carte">
                <br>
            </form>
                <script>
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth()+1; //January is 0!
                    var yyyy = today.getFullYear();
                    if(dd<10){
                        dd='0'+dd
                    }
                    if(mm<10){
                        mm='0'+mm
                    }

                    today = yyyy+'-'+mm+'-'+dd;
                    document.getElementById("datefield").setAttribute("max", today);
                    document.getElementById("datefield1").setAttribute("max", today);

                </script>
            <?php
            }
            if (isset($msg)){

                echo $msg;
            }
            ?>
        </div>
    </div>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright">
    <p>© 2018 CMD . All Rights Reserved | Design by <a href="#">CMDteam</a> </p>
</div>
</div>
<script type="text/javascript" src="../web/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../web/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
<script type="text/javascript" src="../web/js/jquery.flexisel.js"></script>
<script type="text/javascript" src="../web/js/move-top.js"></script>
<script type="text/javascript" src="../web/js/easing.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- start-smoth-scrolling -->
<!-- for-bottom-to-top smooth scrolling -->
<script type="text/javascript">
    $(document).ready(function() {
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //for-bottom-to-top smooth scrolling -->
<!-- Calendar -->
<link rel="stylesheet" href="../web/css/jquery-ui.css" />
<script src="../web/js/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
    });
</script>
<script src="../web/js/jquery.vide.min.js"></script>
</body>
    </html>
