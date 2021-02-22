<?php
    $dbhost = "localhost";
    $dbusername = "root";
    $dbpassword = "";
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
       
    $new_id = generate_new_id($dbconnection);
    $new_name = $_POST["NAME"];
    $new_trademark = $_POST["TRADEMARK"];
    $new_model = $_POST["MODEL"];
    $new_description = $_POST["DESCRIPTION"];
    $new_image = addslashes(file_get_contents($_FILES["IMAGE"]["tmp_name"]));
    $new_price = $_POST["PRICE"];
    $new_stock = $_POST["STOCK"];

    mysqli_query($dbconnection, "INSERT INTO products (id, name, trademark, model, description, image, price, stock) 
    VALUES ('$new_id', '$new_name', '$new_trademark', '$new_model', '$new_description', '$new_image', '$new_price', '$new_stock')");    
    
    header("Location: ../../../index.php?ACTUAL_PAGE=administer");
?>


<?php 
    function generate_new_id($dbconnection){
        $number_id = 0;
        $results = mysqli_query($dbconnection, "SELECT id FROM products");
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)){
                $last_id = $row['id'];
                $new_number_id = intval(substr($last_id, 1));
                if($new_number_id > $number_id){
                    $number_id = $new_number_id;
                }
            }
            $new_id = "P".($number_id+1);
        }else{
            $new_id = "P0";
        }
        return $new_id;
    }
?>