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
    <!--skycons-icons-->
    <script src="js/skycons.js"></script>
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
                <!--market updates updates-->
                <div class="market-updates">
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-1">
                            <div class="col-md-8 market-update-left">
                                <h3> <?php
                                    include "../core/fidelitec.php" ;
                                    ?>
                                    <h3><?php
                                        $cuo=new userC();
                                        $a =$cuo->countUser();
                                        echo $a;
                                        ?>
                                </h3>
                                <h4>Registered User</h4>
                                <p>Other hand, we denounce</p>
                            </div>
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-file-text-o"> </i>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-2">
                            <div class="col-md-8 market-update-left">
                            <?php
                                if(isset($_POST['search'])){
                                    $pdo = config::getConnexion();
                                    $searchq = $_POST['search'];
                                    $query = $pdo->prepare("SELECT * from user where nom = ? OR email = ?") ;
                                    $query->execute(array($searchq,$searchq));
                                    $count = $query->rowCount();
                                    $row=$query->fetch();
                                    if($count == 0){
                                        echo  'there was no search results';
                                    } else{

                                        $fname = $row['nom'];
                                        $lname = $row['email'];
                                        $id = $row['id'];
                                        echo '<h3>'  .$id. '</h3>';
                                        echo '<h4> '.$fname. '</h4>'  ;
                                        echo '<h5>' .$lname. '</h5>'  ;
                                    }
                                }
                                ?>
                                <p>Nos clients</p>
                            </div>
                            <div class="col-md-4 market-update-right">
                                <i class="fa fa-eye"> </i>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <div class="col-md-4 market-update-gd">
                        <div class="market-update-block clr-block-1">
                            <div class="col-md-8 market-update-left">

                                    <h3><?php
                                        $ec = new userC() ;
                                        $liste = $ec->CountVisit() ;
                                        echo $liste;
                                        ?>

                                    </h3>
                                    <h5>nbre de visites aujourd'hui</h5>
                                    <?php
                                    $ec = new userC() ;
                                    $liste = $ec->connecteNow() ;
                                    echo $liste;?>
                                    <h4>connected now</h4>

                            </div>
                                <div class="col-md-4 market-update-right">
                                    <i class="fa fa-file-text-o"> </i>
                             </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                             </div>
                                <div class="wrapper-flex">

                                    <?php
                                    $ec = new fidelitec() ;
                                    $liste = $ec->afficher() ;
                                    ?>
                                    <table class="table table-striped table-bordered">

                                        <?php
                                        echo'<tr>';
                                        echo '<th class="btn-warning">'.'id_carte'.'</th>';
                                        echo '<th class="btn-warning">'.'id'.'</th>';
                                        echo '<th class="btn-warning">'.'anniv'.'</th>';
                                        echo '<th class="btn-warning">'.'date_m'.'</th>';
                                        echo '<th class="btn-warning">'.'situa'.'</th>';
                                        echo '<th class="btn-warning">'.'nbre_enf'.'</th>';
                                        echo '<th class="btn-warning">'.'points'.'</th>';
                                        echo '<th class="btn-warning">'.'action'.'</th>';
                                        echo'</tr>';
                                        echo'<tr>';
                                        foreach ($liste as $key =>$value )
                                        {
                                            echo'<tr>';

                                            echo '<td>'.$value['id_carte'].'</td>';
                                            echo '<td>'.$value['id'].'</td>';
                                            echo '<td>'.$value['anniversaire'].'</td>';
                                            echo '<td>'.$value['date_m'].'</td>';
                                            echo '<td>'.$value['situation_a'].'</td>';
                                            echo '<td>'.$value['nbre_enfants'].'</td>';
                                            echo '<td>'.$value['points'].'</td>';
                                            ?>


                                            <td><a class="btn btn-danger" href="../views/supprimeCarte.php?id_carte=<?php echo $value['id_carte']
                                                ?>" ><span class="glyphicon glyphicon-remove"></span>supprimer</a></td>

                                            <?php
                                            echo'</tr>';

                                        }

                                        echo'</tr>';
                                        ?>

                                    <div class="col geo_main">
<!--------------------------------------Affichage des abonnes avec suprisson-------------------------------->
                                        <div id="geoChart" class="chart"> </div>
                                        <h3 >Les abonnees et les cartes </h3>
                                        <?php
                                        $uc = new userC() ;
                                        $liste = $uc->afficher1() ;
                                                 ?>
                                        <table class="table table-striped table-bordered" onresize="MediaList">

                                            <?php
                                            echo'<tr>';
                                            echo '<th class="btn-warning">'.'id'.'</th>';
                                            echo '<th class="btn-warning">'.'nom'.'</th>';
                                            echo '<th class="btn-warning">'.'email'.'</th>';
                                            echo '<th class="btn-warning">'.'gender'.'</th>';
                                            echo '<th class="btn-warning">'.'adresse'.'</th>';
                                            echo '<th class="btn-warning">'.'telephone'.'</th>';
                                            echo '<th class="btn-warning">'.'favoris'.'</th>';
                                            echo '<th class="btn-warning">'.'action'.'</th>';
                                            echo '<p>Print tous le tableau des clients:
                                                    <a href="../views/pdfUsers.php" class="btn btn-success btn-lg">
                                                <span class="glyphicon glyphicon-print"></span> Print 
                                                </a>
                                            </p> ';
                                            echo'</tr>';
                                            echo'<tr>';
                                            foreach ($liste as $key =>$value )
                                            {
                                                echo'<tr>';
                                                echo '<td>'.$value['id'].'</td>';
                                                echo '<td>'.$value['nom'].'</td>';
                                                echo '<td>'.$value['email'].'</td>';
                                                echo '<td>'.$value['gender'].'</td>';
                                                echo '<td>'.$value['adresse'].'</td>';
                                                echo '<td>'.$value['telephone'].'</td>';
                                                echo '<td>'.$value['favoris'].'</td>';?>
                                                <td><a class="btn btn-danger" href="../views/supprimerUser.php?id=<?php echo $value['id']
                                                    ?>" ><span class="glyphicon glyphicon-remove"></span>supprimer</a></td>

                                                <?php
                                                echo'</tr>';

                                            }

                                            echo'</tr>';
                                            ?>




                                        </table>
                                    </div>
                                </div>
                             </div>
                <div class="chart-layer-2">
                    <div class="col-md-6 chart-layer2-left">

                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
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
                        <li id="menu-mensagens" ><a href="../views/addevent.html">Ajouter evenementt</a></li>
                        <li id="menu-mensagens" ><a href="../views/affiche_event.php">Affichage des evenements recents</a></li>
                        <li id="menu-mensagens" ><a href="../views/affiche_eventTri.php">affichage des evenements filtrés</a></li>
                        <li id="menu-mensagens" ><a href="../views/calendarAdmin.php">Historique evenements 2018/2019</a></li>
                    </ul>
                </li>

            </ul>
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
    </div>

</body>
<div class="copyrights">
    <p>© 2018 CMD. All Rights Reserved | Design by  <a href="http://CMD.com/" target="_blank">CMD Team</a> </p>
</div>
</html>