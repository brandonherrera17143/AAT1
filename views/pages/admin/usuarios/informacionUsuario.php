<?php

use controller\usuarios\UsuariosController;

$usuarioSeleccionado = new UsuariosController();
$respuesta = $usuarioSeleccionado->seleccionarUsuarioCompletaInfo();

if ($respuesta) {
    echo 'Nombre: ' . $respuesta['nombre_us'];
    echo 'Grado: ' . $respuesta['nombre_grado'];
    // ... Mostrar otros datos
} else {
    echo 'No se encontraron datos para el usuario seleccionado.';
}
