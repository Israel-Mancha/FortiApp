<?php
require('../fpdf.php');

// Crea una instancia de la clase FPDF
$pdf = new FPDF();

// Agrega una nueva página
$pdf->AddPage();

// Establece el tipo de fuente y el tamaño de fuente
$pdf->SetFont('Arial', '', 12);

// Agrega el contenido de la página PHP al archivo PDF
ob_start();
include('View/prestamo.php');
$html = ob_get_clean();
$pdf->WriteHTML($html);

// Envía el archivo PDF al navegador
$pdf->Output('Registro-de-Prestamo.pdf', 'D');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HOLAAAA</h1>
</body>
</html>