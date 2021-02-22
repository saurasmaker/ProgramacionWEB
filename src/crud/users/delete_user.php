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

    $id_delete = $_POST["IDUSER"];

    if(mysqli_query($dbconnection, "DELETE FROM users WHERE id = '$id_delete'")){
        echo '<script> alert("Usuario eliminado")</script>';
    }

    mysqli_query($dbconnection, "DELETE FROM users WHERE id = '$id_delete'");    
    $products_query = mysqli_query($dbconnection, "SELECT * FROM users WHERE id = '$id_delete'");
    if($products_query != null && mysqli_fetch_assoc($products_query)["id"]!=null){
        session_start();
        $_SESSION["TYPE_ERROR"] = "Error en la base de datos. ";
        $_SESSION["MSG_ERROR"] = "NO se puede eliminar un usuario si tiene facturas asociadas a él. Para eliminar este usuario debe eliminar antes todas las facturas relacionadas.";
        header("Location: ../../../index.php?ACTUAL_PAGE=error");
    }else{
        header("Location: ../../../index.php?ACTUAL_PAGE=administer");
    }
?>