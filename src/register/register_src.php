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
           
    $new_id = generate_new_id($dbconnection);
    $new_username = $_POST["USERNAME"];
    $new_email = $_POST["EMAIL"];
    $new_password = $_POST["PASSWORD"];
    $repeat_password = $_POST["REPEATPASSWORD"];

    $insert_query = "INSERT INTO users (id, username, email, passwrd) VALUES ('$new_id', '$new_username', '$new_email', '$new_password')";
    $select_query = "SELECT id FROM users WHERE username = '".$new_username."' and passwrd = '".$new_password."'";

    if($new_password == $repeat_password) {
        mysqli_query($dbconnection, $insert_query);
        
        unset($_SESSION["TYPE_SUCCESS"]);
        unset($_SESSION["MSG_SUCCESS"]);

        $_SESSION["TYPE_SUCCESS"] = "Registro";
        $_SESSION["MSG_SUCCESS"] = "Se ha registrado con éxito.";

        header("Location: ../../index.php?ACTUAL_PAGE=success");

    }else{
        $_SESSION["TYPE_ERROR"] = "Fallo registro";
        $_SESSION["MSG_ERROR"] = "Las contraseñas no coinciden. Inténtelo de nuevo";
        header("Location: ../../index.php?ACTUAL_PAGE=error");
    } 
 
?>


<?php 
    function generate_new_id($dbconnection){
        $number_id = 0;
        $results = mysqli_query($dbconnection, "SELECT id FROM users");
        if(mysqli_num_rows($results) > 0){
            while ($row = mysqli_fetch_assoc($results)){
                $last_id = $row['id'];
                $new_number_id = intval(substr($last_id, 1));
                if($new_number_id > $number_id){
                    $number_id = $new_number_id;
                }
            }
            $new_id = "U".($number_id+1);
        }else{
            $new_id = "U0";
        }
        
        return $new_id;
    }
?>