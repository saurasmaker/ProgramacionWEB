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

    $id_bill = $_POST['IDBILL'];
    $dateBuy = $_POST['DATEBUY'];
    $idProduct = $_POST["IDPRODUCT"];
    $idUser = $_POST["IDUSER"];
    $sendingAddress = $_POST["SENDINGADDRESS"];

    mysqli_query($dbconnection, "UPDATE bills SET dateBuy = '$dateBuy', idProduct = '$idProduct', 
        idUser = '$idUser', sendingAddress = '$sendingAddress'  WHERE id = '$id_bill'");
    
    header("Location: ../../../index.php?ACTUAL_PAGE=administer");
?>