<html lang="en"  dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link  type="text/css"  rel="stylesheet"  href="style.css">

    <script>

        function call(url , data=''  , method='get', dest='content')
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status ==200) {
                    document.getElementById(dest).innerHTML=this.responseText;
                }
            }
            document.getElementById(dest).innerHTML="<div class=pb ><img  src=images/pb2.gif>";
            xhttp.open(method , url , true );
            if(method=='post')
                xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhttp.send(data);
        }
        function show( page , dest='content' )
        {
            call(page , data=''  , method='get', dest );
        }
        function save( frm , dest='content' )
        {
            var data='op=save';
            for(i=0 ; i< frm.elements.length; i++)
                data =data +'&'+ frm.elements[i].name +'=' + frm.elements[i].value;
            call( frm.action , data , 'post',dest );
        }


    </script>



</head>
<body>
    <div  id="header">
    </div>


<div  id="body" >
      <div  id="menu">
            <ul>
                    <h2>اطلاعات کاربر</h2>
                    <li><a href="#"    onclick="show('user/login.php'); return false;"  >    ورود اعضا  </a>  </li>
                    

            </ul>


                    <h2>   سبد خرید </h2>
          <div  id="sabad">

                 <?php   include ("public/buy.php"); ?>

          </div>


      </div>
      <div id="content">
          <h2>     لیست کالاها </h2>
          <hr>

          <form id="kfilter" method="post" action="public/list.php"   onsubmit="save(this,'kalaha'); return false;">


               دسته بندی   :
              <select  name="cid">
                  <option  value="0">---- </option>
                  <?php
                  @include_once("config.php");
                  $res = mysqli_query($conn , "SELECT * FROM  tbl_cat");
                  while($row1 = mysqli_fetch_assoc($res)) {
                      ?>
                      <option    value="<?php  echo $row1['cid'] ?>">  <?php  echo $row1['cname'];  ?></option>
                  <?php  } ?>
              </select>



              برند :

              <select  name="bid">
                  <option value="0">----</option>
                  <?php
                  $res = mysqli_query($conn , "select * from tbl_brand");

                  while($row1 = mysqli_fetch_assoc($res)) {
                      ?>
                      <option    value="<?php  echo $row1['bid']  ?>"> <?php   echo $row1['bname']  ?></option>
                  <?php  } ?>
              </select>

              <input  type="submit"  value=" نمایش کالاها">

          </form>
            <hr>

         <div id="kalaha">
        <?php  include ("public/list.php");  ?>



         </div>
        </div>
        </div>

<div id="footer"> طراحی شذه توسط داغیاران گلستان </div>

</body>
</html>