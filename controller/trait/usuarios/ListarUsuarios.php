<?php

namespace controller\trait\usuarios;

use model\db\Usuarios;

require_once('vendor/autoload.php');

trait ListarUsuarios
{
    public function listarTodosLosUsuarios()
    {
        $listaUsuarios = Usuarios::mostrarUsuariosModel();
        return $listaUsuarios;
    }

    public function listarUsuarioEstudiante($idEstudiante)
    {
        $listaUsuarios = Usuarios::informacionUsuarioCompletaModel($idEstudiante);
        return $listaUsuarios;
    }
}
