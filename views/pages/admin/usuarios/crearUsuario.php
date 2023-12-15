<?php

use controller\usuarios\RolController;
use controller\usuarios\UsuariosController;

$crearUsuario = new UsuariosController();

$Id_roles = new RolController();
$Id_roles->mostrarRoles();

?>

<h1>Crear Usuario</h1>

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
                    <input class="form-control" type="text" name="dpi" placeholder="Ingrese DPI">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="nombre" placeholder="Ingrese Nombre">
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="apellido" placeholder="Ingrese Apellido">
                </div>

            </div>
            <div class="row mb-3">
                <div class="col-4"><label>Telefono</label></div>
                <div class="col-4"><label>Rol</label></div>
                <div class="col-4"><label>Nombre Usuario</label></div>
            </div>
            <div class="row mb-3">
                <div class="col-4">
                    <input class="form-control" type="text" name="telefono" placeholder="Ingrese Telefono">
                </div>
                <div class="col-4">
                    <select class="form-select rounded" name="fk_rol">
                        <?php
                        $id = $Id_roles->mostrarRoles();
                        foreach ($id as $rol) {
                            echo '<option value="' . $rol["id_rol"] . '">' . $rol["nombre_rol"] . '</option>';
                        }


                        ?>

                    </select>
                </div>
                <div class="col-4">
                    <input class="form-control" type="text" name="usuario" placeholder="Ingres Nombre Usuario">
                </div>

            </div>

            <div class="row mb-3">
                <div class="col-4"><label>Contraseña Usuario</label></div>
            </div>

            <div class="row mb-3">
                <div class="col-4">
                    <input class="form-control" type="text" name="contra" placeholder="Ingrese Contraseña">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Crear</button>
                </div>
            </div>
        </div>

    </form>


    <?php
    $resultado = $crearUsuario->crearUsuario();
    ?>

</div>