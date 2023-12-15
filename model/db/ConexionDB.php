<?php

namespace model\db;

class ConexionDB
{

    public static function conectar()
    {

        try {
            $conexion = new \PDO("mysql:host=localhost:3307;dbname=escuela_db", "root", "1234");
            //echo "Conexion exitosa";
            return $conexion; // Retorna la conexión
        } catch (\PDOException $e) {
            // Captura cualquier excepción que ocurra al conectar
            echo "Error al conectar a la base de datos: " . $e->getMessage();
            return null; // Retorna null en caso de error
        }
    }
}
