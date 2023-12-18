<?php

namespace controller\trait\usuarios;

require_once('vendor/autoload.php');

use controller\pdf\PDF;

trait ReporteProfe
{
    public function ReporteProfesor($idProfe)
    {
        $datos = $this->listarUsuarioProfesor($idProfe);
        $pdf = new PDF();
        //
        $pdf->AliasNbPages();
        $pdf->AddPage();

        //TITULO DE LA TABLA
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->title = $pdf->Cell(0, 10, 'Reporte de Profesor', 0, 1, 'C');

        $pdf->Cell(0, 10, utf8_decode($datos[0]['nombre_us'] . ' ' . $datos[0]['apellido_us']), 0, 1, 'C');


        $pdf->Ln(10);

        //COLOR DE FONDO ENCABEZADO DE TABLA
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 12);

        //NOMBRE DE COLUMNAS
        $pdf->Cell(10, 10, 'No.', 1, 0, 'C', 1);
        $pdf->Cell(60, 10, 'Cursos Impartidos.', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Grado.', 1, 0, 'C', 1);
        $pdf->Cell(30, 10, 'Seccion.', 1, 1, 'C', 1);

        //COLOR DE FONDO CONTENIDO DE TABLA
        $pdf->SetFillColor(255, 255, 255); // Restaura el color a blanco para el contenido
        $pdf->SetFont('Arial', '', 12);

        foreach ($datos as $row => $item) {
            $contador = $row + 1;
            $pdf->Cell(10, 10, $contador, 1, 0, 'C', 0);
            $pdf->Cell(60, 10, utf8_decode($item["nombre_curso"]), 1, 0, 'C', 0);
            $pdf->Cell(40, 10, utf8_decode($item["nombre_grado"]), 1, 0, 'C', 0);
            $pdf->Cell(30, 10, utf8_decode($item["nombre_seccion"]), 1, 1, 'C', 0);
        }
        ob_end_clean();
        $pdf->Output();
    }
}
