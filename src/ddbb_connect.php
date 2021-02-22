<?php
function ddbb_connect(){
    session_start();
        
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

    return $dbconnection;
}
?>