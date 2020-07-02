<?php

       $conn = mysqli_connect("localhost","root","","eshop");
       mysqli_query($conn,"set  names utf8");


       function getList($tbl , $id , $name)
       {
           global  $conn;
           $res = mysqli_query($conn,"select * from $tbl");
            $list=[];
            while ($row = mysqli_fetch_assoc($res))
            {
                $list[$row[$id]] = $row[$name];
            }

            return $list;


       }

?>