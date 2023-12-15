<?php

namespace controller\usuarios;

use model\db\Rol;

class RolController
{
    public function mostrarRoles()
    {
        $respuesta = Rol::mostrarRolesModel();
        return $respuesta;
    }
}
