<?php
    $dbhost = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "infodeo";
    
    $dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
    
    if(!$dbconnection) {
        die("No hat conexión: ".mysqli_connect_error());
    } 
    
    if(!isset($_SESSION['logged_in_username'])){
        header("Panel: access_denied.php");
    }
           
    else if(($_SESSION['logged_in_username'] != "admin")){
        header("Panel: access_denied.php");
    }

    $dbhost = "localhost";
    $dbusername = "root";
    $dbpassword = "root";
    $dbname = "infodeo";
   
    $dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
   
    if(!$dbconnection) {
       die("No hat conexión: ".mysqli_connect_error());
    } 
   
    if(!isset($_SESSION['logged_in_username']))
        header("Panel: access_denied.php");
      	
    else if(($_SESSION['logged_in_username'] != "admin"))
          header("Panel: access_denied.php");
       
    $id = $_POST["IDUSER"];
    $new_username = $_POST["USERNAME"];
    $new_email = $_POST["EMAIL"];
    $new_password = $_POST["PASSWORD"];

    if(mysqli_query($dbconnection, "UPDATE users SET username = '$new_username', email = '$new_email', passwrd = '$new_password' WHERE id = '$id'")){
        echo '<script>alert("Usuario actualizado")</script>';
    }
    
    header("Location: ../../../index.php?ACTUAL_PAGE=administer");
?>