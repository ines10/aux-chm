
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin aux champs elysees</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="js/jquery-2.1.1.min.js"></script>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600'q rel='stylesheet' type='text/css'>
    <script src="js/Chart.min.js"></script>
    <script src="//cdn.jsdelivr.net/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <script src="js/skycons.js"></script>
</head>
<body>
<div class="page-container">
    <div class="left-content">
        <div class="mother-grid-inner">
            <!--header start here-->
            <div class="header-main">
                <div class="header-left">
                    <div class="logo-name">
                        <a href="indexAdmin.php"> <p>aux champs elysees</p>
                        </a>
                    </div>
                    <div class="search-box">
                        <form method="post" action="indexAdmin.php">
                            <input type="text"  required="" name="search">
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
                                    <li> <a href="../index1.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
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
            <div class="inner-block">
                <div class="market-updates">
                    <?php
                    include "../core/fidelitec.php" ;
                    date_default_timezone_set('Africa/Tunis');
                    $ec = new userC() ;
                    $i=0;
                    $dateNow =date('H');
                    if($dateNow == 00) {
                        $i = $i + 1;}
                    $liste = $ec->CountVisit() ;
                    $fp = fopen ("counter$i.txt", "r");
                    $contenu_du_fichier = fgets ($fp, 255);
                    fclose ($fp);
                    $r=$contenu_du_fichier
                    ?>
                    <div class="chart-first-line">
                        <div class="col-md-6 chart-blo-1">
                            <div class="dygno">
                                <center>
                                <h2>Nombre de visite Today</h2>
                                </center>
                                <canvas id="doughnut" height="300" width="470" style="width: 470px; height: 300px;"></canvas>
                                <script>
                                    var doughnutData = [
                                        {
                                            value : <?php echo $r;?>,
                                            color : "#68AE00"
                                        },
                                    ];
                                    new Chart(document.getElementById("doughnut").getContext("2d")).Doughnut(doughnutData);
                                </script>
                            </div>
                        </div>

                     </div>


                    </div>


                </div>
                <div class="chart-layer-2">
                    <div class="col-md-6 chart-layer2-left">


                    </div>
                    <div class="clearfix"> </div>
                </div>
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
                <li id="menu-home" ><a href="indexAdmin.php"><i class="fa fa-tachometer"></i><span>Admin</span></a></li>
                <li id="menu-home" ><a href="charts.php"><i class="fa fa-tachometer"></i><span>Charts</span></a></li>

                </li>
                <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>Event</span><span class="fa fa-angle-right" style="float: right"></span></a>
                    <ul id="menu-academico-sub" >
                        <li id="menu-mensagens" ><a href="../views/addevent.html">Add Event</a></li>
                        <li id="menu-mensagens" ><a href="../views/affiche_event.php">Display Events</a></li>
                        <li id="menu-mensagens" ><a href="../views/calendarAdmin.php">Historique events</a></li>
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
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/bootstrap.js"> </script>

</body>
<div class="copyrights">
    <p>© 2018 CMD. All Rights Reserved | Design by  <a href="http://CMD.com/" target="_blank">CMD Team</a> </p>
</div>
</html>