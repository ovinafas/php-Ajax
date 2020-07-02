<?php    require ("../check.php");    ?>
<?php
include_once("../config.php");
if(isset($_GET['fid']) )
    $fid=$_GET['fid'];
if(isset($_POST['uprice']))
{
    $tid=$_POST['tid'];
    $fid=$_POST['fid'];
    $kid=$_POST['kid'];
    $qty=$_POST['qty'];
    $uprice=$_POST['uprice'];
    if($tid==0)
        $sql="INSERT INTO tbl_item(kid,fid,qty,uprice)
		              VALUES($kid,$fid,$qty,$uprice)";
    else $sql="UPDATE tbl_item SET kid='$kid',fid='$fid',qty='$qty',uprice='$uprice' WHERE tid=$tid;";
    $res=mysqli_query($conn, $sql);
    if($res)
        echo "رکورد با موفقیت ثبت شد";
    else  echo "خطا در ثبت رکورد";
}
if(isset($_GET['op']) && $_GET['op']=='del')
{
    $tid=$_GET['tid'];
    $fid=$_GET['fid'];
    $res=mysqli_query($conn , "DELETE FROM tbl_item WHERE tid=$tid");
}
$etid=0;
if(isset($_GET['op']) && $_GET['op']=='edit')
{
    $etid=$_GET['tid'];
    $fid=$_GET['fid'];
    $res=mysqli_query($conn , "SELECT * FROM tbl_item WHERE tid=$etid");
    $erow=mysqli_fetch_assoc($res);
}

?>

<h2> اقلام فاکتور </h2>


<form method="post" action="factor/items.php" onSubmit="save(this,'items'); return false;">

    <table border="0" width="100%">
        <tbody>
        <tr>
            <th>کد کالا</th>
            <th>نام کالا</th>
            <th>قیمت واحد</th>
            <th>تعداد</th>
            <th>قیمت کل</th>
            <th>
                <a href="" onClick="show('factor/items.php?op=add&fid=<?php echo $fid; ?>' , 'items'); return false;" > افزودن  </a>
            </th>
        </tr>
        <?php if(isset($_GET['op']) && $_GET['op']=='add'): ?>

            <tr>
                <td>
                    <input type="hidden" value="<?php echo $fid; ?>" name="fid">
                    <input type="hidden" value="0" name="tid">
                </td>
                <td>
                    <select name="kid">
                        <option value="0"> --- </option>
                        <?php
                        $res=mysqli_query($conn , "select * from tbl_kala");
                        while($row1=mysqli_fetch_assoc($res)){		   ?>
                            <option value="<?php echo $row1['kid'];?>"><?php echo $row1['kname'];?></option>
                        <?php } ?>
                    </select>
                </td>
                <td><input type="text" name="uprice" ></td>
                <td>
                    <input type="text" name="qty" >
                </td>
                <td>-</td>
                <td>
                    <input type="submit" name="ok" value="ثبت"
                </td>


            </tr>


        <?php
        endif;
        $res=mysqli_query($conn ,
            "select I.*,K.kname 
						from tbl_item as I,tbl_kala as K
						where I.fid=$fid and I.kid=K.kid");
        while($row=mysqli_fetch_assoc($res)){
            if($row['tid']==$etid) {	  ?>
                <tr>


                    <td>
                        <input type="hidden" value="<?php echo $fid; ?>" name="fid">
                        <input type="hidden" value="<?php echo $row['tid']; ?>" name="tid">

                    </td>


                    <td>
                        <select name="kid">
                            <option value="0"> --- </option>
                            <?php
                            $res=mysqli_query($conn , "select * from tbl_kala");
                            while($row1=mysqli_fetch_assoc($res)){		   ?>
                                <option <?php if($row['kid']==$row1['kid']) echo "selected"; ?> value="<?php echo $row1['kid'];?>"><?php echo $row1['kname'];?></option>
                            <?php } ?>

                        </select>


                    </td>



                    <td><input type="text" name="uprice" value="<?php echo $row['uprice']; ?>"></td>
                    <td>
                        <input type="text" name="qty" value="<?php echo $row['qty']; ?>">
                    </td>
                    <td>-</td>
                    <td>
                        <input type="submit" name="ok" value="ثبت"
                    </td>


                </tr>
            <?php  } else {   ?>
                <tr>
                    <td><?php echo $row['kid']; ?></td>
                    <td><?php echo $row['kname']; ?></td>
                    <td><?php echo $row['uprice']; ?></td>
                    <td><?php echo $row['qty']; ?></td>
                    <td><?php echo $row['uprice']*$row['qty']; ?></td>
                    <td>
                        <a href="" onClick="show('factor/items.php?op=edit&fid=<?php echo $fid; ?>&tid=<?php echo $row['tid']; ?>' , 'items'); return false;" > ویرایش  </a>
                        | <a href="" onClick="show('factor/items.php?op=del&fid=<?php echo $fid; ?>&tid=<?php echo $row['tid']; ?>' , 'items'); return false;"> حذف  </a>
                    </td>
                </tr>
            <?php }
        } ?>
        </tbody>
    </table>
</form>