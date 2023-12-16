<?php

use controller\usuarios\UsuariosController;

$usuarioSeleccionado = new UsuariosController();
$respuesta = $usuarioSeleccionado->seleccionarUsuarioCompletaInfo();
foreach ($respuesta as $rol) {
    $rol['nombre_rol'];
    break;
}
?>

<div class="container mt-5">
    <div class="card">
        <?php
        if ($rol['nombre_rol'] === 'Estudiante') : ?>
            <div class="card-header">
                <h1 class="card-header text-center bg-primary text-white">
                    <?php foreach ($respuesta as $rol) {
                        echo $rol['nombre_rol'];
                        break;
                    } ?>
                </h1>

                <h1 class="card-title"><?php foreach ($respuesta as $nombre) {
                                            echo $nombre['nombre_us'] . ' ' . $nombre['apellido_us'];
                                            break;
                                        } ?></h1>
            </div>
            <div class="card-body">
                <h2><?php foreach ($respuesta as $grado) {
                        echo $grado['nombre_grado'];
                        break;
                    } ?></h2>

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Cursos</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($respuesta as $row => $item) : ?>
                            <tr>
                                <th scope="row"><?= $row + 1 ?></th>
                                <td><?= $item["nombre_curso"] ?></td>
                                <td>
                                    <a href="index.php?action=ejemplo&idEjemplo=<?= $item["nombre_us"] ?>" class="btn btn-warning">Editar</a>
                                </td>
                                <td>
                                    <a href="index.php?action=ejemplo&idEjemplo=<?= $item["nombre_us"] ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php elseif ($rol['nombre_rol'] === 'Profesor') : ?>

            <div class="card-header">
                <h1 class="card-header text-center bg-primary text-white">
                    <?php foreach ($respuesta as $rol) {
                        echo $rol['nombre_rol'];
                        break;
                    } ?>
                </h1>

                <h1 class="card-title"><?php foreach ($respuesta as $nombre) {
                                            echo $nombre['nombre_us'] . ' ' . $nombre['apellido_us'];
                                            break;
                                        } ?></h1>
            </div>
            <div class="card-body">
                <h2><?php foreach ($respuesta as $grado) {
                        echo $grado['nombre_grado'];
                        break;
                    } ?></h2>

                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Cursos Impartidos</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Seccion</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($respuesta as $row => $item) : ?>
                            <tr>
                                <th scope="row"><?= $row + 1 ?></th>
                                <td><?= $item["nombre_curso"] ?></td>
                                <td><?= $item["nombre_grado"] ?></td>
                                <td><?= $item["nombre_seccion"] ?></td>
                                <td>
                                    <a href="index.php?action=ejemplo&idEjemplo=<?= $item["nombre_us"] ?>" class="btn btn-warning">Editar</a>
                                </td>
                                <td>
                                    <a href="index.php?action=ejemplo&idEjemplo=<?= $item["nombre_us"] ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        <?php else : ?>
            <!-- Manejo de otros roles o errores -->
            <div class="card-header">
                <h1 class="card-header text-center bg-secondary text-white">Otro Rol</h1>
                <h1 class="card-title">Usuario sin rol definido</h1>
            </div>
            <div class="card-body">
                <p>No se encontró un rol específico para este usuario.</p>
            </div>
        <?php endif; ?>
    </div>
</div>