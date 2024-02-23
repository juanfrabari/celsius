<?php 
//$url=$_SERVER['REQUEST_URI'];
session_start();
if (isset($_SESSION['us']) ) 
{
     if (!isset($_SESSION['tiempo'])) {  $_SESSION['tiempo']=time(); }
     else if (time() - $_SESSION['tiempo'] > 3000) {   //1200 seg = 20 minutos
         session_destroy();
                  ?>
                <script type="text/javascript">
                  //window.location.assign("index.php");
                  //window.location.assign("https://mail.google.com/mail/u/0/?logout&hl=es");
                  window.location.assign("pages/examples/login.html?error=1"); 
                  //alert("Caduco la Sesion");
                </script>
                <?php 
         die();  
     }
     $_SESSION['tiempo']=time(); //Si hay actividad seteamos el valor al tiempo actual
}
 
 ?>