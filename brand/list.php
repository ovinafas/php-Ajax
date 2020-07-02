<?php    require ("../check.php");    ?>
<h2>   افزودن برند   </h2>

<a  href="" onClick="show('brand/add.php'); return false;" >
    افزودن برند </a>


<hr>
<br> <br>
    <table width="100%"  border="0">
         <tbody>
                 <tr>
                        <th width="120">کد برند</th>
                        <th width="202">نام برند</th>
                         <th width="202">نام کشور</th>
                         <th width="54">&nbsp;</th>


                 </tr>
             <?php
                    require("../config.php");
                    $res = mysqli_query($conn , "select * from tbl_brand");
                    while($row = mysqli_fetch_assoc($res)) {
            ?>
                 <tr>
                       <td><?php echo $row['bid'];  ?></td>
                        <td><?php echo $row['bname']; ?></td>
                       <td><?php echo $row['country']; ?></td>
                        <td>   
                                <a href=""    onclick="show('brand/edit.php?bid=<?php echo  $row['bid']; ?>'); return false;" > ویرایش</a>
                                <a href=""  onclick="show('brand/delete.php?bid=<?php echo  $row['bid']; ?>'); return false;"> حذف </a>
                    
                         </td>
                 </tr>


                    <?php } ?>       



         </tbody>

    </table>

