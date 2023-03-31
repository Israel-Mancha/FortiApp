<?php
    require '../Model/tabla_reserva.php';
    require '../Model/fecha.php';
    require_once('../lib/tcpdf/tcpdf.php');
    $obj = new index();
    $result_tabla = $obj->tabla_detalle();
    $tabla = $obj->tabla_reserva($result_tabla);

    // Crea un objeto TCPDF
    $pdf = new TCPDF();

    // Agrega una página
    $pdf->AddPage();

    // Genera la tabla en el PDF
    $html = '<table>' . $tabla . '</table>';
    $pdf->writeHTML($html);

    // Descarga el archivo
    $pdf->Output('tabla.pdf', 'D');
?>
<a href="generar_pdf.php">Descargar tabla en PDF</a>
    