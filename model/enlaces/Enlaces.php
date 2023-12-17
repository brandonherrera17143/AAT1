<?php

namespace model\enlaces;

class Enlaces
{

    public static function enlacesModel($enlaces)
    {

        $paginas = match ($enlaces) {
            //Administrador
            "crearUsuario" => "views/pages/admin/usuarios/crearUsuario.php",
            "mostrarUsuarios" => "views/pages/admin/usuarios/mostrarUsuarios.php",
            "editarUsuario" => "views/pages/admin/usuarios/editarUsuario.php",
            "eliminarUsuario" => "views/pages/admin/usuarios/eliminarUsuario.php",
            "informacionUsuario" => "views/pages/admin/usuarios/informacionUsuario.php",
            "reporteUsuario" => "views/pages/admin/usuarios/reporteUsuario.php",
            "reporteEstudiante" => "views/pages/admin/usuarios/reporteEstudiante.php",

            "inicio" => "views/pages/public/inicio.php",
            default => "views/error/404.php"
        };
        return $paginas;
    }
}
