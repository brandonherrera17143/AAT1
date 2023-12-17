<?php

namespace controller\trait\usuarios;

require_once('vendor/autoload.php');

use controller\pdf\PDF;

trait ReporteUsuario
{
    public function reporteUsuarios()
    {
        $datos = $this->listarTodosLosUsuarios();
        $pdf = new PDF();
        //
        $pdf->AliasNbPages();
        $pdf->AddPage();

        //TITULO DE LA TABLA
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->title = $pdf->Cell(0, 10, 'Reporte de Usuarios', 0, 1, 'C');

        //COLOR DE FONDO ENCABEZADO DE TABLA
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 12);

        //NOMBRE DE COLUMNAS
        $pdf->Cell(10, 10, 'No.', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'DPI', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Nombre', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Apellido', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Rol', 1, 1, 'C', 1);

        //COLOR DE FONDO CONTENIDO DE TABLA
        $pdf->SetFillColor(255, 255, 255); // Restaura el color a blanco para el contenido
        $pdf->SetFont('Arial', '', 12);

        foreach ($datos as $row => $item) {
            $contador = $row + 1;
            $pdf->Cell(10, 10, $contador, 1, 0, 'C', 0); // Utiliza
            $pdf->Cell(40, 10, utf8_decode($item["DPI"]), 1, 0, 'C', 0); // Utiliza utf8_decode para mostrar caracteres especiales
            $pdf->Cell(40, 10, utf8_decode($item["nombre_us"]), 1, 0, 'C', 0);
            $pdf->Cell(40, 10, utf8_decode($item["apellido_us"]), 1, 0, 'C', 0);
            $pdf->Cell(40, 10, utf8_decode($item["nombre_rol"]), 1, 1, 'C', 0);
        }
        ob_end_clean();
        $pdf->Output();
    }
}
