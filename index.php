<?php

require_once("autoload.php");

require_once("helpers/helpers.php");

use controller\enlaces\EnlacesController;

$pagina = new EnlacesController();

$pagina->mostrarPlantilla();
