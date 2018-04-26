<?php
//sort.php
$connect = mysqli_connect("localhost", "root", "PASSWORD", "users");
$output = '';
$order = $_POST["order"];
if($order == 'desc')
{
    $order = 'asc';
}
else
{
    $order = 'desc';
}
$query = " SELECT id_event,eventname,category,date FROM event ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";
$result = mysqli_query($connect, $query);
$output .= '  
 <table class="table table-bordered">  
      <tr>  
           <th class="btn-warning"><a class="column_sort" id="id" data-order="'.$order.'" href="#">id_event</a></th>  
           <th class="btn-warning"><a class="column_sort" id="eventname" data-order="'.$order.'" href="#">eventname</a></th>  
           <th class="btn-warning"><a class="column_sort" id="category" data-order="'.$order.'" href="#">category</a></th>  
           <th class="btn-warning"><a class="column_sort" id="date" data-order="'.$order.'" href="#">date</a></th>  
      </tr>  
 ';

while($row = mysqli_fetch_array($result))
{
    $output .= '  
      <tr>  
           <td>' . $row["id_event"] . '</td>  
           <td>' . $row["eventname"] . '</td>  
           <td>' . $row["category"] . '</td>  
           <td>' . $row["date"] . '</td>  
      </tr>  
      ';
}
$output .= '</table>';
echo $output;
?>