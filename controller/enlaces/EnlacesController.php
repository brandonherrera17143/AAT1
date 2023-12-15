<?php

namespace controller\enlaces;

use model\enlaces\Enlaces;

class EnlacesController
{

    public function mostrarPlantilla()
    {

        require_once("views/layouts/template.php");
    }

    public function enlacesPaginasController()
    {

        if (isset($_GET["action"])) {

            $enlaces = $_GET["action"];
        } else {

            $enlaces = "inicio";
        }

        $respuesta = Enlaces::enlacesModel($enlaces);

        require_once($respuesta);
    }
}
