
    <?php
        $empresas_bd = new mysqli('localhost', 'root', null, 'practicaphpybd');
        $empresas_query = $empresas_bd -> query ("SELECT * FROM empresas");
    ?>

    <form  action = "guardar.php" method = "POST">
        <label for = "name">Nombre: </label>
        <input type = "text" name = "name" maxlength = "40" placeholder = "ejemplo nombre" require> <br/>
    
        <label for = "surname">Apellidos: </label>
        <input id = "surname" type = "text" name = "surname" maxlength = "80" placeholder = "ejemplo apellidos" require><br/>

        <label for = "email">Correo: </label>
        <input id = "email" type = "email" name = "email" maxlength = "80" placeholder = "ejemplo@correo.electronico" require> <br/>
            
        <label for = "business">Empresa: </label>
        <select id="business" name="business_list" placeholder = "Selecciona una Empresa" require>
            <option disabled selected value> -- select an option -- </option>
            <?php while ($values = mysqli_fetch_array($empresas_query)) {         
                echo '<option value="'.$values['Id'].'">'.$values['Nombre'].'</option>';
            }?>
        </select>
        <input type = "submit" name = "send" value = "Enviar">
    </form>
