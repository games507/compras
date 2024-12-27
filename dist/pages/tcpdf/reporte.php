<?php
require_once('../tcpdf/tcpdf.php');  // Asegúrate de incluir el archivo de TCPDF

// Conectar a la base de datos
include '../conexion.php';

// Obtener el ID del registro desde la URL o la solicitud
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Consultar el registro específico
$query = "SELECT * FROM wp_portalcompra WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$record = $result->fetch_assoc();

// Verificar si el registro existe
if (!$record) {
    die("No se encontró el registro con ID: $id");
}

// Crear una instancia de TCPDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215.9, 330.2)); // Tamaño de hoja legal (8.5" x 13")

$pdf->setTitle('Aviso de Convocatoria');

// Establecer márgenes (1.5 pulgadas a la izquierda, 10 mm arriba, 10 mm a la derecha)
$pdf->SetMargins(38.1, 10, 10);
$pdf->AddPage();

// Agregar los logos y el título
$logoLeft = 'logoms.png'; // Ruta al logo de la izquierda
$logoRight = 'bandera.png';  // Ruta al logo de la derecha

$pdf->Image($logoLeft, 10, 10, 30);  // Logo izquierdo
$pdf->Image($logoRight, 170, 10, 30);  // Logo derecho

// Configuración para el título
$pdf->SetFont('helvetica', 'B', 12); // Fuente para el título
$pdf->SetY(15); // Posicionar verticalmente el título

// Espacio entre el encabezado y los datos
$pdf->Ln(1);

// Coordenada X calculada para centrar entre los logos
$tituloX = 75; // Ajusta según el espacio disponible entre los logos
$pdf->SetFont('helvetica', '', 12);

// Establece la posición horizontal del texto para asegurarte de que esté centrado entre los logos
$pdf->SetX($tituloX);
$pdf->Cell(60, 10, 'República de Panamá', 0, 1, 'C');

$pdf->SetX($tituloX); // Reaplicar la posición horizontal
$pdf->Cell(60, 10, 'Municipio de San Miguelito', 0, 1, 'C');

$pdf->SetX($tituloX); // Reaplicar la posición horizontal
$pdf->Cell(60, 10, 'Panamá', 0, 1, 'C');

// Pequeño salto de línea para espaciado
$pdf->Ln(1);


$pdf->SetFont('helvetica', 'B', 12);
$pdf->SetX($tituloX); // Reaplicar la posición horizontal
$pdf->Cell(60, 10, 'AVISO DE CONVOCATORIA', 0, 1, 'C');
$pdf->Ln(10);



// Mostrar los datos del registro
$pdf->SetFont('helvetica', '', 12);

// Recorrer los datos del registro
foreach ($record as $column => $value) {
    // Excluir el campo "id" de la impresión
    if ($column === 'id') {
        continue;
    }
    elseif($column === 'no_compra'){
        $no_compra = $value;
    }

    // Personalizar los títulos para presentación
    $columnTitle = ucfirst(str_replace("_", " ", $column)); // Reemplazar guiones bajos por espacios y capitalizar

    // Celda para el título y el contenido
    $pdf->MultiCell(60, 10, $columnTitle . ':', 0, 'L', 0, 0); // Título
    $pdf->MultiCell(0, 10, $value, 0, 'L', 0, 1); // Valor ajustado al ancho disponible
}
// Agregar la firma del responsable
$pdf->Ln(20); // Espacio adicional
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 1, 'Firma del Responsable:', 0, 0, 'L'); // Título
$pdf->Line(30, $pdf->GetY(), 150, $pdf->GetY()); // Línea horizontal para la firma
// Footer con la nota
$pdf->SetY(-50); // Posiciona el footer a 50 unidades del borde inferior
$pdf->SetX(0); // Asegura que el contenido comience desde el borde izquierdo de la página
$pdf->SetFont('helvetica', 'I', 10); // Fuente cursiva y tamaño más pequeño
$pdf->MultiCell(
    0, 10, 
    "NOTA: LAS PROPUESTAS DEBEN SER ENTREGADAS EN SOBRES CERRADOS, " . 
    "CON EL NOMBRE DE LA EMPRESA Y DESCRIPCIÓN DEL PROYECTO. " .
    "NO SE ACEPTARÁN NINGUNA PROPUESTA DESPUÉS DE VENCIDA LA HORA ESTABLECIDA.", 
    0, 'C', 0 // El último 0 asegura que no se dibuje un borde alrededor del texto
);


// Salvar el PDF y enviarlo al navegador
$pdf->Output('AvisoDeConvocatoria_' . $no_compra . '.pdf', 'I'); // Mostrar en el navegador
?>