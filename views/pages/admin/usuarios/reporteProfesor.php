<?php

use controller\usuarios\UsuariosController;

$reporteProfesor = new UsuariosController();
$idProfe = $_GET['idProfesor'];
$reporteProfesor->ReporteProfesor($idProfe);
