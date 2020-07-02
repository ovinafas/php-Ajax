<?php    require ("../check.php");    ?>
  <h2>   لیست کاربران  </h2>
  <hr>

  <a  href="" onClick="show('user/add.php'); return false;" >
      افزودن کالا </a>
  <br><br>

    <table width="100%"  border="0">
         <tbody>
                 <tr>
                        <th width="122">کد کاربر</th>
                        <th width="402">نام کاربر</th>
                         <th width="402">نام کاربری</th>
                        <th width="122"> پست الکترونیکی </th>
                         <th width="54">&nbsp;</th>

                 </tr>
             <?php
                    require("../config.php");
                    $res = mysqli_query($conn , "select * from tbl_user");
                    while($row = mysqli_fetch_assoc($res)) {
            ?>
                 <tr>
                       <td><?php echo $row['uid'];  ?></td>
                        <td><?php echo $row['name']; ?></td>
                       <td><?php echo $row['uname']; ?></td>
                       <td><?php echo $row['email']; ?></td>


                        <td>
                                 <a href=""  onclick="show('user/pass.php?uid=<?php echo  $row['uid']; ?>'); return false;"  > تغیر کلمه عبور</a>
                               | <a href=""  onclick="show('user/edit.php?uid=<?php echo  $row['uid']; ?>'); return false;"  > ویرایش</a>
                               | <a href=""  onclick="show('user/delete.php?uid=<?php echo  $row['uid']; ?>'); return false;"> حذف </a>
                    
                         </td>
                 </tr>


                    <?php } ?>       



         </tbody>

    </table>


