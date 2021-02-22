
    <div class = "col-12">
        <h3 class = "display-3">Usuarios</h3>
        <hr width = "25%" align = "left"/>
        <br/>
    </div>
	  
	<div class = "col-lg-4 col-md-6 col-sm-12">
        <form id = "create_user_form" class = "form-group" action = "src/crud/users/create_user.php" method = "POST">
            <label for="user-input-username">Nombre usuario: </label>
            <p><input id = "user-input-username" type = "text" class="form-control" placeholder = "Introduce el nombre del usuario..." name = "USERNAME" required></p>
            <label for="user-input-email">Correo electrónico: </label>
            <p><input id = "user-input-email" type = "email" class="form-control" placeholder = "Introduce el correo electrónico del usuario..." name = "EMAIL" required></p>
            <label for="user-input-pass">Contraseña: </label>
            <p><input id = "user-input-pass" type = "text" class="form-control" placeholder = "Introduce la contraseña del usuario..." name = "PASSWORD" required></p>

            <p><input id = "user-input-send" type = "submit" class="btn btn-primary" value = "Crear"></p>
        </form>

        <form id = "update_user_form" class = "form-group" action = "src/crud/users/update_user.php" method = "POST" style = "display: 'none';">
            <label for="user-input-edit-id">Editar usuario: </label>
            <p><input id = "user-input-edit-id" type = "text" class="form-control" placeholder = "Introduce el id del usuario..." name = "IDUSER" required readonly></p>
            
            <label for="user-input-edit-username">Nombre usuario: </label>
            <p><input id = "user-input-edit-username" type = "text" class="form-control" placeholder = "Introduce el nombre del usuario..." name = "USERNAME" required></p>
            
            <label for="user-input-edit-email">Correo electrónico: </label>
            <p><input id = "user-input-edit-email" type = "email" class="form-control" placeholder = "Introduce el correo electrónico del usuario..." name = "EMAIL" required></p>
            
            <label for="user-input-edit-pass">Contraseña: </label>
            <p><input id = "user-input-edit-pass" type = "text" class="form-control" placeholder = "Introduce la contraseña del usuario..." name = "PASSWORD" required></p>

            <p>
                <input id = "input-edit-send" type = "submit" class="btn btn-primary" value = "Editar">
                <a id = "input-edit-send" class="btn btn-primary" href = "#" role="button" onclick = "cancel_edit_user()" style = "margin-left: 10px;">Cancelar</a>
            </p>
        </form>
    </div>
	  
	<div class = "col-lg-8 col-md-6 col-sm-12">
        <div class = "table-responsive" style = " max-height: 400px !important; overflow: auto;">
            <table class="table table-striped">
               	<thead class = "thead-dark">
                  	<tr>
                     	<th scope="col">ID</th>
                     	<th scope="col">Nombre de Usuario</th>
                     	<th scope="col">Correo electrónico</th>
                     	<th scope="col">Contraseña</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Remove</th>
                  	</tr>
               	</thead>
			   	<tbody>
                <?php
                    /*  ---USERS TABLE---
                     *  
                     *  id $query[0]
                     *  username $query[1]
                     *  email $query[2]
                     *  passwrd $query[3]
                     * 
                     * -------------------
                     */
                     
                    $users_query = mysqli_query($dbconnection, "SELECT * FROM users");
                     
					while ($row = mysqli_fetch_assoc($users_query)){
                        $id = $row['id'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $password = $row['passwrd'];

                     
                ?>
				  
					<tr>
                     	<th scope="row"><?php echo $id ?></th>
                     	<td><?php echo $username; ?></td>
                     	<td><?php echo $email; ?></td>
                     	<td><?php echo $password; ?></td>
                        <td>
                           	<button type = "submit" class="btn btn-warning" onclick = "edit_user('<?php echo $id ?>','<?php echo $username ?>','<?php echo $email ?>','<?php echo $password ?>')">Edit</button>
                        </td>
                        <td>
							<form action = "src/crud/users/delete_user.php" method = "POST">
                           		<input type = "hidden" name = "IDUSER" value = "<?php echo $row['id']; ?>">
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