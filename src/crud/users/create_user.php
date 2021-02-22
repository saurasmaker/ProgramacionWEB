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
           
    $new_id = generate_new_id($dbconnection);
    $new_username = $_POST["USERNAME"];
    $new_email = $_POST["EMAIL"];
    $new_password = $_POST["PASSWORD"];

    if(mysqli_query($dbconnection, "INSERT INTO users (id, username, email, passwrd) VALUES ('$new_id', '$new_username', '$new_email', '$new_password')")){
        echo '<script> alert("Usuario creado")</script>';
    }
    
    header("Location: ../../../index.php?ACTUAL_PAGE=administer");
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

