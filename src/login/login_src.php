<?php
   $dbhost = "localhost";
   $dbusername = "root";
   $dbpassword = "root";
   $dbname = "infodeo";
   
   $dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);

   if(!$dbconnection) {
      die("No hat conexión: ".mysqli_connect_error());
   }
   
   session_start(); 

   $myusername = $_POST["USERNAME"];
   $mypassword = $_POST["PASSWORD"];

   $query = mysqli_query($dbconnection, "SELECT id FROM users WHERE username = '".$myusername."' and passwrd = '".$mypassword."'");
   $nr = mysqli_num_rows($query);
   echo("<script>alert('hola');</script>");
   if($nr == 1){
      $dbrow = mysqli_fetch_row($query);

      unset($_SESSION['logged_in_user_id']);
      unset($_SESSION['logged_in_username']);

      $_SESSION['logged_in_user_id'] = $dbrow[0];
      $_SESSION['logged_in_username'] = $myusername;

      header("Location: ../../index.php?ACTUAL_PAGE=catalogue");
   }
   else{
      $_SESSION["TYPE_ERROR"] = "Fallo autenticación";
      $_SESSION["MSG_ERROR"] = "El usuario o contraseña son incorrectos";
      header("Location: ../../index.php?ACTUAL_PAGE=error");
   }

   
   
?>
