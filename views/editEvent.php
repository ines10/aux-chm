<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/19/18
 * Time: 19:47
 */
include '../core/eventsC.php';
$u = new eventsC() ;
$AA = $u->affiche($_GET['id_event']); ;
$i = 0 ;
foreach ($AA as $key=>$value){
    $tab[$i]= $value ;
    $i++ ;
}

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
    <script>window.modernizr || document.write('<script src="lib/modernizr/modernizr-custom.js"><\/script>')</script>
    <!--skycons-icons-->
    <script src="../backend/js/skycons.js"></script>
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
            <div class="inner-block">
                <!--market updates updates-->
                <h1>Modifier l'evenement de l'id <?php echo $tab[0];?></h1>
                <form action="modifierEvent.php?id_event=<?php echo $tab[0]?>"  method="post"  >

                    <label >Titre de l'evenement:</label>
                    <input  class="form-control" type="text"  name="eventname" value="<?php echo  $tab[1]?>"><br/>
                    <label>Date:</label>
                    <input   class="form-control" type="date" name="date" value="<?php echo  $tab[2]?>"  ><br/>
                    <div >
                        <label><i class="fa fa-users" aria-hidden="true"></i> Category :</label>
                        <select  class="form-control" name="category" value="<?php echo  $tab[6]?>">
                            <option>public</option>
                            <option>private</option>
                        </select>
                    </div>
                    <br/>
                    <label>duration:</label>
                    <input class="form-control" type="text" name="duration" value="<?php echo  $tab[3]?>"><br/>
                        <label>time start:</label>
                        <input class="form-control" type="time" name="starttime" value="<?php echo  $tab[4]?>"><br>
                        <label>time end:</label>
                        <input  class="form-control"type="time" name="endtime" value="<?php echo  $tab[5]?>"><br><br><br>

                    <div class="wthree-text">
                        <div class="clearfix"> </div>
                    </div>
                    <center>
                    <div class="w3ls-submit">
                        <input class="btn btn-success" type="submit" value="register"  >
                    </div>
                    </center>

                </form>
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
<div class="copyrights">
    <p>© 2018 CMD. All Rights Reserved | Design by  <a href="http://CMD.com/" target="_blank">CMD Team</a> </p>
</div>
</body>
</html>