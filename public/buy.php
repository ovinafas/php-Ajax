<?php
session_start();
@include_once ("../config.php");
@include_once ("config.php");

if(isset($_GET['kid'])) {
    $kid = $_GET['kid'];

    if (!isset($_SESSION['sabad'][$kid]))
        $_SESSION['sabad'][$kid] = 1;
  }

     if(isset($_SESSION['sabad']) &&  count($_SESSION['sabad']) >0 )
     {
       $temp = array_keys($_SESSION['sabad']);
       $kids = implode(",",$temp);

       $sql = " SELECT * FROM tbl_kala WHERE kid  in  ($kids)";
       $res = mysqli_query($conn , $sql);
       echo "<ul>";
       $k=0;
       while($row =mysqli_fetch_assoc($res)){
           $k++;
           echo "<li>$k-". $row['kname']."(".  $_SESSION['sabad'][$row['kid']]    ." تعداد)";

           ?>

           <a href=""  onclick="show('public/canc.php?kid=<?php  echo $row['kid']; ?>','sabad'); return false;"  > حذف</a>

           </li>

   <?php
       }

     echo "</ul>";

  ?>



         <a href=""  onclick="show('public/sabad.php'); return false;">نمایش سبد خرید </a>


<?php   } else

                   echo " سبد خرید شما خالی هست   ";

     ?>



