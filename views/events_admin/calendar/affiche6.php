<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 3/28/18
 * Time: 13:12
 */

require "/Users/macbook/Downloads/untitled1/database.php";
$result=$pdo->query("SELECT * FROM event WHERE (date BETWEEN  '2018/06/01' AND  '2018/06/30') ");

while($row=$result->fetch()){;
    echo"<details>";
    echo"<summary>&nbsp&nbsp".$row['eventname'];
    echo"</strong></summary><ul>";
    //date
    echo '<span style="font-weight : bold;">&nbspDate:&nbsp&nbsp</span>'.$row['date'] ;
    echo"<br /><br />";;
    //duration
    echo '<span style="font-weight : bold;">&nbspDuration:&nbsp&nbsp</span>';
    echo "".$row['duration'] ;
    echo"&nbspDay(s)";
    echo"<br /><br />";
    echo '<span style="font-weight : bold;">&nbspTime:&nbsp&nbsp</span>';
    echo "From&nbsp".$row['starttime'] ;
    echo "&nbsp&nbspTo&nbsp&nbsp".$row['endtime'] ;
    echo"<br /><br />";


    // category
    echo '<span style="font-weight : bold;">&nbspCategory:&nbsp&nbsp</span>';
    echo "".$row['category'] ;
    echo"<br /><br />";
    ?>
    <br /><br />

    <script type="text/javascript">var switchTo5x=true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "ef8d1f47-6408-4556-ab6c-9e221d6dd140", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
    <span class='st_facebook' displayText='Facebook'></span>
    <span class='st_twitter' displayText='Tweet'></span>
    <span class='st_googleplus' displayText='Google +'></span>
    <span class='st_email' displayText='Email'></span>
    <span class='st_' displayText=''></span>
    <?php
    echo"<br /><br />";
    echo"
			</ul>	
				</details>";
}
?>
