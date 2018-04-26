<?php
require "../core/fidelitec.php";
$db = config::getConnexion();
session_start();
$id= $_SESSION['id'];
$favoris= $_SESSION['favoris'];
date_default_timezone_set('Africa/Tunis');
$date1 = explode('/',date('d/m/Y'));
$annif =new fidelitec();
$usern=new userC();
$event=new eventsC();
$verif=$annif->verifAnnif();
$anniv=$annif->giveAnnif();
 if($verif == 0 ){
    $usern->updateID();
 }
 else {
     $j = 0;
     if ($j == 0) {
         $r = $anniv['id'];
         if ($r == $_SESSION['id']) {
             $ec->sendSms($_SESSION['telephone'],"Merci pour vore registrement ");

             $moi = $anniv['anniversaire'];
             $mois = explode('-', $moi);
             $age = $date1[2] - $mois[0];
             ?>
             <div id="dialog" title="cher(e) client(e)" >
                 <center><div data-vide-bg="../web/video/happy">

                             <div class="banner wthree">
                                 <div class="container">
                                     <div class="banner_top">
                                     </div>
                                 </div>
                             </div>
                     <?php
                     ?></center>
                 <h1 class='btn-warning'>*****HAPPY*****<?php echo $age ;?> years*****BIRTHDAY*****</h1>
                 <p class="btn-warning">VOUS AUREZ 100 POINTS dans votre carte de fidelite</p>

             </div>
             <div onclick="aaa()"></div>

             <audio autoplay src="../web/video/happy1.mp3"></audio>
             <?php
             $usern->updateUserID($r);
             $annif->updateCartePoints($r);
             $event->updateEvent();
             $j = $j + 1;
         }
     }
 }
     if ($verif != 0) {
         $reqq = $db->prepare('update user set i = 1 WHERE id = $annif');
         }
