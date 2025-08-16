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

$id_pago = $_GET['id'];
$id_estudiante = $_GET['id_estudiante'];

include('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');
include('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include('../../app/controllers/estudiantes/datos_del_estudiante.php');
include('../../app/controllers/pagos/datos_pago_estudiante.php');

////Trayendo datos de la institución

foreach ($instituciones as $institucione){
$nombre_institucion = $institucione['nombre_institucion'];
$direccion = $institucione['direccion'];
$telefono = $institucione['telefono'];
$celular = $institucione['celular'];
$correo = $institucione['correo'];
$logo = $institucione['logo'];

}

////Trayendo datos del estudiante

foreach ($pagos as $pago){
	$mes_pagado = $pago['mes_pagado'];
	$monto_pagado = $pago['monto_pagado'];
	$fecha_pagado = $pago['fecha_pagado'];
	
	
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
$pdf->setMargins(10, 20, 10);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);
$pdf->setFooterMargin(false);
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
	<td> 
	<p>
		<b>N°:</b>    '.$id_pago.' <br>
	    <b>Fecha:</b> '.$fecha_pagado.' <br>
	</p>
	</td>
	</tr>
<tr>

	<td style="text-align: center">
	<b>'.$nombre_institucion.'</b> <br>
	<small>'.$direccion.'</small><br>
	<small>'.$telefono.' '.$celular.'</small>
	</td> 
	<td style="text-align: center"><h2><b><u>RECIBO DE CAJA</u></b></h2></td>
	<td><b>ORIGINAL</b></td>
	
</tr>

</table>
<br>
<br>
 
<table border ="0">
	<tr> 
	<td width="170px"><b>Estudiante: </b></td>
	<td><b>'.$apellidos.' '.$nombres.'</b></td>
	
	</tr>
	<tr>
	<td width="170px"><b>DNI: </b></td>
	<td><b>'.$ci.'</b></td>
	</tr>
	<tr>
	<td width="170px"><b>Nivel: </b></td>
	<td><b>'.$nivel.'-'.$turno.'</b></td>
	</tr>
	<tr>
	<td width="170px"><b>Curso: </b></td>
	<td><b>'.$curso.'-División: '.$paralelo.'</b></td>
	</tr>
	<tr>
	<td width="170px"><b>Mes cancelado: </b></td>
	<td><b>'.$mes_pagado.'</b></td>
	</tr>
	<tr>
	<td width="170px"><b>Monto cancelado: </b></td>
	<td><b>$. '.$monto_pagado.'</b></td>
	</tr>

</table>
<br><br><br>

<table border="0"> 
<tr>
<td> 
Recibí conforme:  <br> <br> 
</td>
<td> 
Caja 
</td>
</tr>
</table>
<br>

Fecha: '.$dia_actual.' de '.$mes_actual.' de '.$anio_actual.'

<p>-------------------------------------------------------------------------------------------------------------------------------------------------</p>
<br><br><br><br><br><br>

<table border="0">
<tr>
	
	<td width="150px" style="text-align: center"><img src="../../public/images/configuracion/'.$logo.'" width="100px" alt=""></td>
	<td width="400px"></td>
	<td> 
	<p>
		<b>N°:</b>    '.$id_pago.' <br>
	    <b>Fecha:</b> '.$fecha_pagado.' <br>
	</p>
	</td>
	</tr>
<tr>

	<td style="text-align: center">
	<b>'.$nombre_institucion.'</b> <br>
	<small>'.$direccion.'</small><br>
	<small>'.$telefono.' '.$celular.'</small>
	</td> 
	<td style="text-align: center"><h2><b><u>RECIBO DE CAJA</u></b></h2></td>
	<td><b>DUPLICADO</b></td>
	
</tr>

</table>
<br>
<br>
 
<table border ="0">
	<tr> 
	<td width="170px"><b>Estudiante: </b></td>
	<td><b>'.$apellidos.' '.$nombres.'</b></td>
	
	</tr>
	<tr>
	<td width="170px"><b>DNI: </b></td>
	<td><b>'.$ci.'</b></td>
	</tr>
	<tr>
	<td width="170px"><b>Nivel: </b></td>
	<td><b>'.$nivel.'-'.$turno.'</b></td>
	</tr>
	<tr>
	<td width="170px"><b>Curso: </b></td>
	<td><b>'.$curso.'-División: '.$paralelo.'</b></td>
	</tr>
	<tr>
	<td width="170px"><b>Mes cancelado: </b></td>
	<td><b>'.$mes_pagado.'</b></td>
	</tr>
	<tr>
	<td width="170px"><b>Monto cancelado: </b></td>
	<td><b>$. '.$monto_pagado.'</b></td>
	</tr>

</table>
<br><br><br>

<table border="0"> 
<tr>
<td> 
Recibí conforme:  <br> <br> 
</td>
<td> 
Caja 
</td>
</tr>
</table>
<br><br>

Fecha: '.$dia_actual.' de '.$mes_actual.' de '.$anio_actual.'
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
