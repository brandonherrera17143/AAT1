<?php

use controller\usuarios\UsuariosController;

$mostrarUsuarios = new UsuariosController();
$usuarios = $mostrarUsuarios->mostrarUsuariosController();
?>
<h1>Usuarios</h1>
<button type="button" class="btn btn-success" onclick="window.location.href='index.php?action=crearUsuario'">Crear
    Usuario</button>
<hr>
<table id="tablaUser" class="table table-striped" width="80%">
    <thead>
        <tr>
            <th>DPI</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Rol</th>
            <th>Usuario</th>
            <th>Informacion</th> <!-- Columna para los botones de edición -->
            <th>Editar</th> <!-- Columna para los botones de edición -->
            <th>Eliminar</th> <!-- Columna para los botones de edición -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <td><?php echo $usuario['DPI']; ?></td>
            <td><?php echo $usuario['nombre_us']; ?></td>
            <td><?php echo $usuario['apellido_us']; ?></td>
            <td><?php echo $usuario['telefono_us']; ?></td>
            <td><?php echo $usuario['nombre_rol']; ?></td>
            <td><?php echo $usuario['usuario']; ?></td>
            <td>
                <a href="index.php?action=informacionUsuario&idUser=<?php echo $usuario['id_usuario']; ?>">
                    <button class="btn btn-info">info</button></a>
            </td>
            <td>
                <a href="index.php?action=editarUsuario&idUser=<?php echo $usuario['id_usuario']; ?>">
                    <button class="btn btn-warning">Editar</button>
                </a>
            </td>

            <td>
                <a href="index.php?action=eliminarUsuario&idUser=<?php echo $usuario['id_usuario']; ?>">
                    <button class="btn btn-danger">Eliminar</button></a>
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script type="text/javascript">
let usuarios = <?php echo json_encode($usuarios); ?>;
console.log(usuarios);

function editarUsuario(id) {
    // Lógica para editar el usuario con el ID específico
    // Puedes redirigir a una página de edición o realizar una acción mediante AJAX
    console.log(' Editar usuario con ID:', id);
}
$(document).ready(function() {
    $('#tablaUser').DataTable();
});
</script>