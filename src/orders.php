<div class = "col-12">
		<h3 class = "display-2 text-center">Factura</h3>
		<hr width = "50%"/>
		<br/>
	</div>

    <div class = "col-12">
        <div class = "table-responsive" style = " max-height: 400px !important; overflow: auto;">
            <table class="table table-striped">
               	<thead class = "thead-dark">
                  	<tr>
                     	<th scope="col">ID</th>
                     	<th scope="col">Fecha</th>
                     	<th scope="col">Producto</th>
						<th scope="col">Usuario</th>
						<th scope="col">Dirección</th>
                  	</tr>
               	</thead>
			   	<tbody>
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
                    /*  ---BILLS TABLE---
                     *  
                     *  id $query[0]
                     *  dateBuy $query[1]
                     *  idProduct $query[2]
                     *  idUser $query[3]
                     *  sendingAddress $query[4]
                     * 
                     * -------------------
                     */
                   
                    if(isset( $_SESSION['logged_in_user_id'])){
                        $user =  $_SESSION['logged_in_user_id'];
                        $products_query = mysqli_query($dbconnection, "SELECT * FROM bills WHERE idUser = '$user'");
                       
                        while ($row = mysqli_fetch_assoc($products_query)){
                            $id = $row['id'];
                            $dateBuy = $row['dateBuy'];
                            $idProduct = $row['idProduct'];
                            $idUser = $row['idUser'];
                            $sendingAddress = $row['sendingAddress'];

                ?>
				  
					<tr>
                     	<td><?php echo $id ?></td>
                     	<td><?php echo $dateBuy; ?></td>
                        <td><?php echo $idProduct; ?></td>
                        <td><?php echo $idUser; ?></td>
                        <td><?php echo $sendingAddress; ?></td>
                	</tr>

                    <?php } }else{echo("Factura no encontrada.");} unset($_SESSION['IDBILL']);?>

				</tbody>
            </table>
            
            <div class = "col-12">
                <br/>
                <a href = "index.php?ACTUAL_PAGE=catalogue" id = "input-edit-send" type = "submit" class="btn btn-primary">Aceptar</a>
                <br/>
		        <br/>
	        </div>
        </div>
    </div>