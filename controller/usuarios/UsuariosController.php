<?php

namespace controller\usuarios;

use model\db\Usuarios;
use model\db\Profesor;

require_once("helpers/helpers.php");

class UsuariosController
{
    public function crearUsuario()
    {
        if (!empty($_POST["dpi"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["fk_rol"]) && !empty($_POST["usuario"]) && !empty($_POST["contra"])) {
            $dpi = strClean($_POST["dpi"]);
            $nombre = strClean($_POST["nombre"]);
            $apellido = strClean($_POST["apellido"]);
            $telefono = strClean($_POST["telefono"]);
            $fk_rol = strClean($_POST["fk_rol"]);
            $usuario = strClean($_POST["usuario"]);
            $contra = strClean($_POST["contra"]);

            $datos = array(
                "dpi" => $dpi,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "telefono" => $telefono,
                "fk_rol" => $fk_rol,
                "usuario" => $usuario,
                "contra" => $contra
            );

            $respuesta = Usuarios::crearUsuario($datos);

            if ($respuesta) {
                //header("location:index.php?action=usuarios");
                echo 'Usuarios creado Correctamente';
            } else {
                echo "<script>alert('Error al crear Modelo)</script>";
            }
        } else {
            echo "Todos los campos son obligatorios";
        }
    }


    public function mostrarUsuariosController()
    {
        $usuarios = Usuarios::mostrarUsuariosModel();
        return $usuarios;
    }


    public function seleccionarUsuarioController()
    {
        $id = $_GET['idUser'];
        $respuesta = Usuarios::seleccionarUsuarioModel($id);
        return $respuesta;
    }

    public function seleccionarUsuarioCompletaInfo()
    {
        if (isset($_GET['idUser'])) {
            $id = $_GET['idUser'];

            $obtenerRolUsuario = Usuarios::seleccionarUsuarioModel($id);
            $rol = $obtenerRolUsuario['id_rol'];
            echo $rol;
            if ($rol == 1) {
                $respuesta = Profesor::mostrarProfesoresCursosGradoModel($id);
            } else if ($rol == 3) {
                $respuesta = Usuarios::informacionUsuarioCompletaModel($id);
            } else {
                $respuesta = null;
            }
            //echo '<pre>';
            //var_dump($respuesta);
            //echo '</pre>';
            //foreach ($respuesta as $rol) {
            //   $rol['nombre_rol'];
            //  break;
            // }
            if ($respuesta) {

                return $respuesta;
            } else {
                return null;
            }
        } else {

            return null;
        }
    }


    public function actualizarUsuarioController()
    {
        if (!empty($_POST["id_usuario"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["fk_rol"]) && !empty($_POST["usuario"])) {
            $id = strClean($_POST["id_usuario"]);
            $nombre = strClean($_POST["nombre"]);
            $apellido = strClean($_POST["apellido"]);
            $telefono = strClean($_POST["telefono"]);
            $fk_rol = strClean($_POST["fk_rol"]);
            $usuario = strClean($_POST["usuario"]);

            $datos = array(
                "id" => $id,
                "nombre" => $nombre,
                "apellido" => $apellido,
                "telefono" => $telefono,
                "rol" => $fk_rol,
                "usuario" => $usuario
            );

            $respuesta = Usuarios::actualizarUsuarioModel($datos);

            if ($respuesta) {
                //header("location:index.php?action=usuarios");
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Usuario Actualizado",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>';
                //echo '<script>window.location.href = "index.php?action=mostrarUsuarios";</script>';
            } else {
                echo "<script>alert('Error al actualizar)</script>";
            }
        } else {
            echo "Todos los campos son obligatorios";
        }
    }

    public function eliminarUsuarioController()
    {
        if (!empty($_POST["idUsuario"])) {
            $id = strClean($_POST["idUsuario"]);
            $respuesta = Usuarios::eliminarUsuarioModel($id, 0);
            if ($respuesta) {
                echo '<script>
                        Swal.fire({
                            icon: "success",
                            title: "Usuario Eliminado",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>';
                //header("location:index.php?action=usuarios");
                //echo '<script>window.location.href = "index.php?action=mostrarUsuarios";</script>';
            } else {
                echo "<script>alert('Error al eliminar)</script>";
            }
        }
    }
}
