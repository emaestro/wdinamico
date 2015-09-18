<?php
if (!isset($_SESSION)) {
	session_start();
}

require_once "fpdf.php";

class PDF extends FPDF {

	function Header()
	{
		$this->SetFont('Times','B',14);
		$this->Cell(0,5,'INSTITUTO SUPERIOR TECNOLOGICO PRIVADO', 0, 0, 'C');
		$this->Ln();
		$this->SetFont('Arial','B',14);
		$this->Cell(0,5,utf8_decode('UNITEK - PUNO'), 0, 0, 'C');
		$this->Ln();
		$this->SetFont('Arial','B',11);
		$this->Cell(0,5,utf8_decode('TALLER DE PROGRAMACION WEB'), 0, 0, 'C');
		$this->Ln();
		$this->Ln(2);
		$this->SetFont('arial','B',12);
		$this->Cell(0,5,utf8_decode("Listado de Usuarios"), 0, 0, 'C');
		$this->Ln();
		
		$this->Ln(4);
		$this->cabecera();
		
	}
	
	function cabecera()
	{
		$this->SetFont('arial','B',7);
		$this->Cell(7,5,utf8_decode('N°'), 1, 0, 'C');
		$this->Cell(13,5,'CODIGO', 1, 0, 'C');
		$this->Cell(60,5,'APELLIDOS Y NOMBRES', 1, 0, 'C');
		$this->Cell(60,5,'USUARIO', 1, 0, 'C');
		$this->Cell(30,5,'CLAVE', 1, 0, 'C');
		$this->Ln();
		$this->Ln(1);
	}
	
	function Footer()
	{
		$vFecha = getdate(time());
		$this->SetFont('arial','',8);
		$this->Line(20, 277, 190, 277);
		$this->SetY(-20);
		$vFecha = date("d-m-Y H:i:s");
		$this->Cell(120, 4,"Fecha: ".$vFecha, 0,0,'L');
		$this->Cell(50, 4,'WebApp',0,0,'R');

	}
	function Body($usuarios)
	{			
		//global $sEstupdf;
		$this->SetFont('arial','',8);
		$vCont = 1;
		foreach ($usuarios as $clave => $usuario) {
			$this->Cell(7,5, $vCont, 'B', 0, 'C');
			$this->Cell(13,5, $usuario['usuario_id'], 'B', 0, 'C');
			$this->Cell(60,5, ucwords(strtolower($usuario['paterno'].' '.$usuario['materno'].' '.$usuario['nombres'])), 'B', 0, 'L');
			$this->Cell(60,5, ucwords(strtolower($usuario['usuario'])), 'B', 0, 'L');
			$this->Cell(30,5,$usuario['clave'], 'B', 0, 'C');
			$this->Ln();
			$vCont++;
		}
	}
}


$pdf=new PDF('P', 'mm', 'A4');
$pdf->SetMargins(20, 20);
$pdf->AliasNbPages();
$pdf->AddFont('arialn','','arialn.php');
$pdf->AddFont('arialn','B','arialnb.php');
$pdf->AddPage();
$pdf->Body($_SESSION['oPDF']);

$pdf->Output();


?>