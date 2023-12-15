<?php

namespace model\db;

use model\db\ConexionDB;

class Rol
{
    public static function mostrarRolesModel()
    {
        try {
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM rol");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
