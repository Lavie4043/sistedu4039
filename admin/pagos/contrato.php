<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).

$id_estudiante = $_GET['id'];
include('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');
include('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include('../../app/controllers/estudiantes/datos_del_estudiante.php');

////Trayendo datos de la institución

foreach ($instituciones as $institucione){
	$nombre_institucion = $institucione['nombre_institucion'];
$direccion = $institucione['direccion'];
$telefono = $institucione['telefono'];
$celular = $institucione['celular'];
$correo = $institucione['correo'];
$logo = $institucione['logo'];

}

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(210,297), PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor(APP_NAME);
$pdf->setTitle(APP_NAME);
$pdf->setSubject(APP_NAME);
$pdf->setKeywords(APP_NAME);

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(10, 10, 10);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);
// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('Times', '', 11, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect



// Set some content to print
$html = '

<table border="0">
<tr>
	
	<td width="150px" style="text-align: center"><img src="../../public/images/configuracion/'.$logo.'" width="100px" alt=""></td>
	<td width="400px"></td>
	
	</tr>
<tr>

	<td style="text-align: center">
	<b>'.$nombre_institucion.'</b> <br>
	<small>'.$direccion.'</small><br>
	<small>'.$telefono.' '.$celular.'</small>
	</td> 
	<td style="text-align: center"><h2><b><u>CONTRATO DE MATRÍCULA ESCOLAR</u></b></h2></td>
</tr>
</table>
 
<p>

<b> Partes contratantes</b> Escuela <b style="color:blue"> '.$nombre_institucion.' </b>, en adelante denominado la institución educativa, representado... y los tutores legales del estudiante: <b style="color:blue"> '.$apellidos.' '.$nombres.' </b>, en adelante denominado "El Estudiante", representados por <b style="color:blue"> '.$nombres_apellidos_ppff.' </b> con domicilio en <b style="color:blue"> '.$direccion.' </b>

<br>
<br>
<b> Términos y condiciones </b> <br>
Matrícula: Los tutores matriculan al Estudiante en La Institución Educativa para el año escolar <b style="color:blue"> '.$curso.' </b> <br>
<br>
<b>Compromisos del Estudiante: </b> <br>
- Asistir a todas las clases programadas. <br>
- Completar todas las tareas y proyectos en los plazos establecidos. <br>
- Mantener un comportamiento respetuoso hacia los profesores y compañeros. <br>
- Participar activamente en las actividades escolares. <br> <br>

2. <b> Compromisos de los Tutores: </b> <br>
- Apoyar activamente la educación del Estudiante <br>
- Cumplir con las obligaciones financieras relacionadas con la matrícula <br>


3. <b> Compromisos de la Escuela: </b> <br>
- Proporcionar un entorno educativo seguro y estimulante. <br>
- Ofrecer un plan de estudios completo y actualizado. <br>
- Brindar apoyo académico y emocional cuando sea necesario. <br>
- Comunicar de manera clara y oportuna cualquier información relevante.<br>

4. <b>Duración del contrato: Este contrato tiene una duración de un año escolar y se renovará automáticamente para cada año escolar subsiguiente, a menos que cualquiera de las partes notifique lo contrario con al menos 10 días de antelación al inicio del nuevo año escolar. </b>
<br> <br>
<br> <br>
<br> <br>
<b>Firmas <b> <br> <br> <br> <br>

<table border="0"> 
<tr>
<td> 
Institución Educativa:  <br> <br> <br>
Prof...... --------------------------------
</td>
<td> 
Tutor: ------------------- <br> 
'.$nombres_apellidos_ppff.'

</td>
</tr>
</table>
<br> <br> <br>

Fecha: '.$dia_actual.' de '.$mes_actual.' de '.$anio_actual.'


</p>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('comprobante_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
