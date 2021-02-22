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

    $id_delete = $_POST["IDBILL"];

    mysqli_query($dbconnection, "DELETE FROM bills WHERE id = '$id_delete'");    

    header("Location: ../../../index.php?ACTUAL_PAGE=administer");
?>