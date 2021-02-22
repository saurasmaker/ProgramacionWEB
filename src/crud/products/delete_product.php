<?php
    $dbhost = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "infodeo";
    
    $dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
    
    if(!$dbconnection) {
        die("No hay conexión: ".mysqli_connect_error());
        echo("No hay conexión.");
    } 
    
    if(!isset($_SESSION['logged_in_username'])){
        header("Panel: access_denied.php");
    }
           
    else if(($_SESSION['logged_in_username'] != "admin")){
        header("Panel: access_denied.php");
    }

    

    $id_delete = $_POST["IDPRODUCT"];

    mysqli_query($dbconnection, "DELETE FROM products WHERE id = '$id_delete'");    
    $products_query = mysqli_query($dbconnection, "SELECT * FROM products WHERE id = '$id_delete'");
    if($products_query != null && mysqli_fetch_assoc($products_query)["id"]!=null){
        session_start();
        $_SESSION["TYPE_ERROR"] = "Error en la base de datos. ";
        $_SESSION["MSG_ERROR"] = "NO se puede eliminar un producto si tiene facturas asociadas a él. Para eliminar este producto debe eliminar antes todas las facturas relacionadas.";
        header("Location: ../../../index.php?ACTUAL_PAGE=error");
    }else{
        header("Location: ../../../index.php?ACTUAL_PAGE=administer");
    }
 
?>