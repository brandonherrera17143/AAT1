<?php

namespace model\db;

use model\db\ConexionDB;

class Profesor
{
    public static function mostrarProfesoresCursosGradoModel($id)
    {
        try {
            $stmt = ConexionDB::conectar()->prepare("SELECT usuarios.id_usuario, usuarios.nombre_us, usuarios.apellido_us, rol.nombre_rol, cursos.nombre_curso, grado.nombre_grado, seccion.nombre_seccion
            FROM usuarios
            INNER JOIN rol ON usuarios.id_rol = rol.id_rol
            INNER JOIN detalle_curso_usuario_profesor ON usuarios.id_usuario = detalle_curso_usuario_profesor.id_usuario
            INNER JOIN cursos ON detalle_curso_usuario_profesor.id_curso = cursos.id_curso
            INNER JOIN detalle_grado_cursos ON detalle_curso_usuario_profesor.id_detalle_curso_usuario_profesor = detalle_grado_cursos.id_detalle_curso_usuario_profesor
            INNER JOIN grado ON detalle_grado_cursos.id_grado = grado.id_grado
            inner JOIN seccion ON grado.id_seccion = seccion.id_seccion
            WHERE usuarios.id_usuario = :id;");
            $stmt->bindParam(":id", $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