////////////////////////////////////////////////////////DATE MARQUANTS/////////////////////////////////////////////////
$date2 = explode('/',date('d/m/Y'));
$date_m =new fidelitec();
$verifD=$date_m->verifDateMarquants();
$dateM=$date_m->giveDateMarquants();
if($verifD == 0 ){
   $usern->updateID();
}
else {
    $j = 0;
    if ($j == 0) {
        $r = $dateM['id'];
        if ($r == $_SESSION['id']) {
            $moi = $dateM['date_m'];
            $mois = explode('-', $moi);
            $age = $date2[2] - $mois[0];
            ?>
            <div id="dialog" title="cher(e) client(e)" >
                <h1 class='btn-warning'>happy DAY</h1>
                <h1 class='btn-warning'>Ca fait <?php echo $age ;?> ans de votre dates marquants****</h1>
                <p class="btn-warning">VOUS AUREZ 100 POINTS dans votre carte de fidelite</p>
            </div>
            <div onclick="aaa()"></div>
            <?php
            $usern->updateUserID($r);
            $date_m->updateCartePoints($r);
            $event->updateEvent();
            $j = $j + 1;
        }
    }
}
if ($verifD != 0) {
    $reqq = $db->prepare('update user set i = 1 WHERE id = $annif');
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Aux champs elysées </title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <!----------------------------------------------------------------------->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#dialog" ).dialog();
        } );
        function aaa() {
            $(function() {
                $( "#dialog" ).dialog();
            } );
        }
    </script>
    <!----------------------------------------------------------------------->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--// Meta tag Keywords -->
    <!-- css files -->
    <link href="../web/css/store.css" rel="stylesheet" type="text/css" media="all">
    <!--POPUP-->
    <link rel="stylesheet" href="../web/css/popup.css">
    <!-------------------------->
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
<div data-vide-bg="../web/video/food">
    <div class="center-container">
        <div class="banner wthree">
            <div class="container">
                <div class="banner_top">
                    <div class="col-md-6 col-sm-4 col-xs-4 logo">
                        <h1><a href="../index1.php">Aux Champs<span>Elysées</span></a></h1>
                        <a href="https://www.facebook.com/Restaurant-Aux-Champs-Elys%C3%A9es-1461168387484880/" class="w3-bar-item w3-button"><i class="fa fa-facebook-official"></i></a>
                    </div>
                    <div class="col-md-6 col-sm-8 col-xs-8 w3_menu">
                        <div class="navigt">
                        </div>
                        <div class="mobile-nav-button">
                            <div class="mobile-nav-button__line"></div>
                            <div class="mobile-nav-button__line"></div>
                            <div class="mobile-nav-button__line"></div>
                        </div>
                        <nav class="mobile-menu">
                            <ul>
                                <li class="active"><a href="../index1.php">Home</a></li>
                                <li><a href="../index1.php">My account</a></li>
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
                <!--//////AFFICHAGE///////////////////////-->

                <?php
                $ec = new userC() ;
                $liste = $ec->afficher() ;

                ?>


            </div>
        </div>

    </div>
    <div class="book-form">

        <div class="book-form">
            <div class="banner wthree">
                <div class="container">
                    <h1 class="display-3">Carte Fidelite!</h1>
                    <p class="lead">vous n'avez pas un code promotionnel ?</p>
                    <hr class="my-4">
                    <p >vous n'avez pas un code promotionnel ?</p>
                    <p>voulez-vous devenir parmi nos clients fidèles?</p>
                    <p>profitez-vous de notre carte fidélité électronique?</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="fidelite.html" role="button" onmouseenter="checkcarte();">Learn more</a>
                    </p>
                </div>
            </div>

        </div>
        <input hidden value="<?php echo $id;?>" id="form_id">
        <script type="text/javascript">
            function checkcarte() {

                var str = document.getElementById("form_id").value;
                $.ajax({
                    url : "Cartecheck.php" ,
                    type : 'get' ,
                    data : "str=" + str ,
                    success : function (data) {
                        alert(data);
                        console.log(data) ;
                        if (data == "1") {
                            alert(" Vous avez deja une carte fidelite <?php echo $_SESSION['nom'];?> ") ;
                        }
                    }
                })
            }
        </script>
    </div>
    <div class="book-form">

        <div class="book-form">
            <div class="banner wthree">
                <div class="container">

                    <form method="post">
                        <center>
                        <img src=../web/photos/flickr.png alt=""  width="200" height="200">
                        </center>
                        <input name="flicker" type="text" class="form_text" id="form" placeholder="Flickr">
                       <center>
                        <input type="submit" class="sbmt_btn" value="submit" name="flickr"   >
                       </center>
                    </form>
                    <?php
                    if(!isset($_POST['flickr'])) {
                        $api_key = '8d0b1dbcde36eea77b81633c6090665f';
                        $i = rand(0, 4);
                        $j = rand(0, 5);
                        echo $i . $j;
                        $tag = $favoris;
                        $perPage = 25;
                        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
                        $url .= '&api_key=' . $api_key;
                        $url .= '&tags=' . $tag;
                        $url .= '&per_page=' . $perPage;
                        $url .= '&format=json';
                        $url .= '&nojsoncallback=1';
                        $url .= '&sort=interestingness-desc';
                        $url .= "&content_type=1";
                        $response = json_decode(file_get_contents($url));
                        $photo_array = $response->photos->photo;
                        foreach ($photo_array as $single_photo) {

                            $farm_id = $single_photo->farm;
                            $server_id = $single_photo->server;
                            $photo_id = $single_photo->id;
                            $secret_id = $single_photo->secret;
                            $size = 'm';
                            $title = $single_photo->title;
                            $photo_url = 'https://farm' . $farm_id . '.staticflickr.com/' . $server_id . '/' . $photo_id . '_' . $secret_id . '_' . $size . '.' . 'jpg';
                            print "<img title='" . $title . "' src='" . $photo_url . "' width='150px' height='150px' />";
                        }
                    }else{
                        $api_key = '8d0b1dbcde36eea77b81633c6090665f';
                        $i = rand(0, 4);
                        $j = rand(0, 5);
                        echo $i . $j;
                        $tag = $_POST['flicker'];
                        $perPage = 25;
                        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
                        $url .= '&api_key=' . $api_key;
                        $url .= '&tags=' . $tag;
                        $url .= '&per_page=' . $perPage;
                        $url .= '&format=json';
                        $url .= '&nojsoncallback=1';
                        $url .= '&sort=interestingness-desc';
                        $url .= "&content_type=1";
                        $response = json_decode(file_get_contents($url));
                        $photo_array = $response->photos->photo;
                        foreach ($photo_array as $single_photo) {

                            $farm_id = $single_photo->farm;
                            $server_id = $single_photo->server;
                            $photo_id = $single_photo->id;
                            $secret_id = $single_photo->secret;
                            $size = 'm';
                            $title = $single_photo->title;
                            $photo_url = 'https://farm' . $farm_id . '.staticflickr.com/' . $server_id . '/' . $photo_id . '_' . $secret_id . '_' . $size . '.' . 'jpg';
                            print "<img title='" . $title . "' src='" . $photo_url . "' width='150px' height='150px' />";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- //banner -->
    <!------------------------------------------------------------ grids ------------------------------------------------------>
    <div class="copyright">
        <p>© 2018 CMD . All Rights Reserved | Design by <a href="http://w3layouts.com/">CMDteam</a> </p>
    </div>
    <script type="text/javascript" src="../web/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../web/js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
    <!-- //js -->
    <!-- responsiveslider -->
    <script src="../web/js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
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
    <!-- //responsiveslider -->
    <!-- menu -->
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
    <!-- //menu -->
    <!-- flexSlider-for-grids-section -->
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
    <!-- //flexSlider-for-grids-section -->
    <!-- flexSlider-for-menu-section -->
    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo1").flexisel({
                visibleItems: 4,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint:480,
                        visibleItems: 2
                    },
                    landscape: {
                        changePoint:640,
                        visibleItems:3
                    },
                    tablet: {
                        changePoint:768,
                        visibleItems: 4
                    }
                }
            });

        });
    </script>
    <script type="text/javascript" src="../web/js/jquery.flexisel.js"></script>
    <!-- //flexSlider-for-menu-section -->
    <!-- start-smoth-scrolling -->
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
    <script>
        $(function() {
            $( "#datepicker,#datepicker1,#datepicker2,#datepicker3" ).datepicker();
        });
    </script>
    <script src="../web/js/jquery.vide.min.js"></script>
    <script type="text/javascript" src="../web/js/wickedpicker.js"></script>
    <script type="text/javascript">
        $('.timepicker').wickedpicker({twentyFour: false});
    </script>
    <script src="../web/js/popup.js"></script>
</body>

</html>