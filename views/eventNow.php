<?php
            include "../core/eventsC.php";
            $ec = new eventsC() ;
            $liste = $ec->display();
            foreach ($liste as $key =>$value ) {
                echo '<tr>';
                echo  '<h4>'. $value['eventname'] .'</h4>';
                echo '</tr>';
            }
            ?>