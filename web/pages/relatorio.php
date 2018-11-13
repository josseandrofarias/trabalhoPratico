<?php
//Buscar classe do fpdf
require ('../dados/fpdf181/fpdf.php');
require ('../TFuncao.php');

//Iniciar o documento pdf
//$pdf = new FPDF('P');
$pdf = new FPDF('L');
$pdf->AddPage();

$dataini = $_POST['dataini'];
$datafin = $_POST['datafin'] ;
$tipo = $_POST['tipo'] ;

//var_dump($dataini);

//Nome do arquivo a ser gerado
$arquivo = "relatorio.pdf";
//$dados = TFuncoes::Select('carro');
$campo = ($tipo == 'funcionario') ? 'dataAdminissao': 'dataCad';

$dados = TFuncoes::ExecSql("select * from $tipo where $campo >= '$dataini' && dataCad <= '$datafin'");
//var_dump($dados);
if($dados == false){

    echo json_encode($dados);
//    exit();
}

//TOPO RELATÓRIO
$pdf->SetFont('Arial','B', 15);
$pdf->Cell('277','10', 'RELATORIO DE CARROS', 1,1,'C');
/// Select Arial bold 15
$pdf->SetFont('Arial','B',15);
// Move to the right
//$pdf->Cell(80);

$pdf->Cell(15,10,'ID',1,0,'C');
$pdf->Cell(30,10,'MODELO',1,0,'C');
$pdf->Cell(32,10,'PLACA',1,0,'C');
$pdf->Cell(50,10,'VALOR SEGURO',1,0,'C');
$pdf->Cell(50,10,'VALOR LOCACAO',1,0,'C');
$pdf->Cell(20,10,'COR',1,0,'C');
$pdf->Cell(30,10,'MARCA',1,0,'C');
$pdf->Cell(50,10,'DATA CADASTRO',1,0,'C');
// Line break
$pdf->Ln(10);

//foreach ($dados[0] as $key => $value) {
for ($i = 0 ; $i< sizeof($dados); $i++){
//  $carro = $dados[$i];
    $data = date_create($dados[$i]["dataCad"]);

    $pdf->SetFont('Arial','B', 15);
    $pdf->Cell('15','10', $dados[$i]["id"], 1,'0');
    $pdf->Cell('30','10', $dados[$i]["modelo"], 1,'0');
    $pdf->Cell('32','10', $dados[$i]["placa"], 1,'0');
    $pdf->Cell('50','10', $dados[$i]["valorSeguro"], 1,'0');
    $pdf->Cell('50','10', $dados[$i]["valorLocacao"], 1,'0');
    $pdf->Cell('20','10', $dados[$i]["cor"], 1,'0');
    $pdf->Cell('30','10', $dados[$i]["marca"], 1,'0');
    $pdf->Cell('50','10', date_format($data, 'd/m/Y'), 1,'0');
    $pdf->Ln(10);
//  $pdf->Cell(190, 10, $dados[$i]["placa"], 1 ,1, 'C' );



}


$tipo_pdf = "I";


//Fechando o arquivo
$pdf->Output($arquivo, $tipo_pdf);
?>
