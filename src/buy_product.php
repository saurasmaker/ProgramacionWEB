<?php
    session_start();
    
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
       
    $new_id = generate_new_id($dbconnection);
    $idProduct = $_POST["IDPRODUCT"];
    $idUser = $_POST["IDUSER"];

    mysqli_query($dbconnection, "INSERT INTO bills (id, idProduct, idUser) VALUES ('$new_id', '$idProduct', '$idUser')");
    mysqli_query($dbconnection, "UPDATE products SET stock = ((SELECT stock FROM products WHERE id = '$idProduct')-1) WHERE id = '$idProduct'");

    $_SESSION['IDBILL'] = $new_id;
    
    header("Location: ../../index.php?ACTUAL_PAGE=purchase_realized");
?>


<?php 
    function generate_new_id($dbconnection){
        $number_id = 0;
        $results = mysqli_query($dbconnection, "SELECT id FROM bills");
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)){
                $last_id = $row['id'];
                $new_number_id = intval(substr($last_id, 1));
                if($new_number_id > $number_id){
                    $number_id = $new_number_id;
                }
            }
            echo $number_id."\n ";
            $new_id = "B".($number_id+1);
            echo $new_id;
        }else{
            $new_id = "B0";
        }
        return $new_id;
    }
?>