<?php

use controller\usuarios\UsuariosController;

$seleccionado = new UsuariosController();
$usuarioSeleccionado = $seleccionado->seleccionarUsuarioController();

$seleccionado->eliminarUsuarioController();


?>
<h1>Eliminar</h1>
<h2><?php echo $usuarioSeleccionado['nombre_rol']; ?> <strong><?php echo $usuarioSeleccionado['nombre_us']; ?></strong>
</h2>

<form method="post">

    <input type="hidden" name="idUsuario" value="<?php echo $usuarioSeleccionado['id_usuario']; ?>">

    <button class="btn btn-primary" type="submit">Eliminar</button>
</form>