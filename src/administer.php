<?php                    
   $dbhost = "localhost";
   $dbusername = "root";
   $dbpassword = "";
   $dbname = "infodeo";
   
   $dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
   
   if(!$dbconnection) {
       die("No hat conexión: ".mysqli_connect_error());
   } 
   
   if(!isset($_SESSION['logged_in_username']))
        header("Panel: access_denied.php");
      	
    else if(($_SESSION['logged_in_username'] != "admin"))
      	header("Panel: access_denied.php");
?>

<div class = "row" style = "padding-top: 15px; padding-left: 30px ; padding-right: 30px;">

    <div class = "col-12">
        <h3 class = "display-2 text-center">Administrar</h3>
        <hr width = "75%"/>
        <br/>
    </div>
    
    <?php include("crud/users/administer_users.php");?>

    <?php include("crud/products/administer_products.php");?>

    <?php include("crud/bills/administer_bills.php");?>

</div>

	