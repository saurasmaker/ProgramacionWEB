<?php

    $clientes_bd = new mysqli('localhost', 'root', null, 'practicaphpybd');
    $clientes_query = $clientes_bd -> query ("SELECT * FROM clientes");

    $empresas_bd = new mysqli('localhost', 'root', null, 'practicaphpybd');
?>

<table id = "clients" name = "clients">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Empresa</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>

    <?php 
        while ($values = mysqli_fetch_array($clientes_query)) {
    ?> 
         
    <tr>
        <td><?php echo $values['Id'];?></td>
        <td><?php echo $values['Nombre'];?></td>
        <td><?php echo $values['Apellidos'];?></td>
        <td><?php echo $values['Email'];?></td>
        
        <?php
            $empresa = $values['IdEmp'];
            $empresas_query = $empresas_bd -> query("SELECT * FROM empresas WHERE Id='$empresa'"); 
        ?>
        <td><?php echo mysqli_fetch_array($empresas_query)['Nombre'];?></td>
        <td><a href = "#">editar</a></td>
        <td><a href = "#">eliminar</a></td>
    </tr>

    <?php
        }   
    ?>

</table>