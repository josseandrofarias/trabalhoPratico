<?php
//Buscar classe do fpdf
require_once "../dados/fpdf181/fpdf.php";

//Iniciar o documento pdf
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

//Nome do arquivo a ser gerado
$arquivo = "relatorio.pdf";



$tipo_pdf = "I";


//Fechando o arquivo
$pdf->Output($arquivo, $tipo_pdf);
?>