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

    $id_product = $_POST["IDPRODUCT"];
    $new_name = $_POST["NAME"];
    $new_trademark = $_POST["TRADEMARK"];
    $new_model = $_POST["MODEL"];
    $new_description = $_POST["DESCRIPTION"];
    $new_image = addslashes(file_get_contents($_FILES["IMAGE"]["tmp_name"]));
    $new_price = $_POST["PRICE"];
    $new_stock = $_POST["STOCK"];

    $users_query = mysqli_query($dbconnection, "UPDATE products SET 
        name = '$new_name', trademark = '$new_trademark', model = '$new_model', description = '$new_description', 
        image = '$new_image', price = '$new_price', stock = '$new_stock' WHERE id = '$id_product'");
    
    header("Location: ../../../index.php?ACTUAL_PAGE=administer");
?>