<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 4/21/18
 * Time: 20:58
 */
$connect = mysqli_connect('localhost', 'root', 'PASSWORD', 'users');
$query = "SELECT id_event,eventname,category,date FROM event ORDER BY date DESC";
$result = mysqli_query($connect, $query);
 ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin aux champs elysees</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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

            <div class="inner-block">

                <div class="container" style="width:700px;" align="center">
                    <h3 class="text-center">Mes evenements filtrés</h3><br />
                    <div class="table-responsive" id="employee_table">
                        <table class="table table-bordered">
                            <tr>
                                <th class="btn-warning"><a class="column_sort" id="id" data-order="desc" href="#">id_event</a></th>
                                <th class="btn-warning"><a class="column_sort" id="eventname" data-order="desc" href="#">eventname</a></th>
                                <th class="btn-warning"><a class="column_sort" id="category" data-order="desc" href="#">category</a></th>
                                <th class="btn-warning"><a class="column_sort" id="date" data-order="desc" href="#">date</a></th>

                            </tr>
                            <?php
                            while($row = mysqli_fetch_array($result))
                            {
                                ?>
                                <tr>
                                    <td ><?php echo $row["id_event"]; ?></td>
                                    <td ><?php echo $row["eventname"]; ?></td>
                                    <td ><?php echo $row["category"]; ?></td>
                                    <td><?php echo $row["date"]; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <br />
</body>
</html>
<script>
    $(document).ready(function(){
        $(document).on('click', '.column_sort', function(){
            var column_name = $(this).attr("id");
            var order = $(this).data("order");
            var arrow = '';
            //glyphicon glyphicon-arrow-up
            //glyphicon glyphicon-arrow-down
            if(order == 'desc')
            {
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';
            }
            else
            {
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';
            }
            $.ajax({
                url:"eventTri.php",
                method:"POST",
                data:{column_name:column_name, order:order},
                success:function(data)
                {
                    $('#employee_table').html(data);
                    $('#'+column_name+'').append(arrow);
                }
            })
        });
    });
</script>
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
                        <li id="menu-mensagens" ><a href="addevent.html">Ajouter evenement</a></li>
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
