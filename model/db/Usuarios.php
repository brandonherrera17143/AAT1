<?php

namespace model\db;

use model\db\ConexionDB;



class Usuarios
{



    public static function crearUsuario($datos)
    {
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO usuarios(DPI,nombre_us,apellido_us,telefono_us,id_rol,usuario,contrasenia) VALUES (:dpi, :nombre, :apellido, :telefono, :rol, :usuario, :contra)");
        $stmt->bindParam(":dpi", $datos["dpi"], \PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], \PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $datos["apellido"], \PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], \PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["fk_rol"], \PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos["usuario"], \PDO::PARAM_STR);
        $stmt->bindParam(":contra", $datos["contra"], \PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }

    public static function mostrarUsuariosModel()
    {
        try {
            $stmt = ConexionDB::conectar()->prepare("select usuarios.id_usuario, usuarios.DPI, usuarios.nombre_us, usuarios.apellido_us, usuarios.telefono_us, rol.nombre_rol, usuarios.usuario
            from usuarios
            inner join  rol on usuarios.id_rol = rol.id_rol
            WHERE estado = 1;");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function seleccionarUsuarioModel($id)
    {
        $stmt = ConexionDB::conectar()->prepare("select usuarios.id_usuario, usuarios.DPI, usuarios.nombre_us, usuarios.apellido_us, usuarios.telefono_us,usuarios.id_rol, rol.nombre_rol, usuarios.usuario
        from usuarios
        inner join  rol on usuarios.id_rol = rol.id_rol where usuarios.id_usuario = :id;");
        $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarUsuarioModel($datos)
    {
        try {
            $stmt = ConexionDB::conectar()->prepare("UPDATE usuarios SET nombre_us = :nombre, apellido_us = :apellido, telefono_us = :telefono, id_rol = :rol, usuario = :usuario WHERE id_usuario = :id;");
            $stmt->bindParam(":nombre", $datos["nombre"], \PDO::PARAM_STR);
            $stmt->bindParam(":apellido", $datos["apellido"], \PDO::PARAM_STR);
            $stmt->bindParam(":telefono", $datos["telefono"], \PDO::PARAM_STR);
            $stmt->bindParam(":rol", $datos["rol"], \PDO::PARAM_INT);
            $stmt->bindParam(":usuario", $datos["usuario"], \PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos["id"], \PDO::PARAM_INT);
            return $stmt->execute() ? true : false;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function eliminarUsuarioModel($id, $estado)
    {
        $stmt = ConexionDB::conectar()->prepare("UPDATE usuarios SET estado = :estado WHERE id_usuario = :id");
        $stmt->bindParam(":estado", $estado, \PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }

    public static function informacionUsuarioCompletaModel($id)
    {
        try {
            $stmt = ConexionDB::conectar()->prepare("SELECT rol.nombre_rol,usuarios.id_usuario, usuarios.nombre_us , usuarios.apellido_us, grado.nombre_grado, cursos.nombre_curso
            FROM detalle_grado_usuario_estudiante
            INNER JOIN usuarios ON detalle_grado_usuario_estudiante.id_usuario = usuarios.id_usuario
            INNER JOIN rol ON usuarios.id_rol = rol.id_rol
            INNER JOIN grado ON detalle_grado_usuario_estudiante.id_grado = grado.id_grado
            LEFT JOIN detalle_grado_cursos ON detalle_grado_usuario_estudiante.id_grado = detalle_grado_cursos.id_grado
            LEFT JOIN detalle_curso_usuario_profesor ON detalle_grado_cursos.id_detalle_curso_usuario_profesor = detalle_curso_usuario_profesor.id_detalle_curso_usuario_profesor
            LEFT JOIN cursos ON detalle_curso_usuario_profesor.id_curso = cursos.id_curso
            WHERE usuarios.id_usuario = :id;");
            $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
