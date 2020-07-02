 <!-- <h2>   لیست دسته بندی ها  </h2>  -->

    <table width="100%"  border="0">
         <tbody>
                 <tr>
                        <th width="122">کد کالا</th>
                        <th width="402">نام کالا</th>
                        <th width="122">  دسته بندی</th>
                        <th width="122"> برند</th>
                        <th width="122"> قیمت</th>
                        <th width="54">&nbsp;</th>

                 </tr>
             <?php
                    @include_once("config.php");
                    @include_once("../config.php");

                    $cats = getList("tbl_cat" , "cid" , "cname");
                    $brands = getList("tbl_brand","bid","bname");


                    $sql = "select * from tbl_kala  where 1=1";
                    if(isset($_POST['cid'])  &&  $_POST['cid'] !=0)
                    {
                        $sql .= " AND cid =".$_POST['cid'];
                    }
                    if(isset($_POST['bid']) && $_POST['bid'] !=0)
                    {
                        $sql .= " sAND bid =".$_POST['bid'];
                    }


                    $res = mysqli_query($conn , $sql);
                    while($row = mysqli_fetch_assoc($res)) {
            ?>
                 <tr>
                       <td><?php echo $row['kid'];  ?></td>
                        <td><?php echo $row['kname']; ?></td>

                     <td> <?php  if(isset( $cats[$row['cid']]))

                         echo  $cats[$row['cid']];
                       else echo " نامشخص ";
                         ?></td>

                     <td> <?php  if(isset( $brands[$row['bid']]))

                             echo  $brands[$row['bid']];
                         else echo " نامشخص ";
                         ?></td>


                       <td><?php echo $row['price']; ?></td>

                        <td>   
                                <a href=""  onclick="show('public/det.php?kid=<?php echo  $row['kid']; ?>'); return false;"  > جزئیات</a>
                                <a href=""  onclick="show('public/buy.php?kid=<?php echo  $row['kid']; ?>','sabad'); return false;"> خرید </a>
                    
                         </td>
                 </tr>


                    <?php } ?>



         </tbody>

    </table>


