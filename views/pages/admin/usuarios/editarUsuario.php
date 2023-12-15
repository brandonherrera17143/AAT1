<?php

use controller\usuarios\UsuariosController;
use controller\usuarios\RolController;

$usuarioSeleccionado = new UsuariosController();
$seleccionado = $usuarioSeleccionado->seleccionarUsuarioController();

$roles = new RolController();
$rol = $roles->mostrarRoles();

$usuarioSeleccionado->actualizarUsuarioController();

?>

<h1>Actualizar Datos</h1>
<h2><?php echo $seleccionado['nombre_rol']; ?></h2>

<div class="container">
    <form method="POST">
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-4"><label>DPI</label></div>
                <div class="col-4"><label>Nombre</label></div>
                <div class="col-4"><label>Apellido</label></div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <input class="form-control" type="text" name="dpi" value="<?php echo $seleccionado['DPI']; ?>"
                        readonly>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="nombre"
                        value="<?php echo $seleccionado['nombre_us']; ?>">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="apellido"
                        value="<?php echo $seleccionado['apellido_us']; ?>">
                </div>
            </div>
            <input type="hidden" name="id_usuario" value="<?php echo $seleccionado['id_usuario']; ?>">
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-4"><label>Telefono</label></div>
                <div class="col-4"><label>Rol</label></div>
                <div class="col-4"><label>Usuario</label></div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <input class="form-control" type="text" name="telefono"
                        value="<?php echo $seleccionado['telefono_us']; ?>">
                </div>
                <div class="col-4">
                    <select name="fk_rol" class="form-select rounded">
                        <?php
                        foreach ($rol as $rolSeleccionado) {
                            echo '<option value="' . $rolSeleccionado['id_rol'] . '">' . $rolSeleccionado['nombre_rol'] . '</option>';
                        }

                        ?>
                    </select>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="usuario"
                        value="<?php echo $seleccionado['usuario']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
</div>