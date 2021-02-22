<div class = "row" style = "padding-top: 15px; padding-left: 30px ; padding-right: 30px;">
	
	<div class = "col-12">
		<h3 class = "display-2 text-center">Catálogo</h3>
		<hr width = "50%"/>
		<br/>
	</div>
    
    <?php

        function search($a, $b){
            if(strpos($a, $b)===false){
                return false;
            }else{
                return true;
            }
        }

        $dbhost = "localhost";
        $dbusername = "root";
        $dbpassword = "root";
        $dbname = "infodeo";
        
        $dbconnection = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbname);
        
        if(!$dbconnection) {
            die("No hat conexión: ".mysqli_connect_error());
        } 
        
        /*  ---PRODUCTS TABLE---
        *  
        *  id $query[0]
        *  name $query[1]
        *  trademark $query[2]
        *  model $query[3]
        *  description $query[4]
        *  image $query[5]
        *  price $query[6]
        *  stock $query[7]
        * 
        * -------------------
        */
                     
        $products_query = mysqli_query($dbconnection, "SELECT * FROM products");
        $msg = $_SESSION["SEARCH_PRODUCT"];
        echo '<script language="javascript">';
        echo "alert('$msg')";
        echo '</script>';

		while ($row = mysqli_fetch_assoc($products_query)){
            $id = $row['id'];
            $name = $row['name'];
            $trademark = $row['trademark'];
            $model = $row['model'];
            $description = $row['description'];
            $image =  "data:image/png;base64,".(base64_encode($row['image']));
            $price = $row['price'];
            $stock = $row['stock'];  
            
            if(search($name, $_SESSION["SEARCH_PRODUCT"])){
    ?>
    
    <div class="col-lg-4 col-md-6 col-sm-12" style = "padding-bottom: 10px;">
		<h2><?php echo $name?></h2>
			
		<div class = "row">
			<div class = "col-6">
				<ul>
					<li><strong>Marca:</strong> <?php echo $trademark?></li>
					<li><strong>Modelo:</strong> <?php echo $model?></li>
                    <li><strong>Precio:</strong> <?php echo $price?></li>
                    <li><strong>Stock:</strong> <?php echo $stock?></li>
				</ul>
			</div>
				
			<div class ="col-6"><img src = "<?php echo $image; ?>" alt = "example" height = "130px"></div>
				
			<div class = "col-12">
				<div>
					<p align = "justify"><?php echo $description?></p>
				</div>
            </div>

            <div class = "col-12">
				<p>
                <?php if(isset($_SESSION['logged_in_username']) && $_SESSION['logged_in_username']!=null && $stock > 0){ ?>
                    <form method = "POST" action = "src/buy_product.php">
                        <input type = "hidden" name = "IDUSER" value = "<?php echo $_SESSION['logged_in_user_id']; ?>"/>
                        <input type = "hidden" name = "IDPRODUCT" value = "<?php echo $id ?>"/>
                        <input type = "submit" value = "Comprar" class="btn btn-primary"/>
                    </form>
  					<?php } ?>
				</p>
            </div>
        </div>
        
    </div>

    <?php }}?>

</div>


