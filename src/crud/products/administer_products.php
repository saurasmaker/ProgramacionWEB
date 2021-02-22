
    <div class = "col-12">
        <h3 class = "display-3">Productos</h3>
        <hr width = "25%" align = "left"/>
        <br/>
    </div>
	  
	<div class = "col-lg-4 col-md-6 col-sm-12">
        <form id = "create_product_form" enctype = "multipart/form-data" lass = "form-group" action = "src/crud/products/create_product.php" method = "POST">
			<label for="product-input-name">Nombre: </label>
			<p><input id = "product-input-name" type = "text" class="form-control" placeholder = "Introduce el nombre del producto..." name = "NAME" required></p>
						
			<label for="product-input-trademark">Marca: </label>
			<p><input id = "product-input-trademark" type = "text" class="form-control" placeholder = "Introduce la marca del producto..." name = "TRADEMARK" required></p>
						
			<label for="product-input-model">Modelo: </label>
			<p><input id = "product-input-model" type = "text" class="form-control" placeholder = "Introduce el modelo del producto..." name = "MODEL" required></p>
						
		    <label for="product-input-price">Precio: </label>
			<p><input id = "product-input-price" type = "number" class="form-control" step="0.01" placeholder = "Introduce el precio del producto formato (n,xy)..." name = "PRICE" required></p>
						
			<label for="product-input-stock">Stock: </label>
			<p><input id = "product-input-stock" type = "number" class="form-control" step="1" placeholder = "Introduce la cantidad de stock disponible" name = "STOCK"></p>
						
			<label for="product-input-img">Imagen: </label>
			<p><input id = "product-input-img" type = "file" accept = "image/jpg" class="form-control" name = "IMAGE"></p>

			<label for="product-input-description">Descripción: </label>
			<p><textarea id = "product-input-description" class="form-control" placeholder = "Introduce la descripción del producto..." name = "DESCRIPTION" required></textarea></p>
						
            <p><input id = "input-send" type = "submit" class="btn btn-primary" value = "Crear"></p>
        </form>

        <form id = "update_product_form" enctype = "multipart/form-data" class = "form-group" action = "src/crud/products/update_product.php" method = "POST" style = "display: 'none';">
            <label for="product-input-edit-id">Editar Producto: </label>
            <p><input id = "product-input-edit-id" type = "text" class="form-control" placeholder = "Introduce el id del usuario..." name = "IDPRODUCT" required readonly></p>
            
            <label for="product-input-edit-name">Nombre: </label>
			<p><input id = "product-input-edit-name" type = "text" class="form-control" placeholder = "Introduce el nombre del producto..." name = "NAME" required></p>
						
			<label for="product-input-edit-trademark">Marca: </label>
			<p><input id = "product-input-edit-trademark" type = "text" class="form-control" placeholder = "Introduce la marca del producto..." name = "TRADEMARK" required></p>
						
			<label for="product-input-edit-model">Modelo: </label>
			<p><input id = "product-input-edit-model" type = "text" class="form-control" placeholder = "Introduce el modelo del producto..." name = "MODEL" required></p>
						
			<label for="product-input-edit-price">Precio: </label>
			<p><input id = "product-input-edit-price" type = "number" class="form-control" step="0.01" placeholder = "Introduce el precio del producto formato (n,xy)..." name = "PRICE" required></p>
						
			<label for="product-input-edit-stock">Stock: </label>
			<p><input id = "product-input-edit-stock" type = "number" class="form-control" step="1" placeholder = "Introduce la cantidad de stock disponible" name = "STOCK"></p>
						
            <label for="product-input-edit-img">Imagen: </label>
			<p><input id = "product-input-edit-img" type = "file" accept = "image/jpg," class="form-control" name = "IMAGE"></p>

			<label for="product-input-edit-description">Descripción: </label>
			<p><textarea id = "product-input-edit-description" class="form-control" placeholder = "Introduce la descripción del producto..." name = "DESCRIPTION" required></textarea></p>
						
            <p>
                <input id = "input-edit-send" type = "submit" class="btn btn-primary" value = "Editar">
                <a id = "input-edit-send" class="btn btn-primary" href = "#" role="button" onclick = "cancel_edit_product()" style = "margin-left: 10px;">Cancelar</a>
            </p>
        </form>
    </div>

    
	  
	<div class = "col-lg-8 col-md-6 col-sm-12">
        <div class = "table-responsive" style = " max-height: 600px !important; overflow: auto;">
            <table class="table table-striped">
               	<thead class = "thead-dark">
                  	<tr>
                     	<th scope="col">ID</th>
                     	<th scope="col">Nombre</th>
                     	<th scope="col">Marca</th>
						<th scope="col">Modelo</th>
						<th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Remove</th>
                  	</tr>
               	</thead>
			   	<tbody>
                <?php
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
                                          
					while ($row = mysqli_fetch_assoc($products_query)){
                        $id = $row['id'];
                        $name = $row['name'];
                        $trademark = $row['trademark'];
                        $model = $row['model'];
                        $description = $row['description'];
                        $image =  "data:image/png;base64,".(base64_encode($row['image']));
                        $price = $row['price'];
                        $stock = $row['stock'];  
                ?>
				  
					<tr>
                     	<td><?php echo $id ?></td>
                     	<td><?php echo $name; ?></td>
                        <td><?php echo $trademark; ?></td>
                        <td><?php echo $model; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $stock; ?></td>
                        <td><img src = "<?php echo $image; ?>" height = "50px"/></td>
                        <td>
                            <button type = "submit" class="btn btn-warning" onclick = "edit_product('<?php echo $id ?>','<?php echo $name ?>','<?php echo $trademark ?>'
                               ,'<?php echo $model; ?>','<?php echo $description; ?>','<?php echo $price; ?>','<?php echo $stock; ?>')">Edit</button>
                        </td>
                        <td>
							<form action = "src/crud/products/delete_product.php" method = "POST">
                           		<input type = "hidden" name = "IDPRODUCT" value = "<?php echo $id; ?>">
                           		<button type = "submit" class="btn btn-danger">Remove</button>
                        	</form>
                        </td>
                	</tr>
					  
				<?php } ?>
				</tbody>
            </table>
        </div>
    </div>
	
	<br/>  