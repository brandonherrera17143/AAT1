<?php

use controller\usuarios\UsuariosController;

$reporteEstudiante = new UsuariosController();
$idEstudiante = $_GET['idEstudiante'];
$reporteEstudiante->ReporteEstudiantes($idEstudiante);
