<div class = "col-12">
   <h3 class = "display-3">Facturas</h3>
   <hr width = "25%" align = "left"/>
   <br/>
</div>

<div class = "col-lg-4 col-md-6 col-sm-12">
   <form id = "create_bill_form" enctype = "multipart/form-data" lass = "form-group" action = "src/crud/bills/create_bill.php" method = "POST">
      <label for="bill-input-datebuy">Fecha: </label>
      <p><input id = "bill-input-datebuy" type = "datetime-local" class="form-control" placeholder = "Introduce la fecha de compra..." name = "DATEBUY" required></p>

      <label for = "bill-input-idproduct">Producto: </label>
      <p>
         <select id = "bill-input-idproduct" class="form-control" name = "IDPRODUCT" required>
            <?php
               $products_query = mysqli_query($dbconnection, "SELECT * FROM products");
               while ($row = mysqli_fetch_assoc($products_query)){
                   $idProduct = $row['id'];
                   $name = $row['name'];
            ?>
            <option value = "<?php echo($idProduct);?>"> <?php echo($name);?> </option>
            <?php } ?>
         </select>
      </p>

      <label for = "bill-input-iduser">Usuario: </label>
      <p>
         <select id = "bill-input-iduser" class="form-control" name = "IDUSER" required>
            <?php
               $products_query = mysqli_query($dbconnection, "SELECT * FROM users");
               while ($row = mysqli_fetch_assoc($products_query)){
                   $idUser = $row['id'];
                   $username = $row['username'];
               ?>
            <option value = "<?php echo($idUser);?>"><?php echo($username);?></option>
            <?php } ?>
         </select>
      </p>

      <label for="bill-input-sendingaddress">Dirección: </label>
      <p><input id = "bill-input-sendingaddress" type = "text" class="form-control" placeholder = "Introduce la dirección..." name = "SENDINGADDRESS" required></p>

      <p><input id = "input-send" type = "submit" class="btn btn-primary" value = "Crear"></p>
   </form>
   
   <form id = "update_bill_form" enctype = "multipart/form-data" class = "form-group" action = "src/crud/bills/update_bill.php" method = "POST" style = "display: 'none';">
      <label for="bill-input-edit-id">Editar Producto: </label>
      <p><input id = "bill-input-edit-id" type = "text" class="form-control" placeholder = "Introduce el id de la factura..." name = "IDBILL" required readonly></p>

      <label for = "bill-input-edit-idproduct">Producto: </label>
      <p>
         <select id = "bill-input-edit-idproduct" class="form-control" name = "IDPRODUCT" required>
            <?php
               $products_query = mysqli_query($dbconnection, "SELECT * FROM products");
               while ($row = mysqli_fetch_assoc($products_query)){
                   $idProduct = $row['id'];
                   $name = $row['name'];
               ?>
            <option value = "<?php echo($idProduct);?>"><?php echo($name);?></option>
            <?php } ?>
         </select>
      </p>

      <label for = "bill-input-edit-iduser">Usuario: </label>
      <p>
         <select id = "bill-input-edit-iduser" class="form-control" name = "IDUSER" required>
            <?php
               $users_query = mysqli_query($dbconnection, "SELECT * FROM users");
               while ($row = mysqli_fetch_assoc($users_query)){
                   $idUser = $row['id'];
                   $username = $row['username'];
               ?>
            <option value = "<?php echo($idUser);?>"> <?php echo($username);?> </option>
            <?php } ?>
         </select>
      </p>

      <label for="bill-input-edit-sendingaddress">Dirección: </label>
      <p><input id = "bill-input-edit-sendingaddress" type = "text" class="form-control" placeholder = "Introduce la dirección..." name = "SENDINGADDRESS" required></p>
      <p>
         <input id = "input-edit-send" type = "submit" class="btn btn-primary" value = "Editar">
         <a id = "input-edit-send" class="btn btn-primary" href = "#" role="button" onclick = "cancel_edit_bill()" style = "margin-left: 10px;">Cancelar</a>
      </p>

   </form>
</div>

<div class = "col-lg-8 col-md-6 col-sm-12">
   <div class = "table-responsive" style = " max-height: 400px !important; overflow: auto;">
      <table class="table table-striped">
         <thead class = "thead-dark">
            <tr>
               <th scope="col">ID</th>
               <th scope="col">Fecha</th>
               <th scope="col">Producto</th>
               <th scope="col">Usuario</th>
               <th scope="col">Dirección</th>
               <th scope="col">Edit</th>
               <th scope="col">Remove</th>
            </tr>
         </thead>
         <tbody>
            <?php
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
                
               $bills_query = mysqli_query($dbconnection, "SELECT * FROM bills");
                                     
               while ($row = mysqli_fetch_assoc($bills_query)){
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
               <td>
                  <button type = "submit" class="btn btn-warning" onclick = "edit_bill('<?php echo $id ?>','<?php echo $dateBuy ?>','<?php echo $idProduct ?>','<?php echo $idUser; ?>','<?php echo $sendingAddress; ?>')">Edit</button>
               </td>
               <td>
                  <form action = "src/crud/bills/delete_bill.php" method = "POST">
                     <input type = "hidden" name = "IDBILL" value = "<?php echo $id; ?>">
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