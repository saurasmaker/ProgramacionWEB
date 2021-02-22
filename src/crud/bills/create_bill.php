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

    $id_bill = generate_new_id($dbconnection);
    $dateBuy = date('Y/m/d Th:i:s', strtotime($_POST['DATEBUY'])); //Convierte el string a formato de fecha
    $idProduct = $_POST["IDPRODUCT"];
    $idUser = $_POST["IDUSER"];
    $sendingAddress = $_POST["SENDINGADDRESS"];

    mysqli_query($dbconnection, "INSERT INTO bills (id, idProduct, idUser, sendingAddress) 
        values ('$id_bill', '$idProduct', '$idUser', '$sendingAddress')");
    
    header("Location: ../../../index.php?ACTUAL_PAGE=administer");
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
            $new_id = "B".($number_id+1);
        }else{
            $new_id = "B0";
        }
        return $new_id;
    }
?>