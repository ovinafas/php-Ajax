 <?php    require ("../check.php");    ?>
  <h2>   لیست دسته بندی ها  </h2>
  <hr>
  
  <a  href="" onClick="show('cat/add.php'); return false;" >
     افزودن دسته </a>
  <br><br>
    <table width="100%"  border="0">
         <tbody>
                 <tr>
                        <th width="122">کد دسته</th>
                        <th width="402">نام دسته</th>
                        <th width="54">&nbsp;</th>

                 </tr>
             <?php
                    require("../config.php");
                    $res = mysqli_query($conn , "select * from tbl_cat");
                    while($row = mysqli_fetch_assoc($res)) {
            ?>
                 <tr>
                       <td><?php echo $row['cid'];  ?></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td>   
                                <a href=""  onclick="show('cat/edit.php?cid=<?php echo  $row['cid']; ?>'); return false;"  > ویرایش</a>
                                <a href=""  onclick="show('cat/delete.php?cid=<?php echo  $row['cid']; ?>'); return false;"> حذف </a>
                    
                         </td>
                 </tr>


                    <?php } ?>       



         </tbody>

    </table>


