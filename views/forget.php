<?php
session_start();
include '../core/userC.php';
$u=new userC();
if( isset($_POST['Done'])){

    $db = config::getConnexion();
    $req = $db->prepare('SELECT * FROM user WHERE email = ? AND confirmed_at IS NOT NULL');
    $req->execute([$_POST['email']]);
    $r=$req->fetch();
    $count = $req->rowCount();
    if($count == 1){
        $_SESSION['email'] = $_POST['email'];
        $reset_token =$u->str_random(60);
        echo $reset_token ;
        $r =$db->prepare('UPDATE user SET reset_token = ? WHERE email = ?');
        $r->execute([$reset_token, $_POST['email']]);
        $_SESSION['flash']['success'] = 'Les instructions du rappel de mot de passe vous ont été envoyées par emails';
        mail($_POST['email'], 'Réinitiatilisation de votre mot de passe', "Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://localhost:63342/untitled1/views/reset.php?email={$_POST['email']}&reset_token=$reset_token");
        header('Location: ../index1.php');
        exit();
    }else{
        $_SESSION['flash']['danger'] = 'Aucun compte ne correspond à cet adresse';
    }
}
?>

<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Aux champs elysées </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
    function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link rel="stylesheet" type="text/css" href="../web/css/styleC.css" />
    <script type="text/javascript" language="javascript" src="../web/js/jqueryC.js"></script>
    <script type="text/javascript" language="javascript" src="../web/js/scriptC.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link href="../web/css/store.css" rel="stylesheet" type="text/css" media="all">
    <link href="../web/css/stylepanier.css" rel="stylesheet" type="text/css" media="all" />
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
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Oleo+Script:400,700&amp;subset=latin-ext" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="../web/css/stylecard.css" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
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
                        <h1><a href="index1.php">Aux Champs<span>Elysées</span></a></h1>
                    </div>
                    <div class="col-md-6 col-sm-8 col-xs-8 w3_menu">
                        <div class="navigt">
                            <div class="col-md-6 col-sm-5 col-xs-5 top-nav-text">
                                <a class="page-scroll" href="#myModal2" data-toggle="modal" data-hover="LOGIN">Press here</a>
                            </div>

                            <div class="mobile-nav-button">
                                <div class="mobile-nav-button__line"></div>
                                <div class="mobile-nav-button__line"></div>
                                <div class="mobile-nav-button__line"></div>
                            </div>
                            <nav class="mobile-menu">
                                <ul>
                                    <li class="active"><a href="index1.php">Home</a></li>
                                    <li><a href="views/myAccount.php" class="scroll">My account</a></li>
                                    <li><a href="#services" class="scroll">Events</a></li>
                                    <li><a href="#services" class="scroll">Services</a></li>
                                    <li><a href="#chefs" class="scroll">Our Chefs</a></li>
                                    <li><a href="#menu" class="scroll">Menu</a></li>
                                    <li><a href="#contact" class="scroll">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <!--Slider-->

                    <!-- //Slider -->
                    <!-- form -->

                    <!-- //form -->
                </div>
            </div>
            <!-- ____________________LOGIN page__________________ -->
            <!-- modal -->
            <div class="modal about-modal w3-agileits fade" id="myModal2" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body login-page ">
                            <div class="login-top sign-top">
                                <div class="agileits-login">
                                    <h5>Enter your Email</h5>
                                    <form action="" method="post">
                                        <input type="text" class="email" name="email" placeholder="email" required=""/>
                                        <div class="w3ls-submit">
                                            <div class="w3ls-submit">
                                            <input type="submit" value="Done" name="Done">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="../web/js/jquery-2.1.4.min.js"></script>
            <script type="text/javascript" src="../web/js/bootstrap.js"></script>
            <script src="../web/js/responsiveslides.min.js"></script>
            <script>
                $(function () {
                    $("#slider3").responsiveSlides({
                        auto: true,
                        pager:true,
                        nav:false,
                        speed: 500,
                        namespace: "callbacks",
                        before: function () {
                            $('.events').append("<li>before event fired.</li>");
                        },
                        after: function () {
                            $('.events').append("<li>after event fired.</li>");
                        }
                    });

                });
            </script>
            <script>
                $(document).ready(function () {
                    $('.mobile-nav-button').on('click', function() {
                        $( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(1)" ).toggleClass( "mobile-nav-button__line--1");
                        $( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(2)" ).toggleClass( "mobile-nav-button__line--2");
                        $( ".mobile-nav-button .mobile-nav-button__line:nth-of-type(3)" ).toggleClass( "mobile-nav-button__line--3");

                        $('.mobile-menu').toggleClass('mobile-menu--open');
                        return false;
                    });
                });
            </script>
            <script defer src="../web/js/jquery.flexslider.js"></script>
            <script type="text/javascript">
                $(window).load(function(){
                    $('.flexslider').flexslider({
                        animation: "slide",
                        start: function(slider){
                            $('body').removeClass('loading');
                        }
                    });
                });
            </script>
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
            <script type="text/javascript">
                $(document).ready(function() {
                    $().UItoTop({ easingType: 'easeOutQuart' });
                });
            </script>
            <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
            <link rel="stylesheet" href="../web/css/jquery-ui.css" />
            <script src="../web/js/jquery-ui.js"></script>
            <script src="../web/js/jquery.vide.min.js"></script>
            <script type="text/javascript" src="../web/js/wickedpicker.js"></script>
            <script type="text/javascript">
                $('.timepicker').wickedpicker({twentyFour: false});
            </script>
        </div>
</body>
</html>
