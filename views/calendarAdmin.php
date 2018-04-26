<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include "../core/eventsC.php";
$ec = new eventsC() ;
date_default_timezone_set('Africa/Tunis');
$liste = $ec->afficher() ;
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin aux champs elysees</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="../backend/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="../backend/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="../backend/js/jquery-2.1.1.min.js"></script>
    <link href="../backend/css/font-awesome.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
    <script src="../backend/js/Chart.min.js"></script>
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <!--skycons-icons-->
    <script src="../backend/js/skycons.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Events TimeLine</title>
    <link rel="shortcut icon" href="images/icone_logo.png" />
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../web/js/cntl.css">
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(window).bind('scroll', function() {
                var navHeight = $( window ).height() -500;
                if ($(window).scrollTop() > navHeight) {
                    $('nav').addClass('fixed');
                }
                else {
                    $('nav').removeClass('fixed');
                }
            });
        });
    </script>

    <link rel="stylesheet" id="font-awesome-css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" type="text/css" media="screen">
    <script>

        $(function(){

            $(document).on( 'scroll', function(){

                if ($(window).scrollTop() > 100) {
                    $('.scroll-top-wrapper').addClass('show');
                } else {
                    $('.scroll-top-wrapper').removeClass('show');
                }
            });

            $('.scroll-top-wrapper').on('click', scrollToTop);
        });

        function scrollToTop() {
            verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
            element = $('body');
            offset = element.offset();
            offsetTop = offset.top;
            $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
        }
    </script>
    <!--//skycons-icons-->
</head>
<body>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">
                <div class="header-left">
                    <div class="logo-name">
                        <a href="../backend/index.html"> <p>aux champs elysees</p>
                        </a>
                    </div>
                    <div class="search-box">
                        <form method="post" action="../backend/indexAdmin.php">
                            <input type="text" placeholder="Search..." required="" name="search">
                            <input type="submit" value="">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="header-right">

                    <div class="profile_details">
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">
                                        <span class="prfil-img"><img src="images/p1.png" alt=""> </span>
                                        <div class="user-name">
                                            <p>admin</p>
                                            <span>Administrator</span>
                                        </div>
                                        <i class="fa fa-angle-down lnr"></i>
                                        <i class="fa fa-angle-up lnr"></i>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="../views/logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!--heder end here-->
            <!-- script-for sticky-nav -->
            <script>
                $(document).ready(function() {
                    var navoffeset=$(".header-main").offset().top;
                    $(window).scroll(function(){
                        var scrollpos=$(window).scrollTop();
                        if(scrollpos >=navoffeset){
                            $(".header-main").addClass("fixed");
                        }else{
                            $(".header-main").removeClass("fixed");
                        }
                    });

                });
            </script>
            <!-- /script-for sticky-nav -->
            <!--inner block start here-->

            <div id="container">
                <div id="featured">
                </div> <!--end  featured-->
                <div id="main">
                    <div id="content">
                        <h1 align="center"><?php echo "calendrier des evenements"; ?></h1>

                        <div class="cntl"> <span class="cntl-bar cntl-center"> <span class="cntl-bar-fill"></span> </span>
                            <div class="cntl-states">
                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Janvier"; ?></h4>
                                        <p><?php include('/Users/macbook/Downloads/untitled1/backend/events_admin/calendar/affiche1.php');?></p>


                                    </div>
                                    <div class="cntl-icon cntl-center">01</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Fevrier"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche2.php');?>
                                        </p>
                                    </div>

                                    <div class="cntl-icon cntl-center">02</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Mars"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche3.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">03</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Avril"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche4.php');?>
                                        </p>
                                    </div>

                                    <div class="cntl-icon cntl-center">04</div>
                                </div>
                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Mai"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche5.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">05</div>
                                </div>

                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Juin"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche6.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">06</div>
                                </div>



                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Juillet"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche7.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">07</div>
                                </div>


                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Aout"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche8.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">08</div>
                                </div>

                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Septembre"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche9.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">09</div>
                                </div>


                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Octobre"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche10.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">10</div>
                                </div>

                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "Novembre"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche11.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">11</div>
                                </div>


                                <div class="cntl-state">
                                    <div class="cntl-content">
                                        <h4><?php echo "DECEMBRE"; ?></h4>
                                        <p><?php include('events_admin/calendar/affiche12.php');?></p>
                                    </div>

                                    <div class="cntl-icon cntl-center">12</div>
                                </div>
                                <div class="cntl-state">

                                    <div class="cntl-icon cntl-center">...</div>
                                </div>




                            </div>
                        </div>
                        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
                        <script type="text/javascript" src="../web/js/jquery.cntl.js"></script>
                        <script type="text/javascript">
                            $(document).ready(function(e){
                                $('.cntl').cntl({
                                    revealbefore: 300,
                                    anim_class: 'cntl-animate',
                                    onreveal: function(e){
                                        console.log(e);
                                    }
                                });
                            });
                        </script>
                        <script type="text/javascript">

                            var _gaq = _gaq || [];
                            _gaq.push(['_setAccount', 'UA-36251023-1']);
                            _gaq.push(['_setDomainName', 'jqueryscript.net']);
                            _gaq.push(['_trackPageview']);

                            (function() {
                                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                            })();

                        </script>
                    </div>



                    <div class="main">








                    </div> <!--end content-->
                </div> <!--end main-->








                <div class="arrierefooter">


                </div> <!--end arrierefooter-->
                <div class="scroll-top-wrapper ">
	<span class="scroll-top-inner">
		<i class="fa fa-2x fa-arrow-circle-up"></i>
	</span>
                </div>
            </div> <!--end contrainer-->
                <!--market updates end here-->
                <!--mainpage chit-chating-->
                <div class="chit-chat-layer1">


                    <div class="clearfix"> </div>
                </div>
                <div class="chart-layer-2">
                    <div class="col-md-6 chart-layer2-left">

                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="copyrights">
                <p>© 2018 CMD. All Rights Reserved | Design by  <a href="http://CMD.com/" target="_blank">CMD Team</a> </p>
            </div>
            <!--COPY rights end here-->
        </div>
    </div>
    <!--slider menu-->
    <div class="sidebar-menu">
        <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
                <!--<img id="logo" src="" alt="Logo"/>-->
            </a> </div>
        <div class="menu">
            <ul id="menu" >
                <li id="menu-home" ><a href="../backend/indexAdmin.php"><i class="fa fa-tachometer"></i><span>Admin</span></a></li>

                </li>
                <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Event</span><span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-mensagens" ><a href="addevent.html">Ajouter evenementt</a></li>
                        <li id="menu-mensagens" ><a href="affiche_event.php">Affichage des evenements recents</a></li>
                        <li id="menu-mensagens" ><a href="affiche_eventTri.php">affichage des evenements filtrés</a></li>
                        <li id="menu-mensagens" ><a href="calendarAdmin.php">Historique evenements 2018/2019</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
<script>
    var toggle = true;

    $(".sidebar-icon").click(function() {
        if (toggle)
        {
            $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
            $("#menu span").css({"position":"absolute"});
        }
        else
        {
            $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
            setTimeout(function() {
                $("#menu span").css({"position":"relative"});
            }, 400);
        }
        toggle = !toggle;
    });
</script>
<script src="../backend/js/jquery.nicescroll.js"></script>
<script src="../backend/js/scripts.js"></script>
<script src="../backend/js/bootstrap.js"> </script>

</body>
</html>