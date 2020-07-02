<?php
    if(!isset($_SESSION)) {
        session_start();

    }
  if(!isset($_SESSION['uname']))
  {
      echo  "  به این قسمت از سایت اجازه دسترسی ندارید ";
      exit();
  }



?>