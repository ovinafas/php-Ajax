<?php  session_start() ;  ?>
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
            document.getElementById(dest).innerHTML="<div class=pb ><img  src=images/pb.gif>";
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
       <?php   if(isset($_SESSION['name'])){   ?>
          کاربر جاری :
          <?php    echo $_SESSION['name'];  ?>

          <?php  }    ?>

                    <h2>اطلاعات کاربر</h2>
          <?php        ?>
          <ul>
                    <li><a href="#"  onclick="show('user/editm.php'); return false; "  >     ویرایش مشخصات </a>  </li>
                    <li><a href="#"  onclick="show('user/passm.php'); return false; " >    تغیر کلمه عبور </a></li>
                    <li><a href=" user/logout.php ">   خروج از سیستم</a></li>

            </ul>

            <ul>
                    <h2> اطلاعات پایه</h2>
                    <li> <a href="#" onclick="show('cat/list.php'); return false; ">مدیریت دسته ها</a></li>
                    <li><a href="#"  onclick="show('brand/list.php'); return false;"> مدیریت برندها</a></li>
                    <li><a href="#"  onclick="show('kala/list.php'); return false; "> مدیریت کالاها</a></li>
                     <li><a href="#" onclick="show('factor/list.php'); return false;">  مدیریت فاکتورها</a></li>
                    <li><a href="#"  onclick="show('user/list.php'); return false;">  مدیریت کاربران </a></li>

            </ul>







      </div>
      <div id="content">
          <br><br><br>
            <h2  align="center">  فروشگاه اینترنتی </h2>
            <h1 align="center">   طراحی شذه توسط داغیاران گلستان </h1>
            <h3 align="center">   طراحی بر اساس مبتی ای جکس</h3>
            <h4  align="center"> <a href="http://ovinafas@yahoo.com"> Daghyaran Golestan</a></h4>



</div>
</div>

<div id="footer"> طراحی شذه توسط داغیاران گلستان </div>

</body>
</html>