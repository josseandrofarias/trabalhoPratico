<?php
//Buscar classe do fpdf
require ('../dados/fpdf181/fpdf.php');
require ('../TFuncao.php');

//Iniciar o documento pdf
//$pdf = new FPDF('P');
$pdf = new FPDF('L');
$pdf->AddPage();

$dataini = $_POST['datai'];
$datafin = $_POST['dataf'] ;
$tipo = $_POST['tipo'] ;
//var_dump($_GET, $_POST);
//var_dump("select * from $tipo where $campo >= '$dataini' && dataCad <= '$datafin'");

//Nome do arquivo a ser gerado
$arquivo = "relatorio.pdf";
//$dados = TFuncoes::Select('carro');
$campo = ($tipo == 'funcionario') ? 'dataAdmissao': 'dataCad';
$campo = ($tipo == 'locacao') ? 'dataLocacao': 'dataCad';

$dados = TFuncoes::ExecSql("select * from $tipo where $campo >= '$dataini' && $campo <= '$datafin'");
//var_dump("select * from $tipo where $campo >= '$dataini' && $campo <= '$datafin'");
//var_dump($dados);
if($dados == false){
//
    echo 'SEM RELATORIO';
//    exit();
}else{

    switch ($tipo){
        case 'carro':
            //TOPO RELATÓRIO
            $pdf->SetLeftMargin(15);
            $pdf->SetFont('Arial','B', 15);
            $pdf->Cell('265','10', 'RELATORIO DE CARROS', 1,1,'C');
            $pdf->SetFont('Arial','B',12);

            $pdf->Cell(15,10,'ID',1,0,'C');
            $pdf->Cell(30,10,'NOME',1,0,'C');
            $pdf->Cell(30,10,'MODELO',1,0,'C');
            $pdf->Cell(30,10,'PLACA',1,0,'C');
            $pdf->Cell(30,10,'SEGURO',1,0,'C');
            $pdf->Cell(30,10,'LOCACAO',1,0,'C');
            $pdf->Cell(20,10,'COR',1,0,'C');
            $pdf->Cell(30,10,'MARCA',1,0,'C');
            $pdf->Cell(50,10,'DATA CADASTRO',1,0,'C');
            $pdf->Ln(10);

            for ($i = 0 ; $i< sizeof($dados); $i++){
                $data = date_create($dados[$i]["dataCad"]);

                $pdf->SetFont('Arial','', 12);
                $pdf->Cell('15','10', $dados[$i]["id"], 1,'0','C');
                $pdf->Cell('30','10', $dados[$i]["nome"], 1,'0','C');
                $pdf->Cell('30','10', $dados[$i]["modelo"], 1,'0','C');
                $pdf->Cell('30','10', $dados[$i]["placa"], 1,'0','C');
                $pdf->Cell('30','10','R$: '.$dados[$i]["valorSeguro"], 1,'0','C');
                $pdf->Cell('30','10', 'R$: '.$dados[$i]["valorLocacao"], 1,'0','C');
                $pdf->Cell('20','10', $dados[$i]["cor"], 1,'0','C');
                $pdf->Cell('30','10', $dados[$i]["marca"], 1,'0','C');
                $pdf->Cell('50','10', date_format($data, 'd/m/Y'), 1,'0','C');
                $pdf->Ln(10);

            }
            break;
        case 'locacao':
            //TOPO RELATÓRIO
            $pdf->SetLeftMargin(40);
            $pdf->SetFont('Arial','B', 15);
            $pdf->Cell('165','10', 'RELATORIO DE LOCAÇÃO', 1,1,'C');
            $pdf->SetFont('Arial','B',12);

            $pdf->Cell(15,10,'ID',1,0,'C');
            $pdf->Cell(50,10,'DATA LOCACAO',1,0,'C');
            $pdf->Cell(50,10,'DATA DEVOLUCAO',1,0,'C');
            $pdf->Cell(50,10,'QUILOMETRAGEM',1,0,'C');

            $pdf->Ln(10);

            for ($i = 0 ; $i< sizeof($dados); $i++){
//                $data = date_create($dados[$i]["dataCad"]);
                $dataLocacao = date_create($dados[$i]["dataLocacao"]);
                $dataDevolucao = date_create($dados[$i]["dataDevolucao"]);

                $pdf->SetFont('Arial','', 12);
                $pdf->Cell('15','10', $dados[$i]["id"], 1,'0','C');
                $pdf->Cell('50','10', date_format($dataLocacao, 'd/m/Y'), 1,'0','C');
                $pdf->Cell('50','10', date_format($dataDevolucao, 'd/m/Y'), 1,'0','C');
                $pdf->Cell('50','10', $dados[$i]["quilometragem"], 1,'0','C');


                $pdf->Ln(10);

            }
            break;
        case 'cliente':
            //TOPO RELATÓRIO
            $pdf->SetLeftMargin(5);
            $pdf->SetFont('Arial','B', 15);
            $pdf->Cell('280','10', 'RELATORIO DE CLIENTES', 1,1,'C');
            $pdf->SetFont('Arial','B',12);

            $pdf->Cell(15,10,'ID',1,0,'C');
            $pdf->Cell(50,10,'NOME',1,0,'C');
            $pdf->Cell(30,10,'CPF',1,0,'C');
            $pdf->Cell(30,10,'RG',1,0,'C');
            $pdf->Cell(30,10,'CNH',1,0,'C');
            $pdf->Cell(70,10,'ENDEREÇO',1,0,'C');
            $pdf->Cell(20,10,'N. Dep.',1,0,'C');
            $pdf->Cell(40,10,'DATA CADASTRO',1,0,'C');

            $pdf->Ln(10);

            for ($i = 0 ; $i< sizeof($dados); $i++){
                $data = date_create($dados[$i]["dataCad"]);


                $pdf->SetFont('Arial','', 12);
                $pdf->Cell('15','10', $dados[$i]["id"], 1,'0',"C");
                $pdf->Cell('50','10', $dados[$i]["nome"], 1,'0');
                $pdf->Cell('30','10', $dados[$i]["cpf"], 1,'0');
                $pdf->Cell('30','10', $dados[$i]["rg"], 1,'0');
                $pdf->Cell('30','10', $dados[$i]["cnh"], 1,'0');
                $pdf->Cell('70','10', $dados[$i]["endereco"], 1,'0');
                $pdf->Cell('20','10', $dados[$i]["numeroDependentes"], 1,'0');
                $pdf->Cell('40','10', date_format($data, 'd/m/Y'), 1,'0');

                $pdf->Ln(10);

            }
            break;


////TOPO RELATÓRIO
//$pdf->SetLeftMargin(15);
//$pdf->SetFont('Arial','B', 15);
//$pdf->Cell('265','10', 'RELATORIO DE CARROS', 1,1,'C');
///// Select Arial bold 15
//$pdf->SetFont('Arial','B',12);
//// Move to the right
////$pdf->Cell(80);
//
//$pdf->Cell(15,10,'ID',1,0,'C');
//$pdf->Cell(30,10,'NOME',1,0,'C');
//$pdf->Cell(30,10,'MODELO',1,0,'C');
//$pdf->Cell(30,10,'PLACA',1,0,'C');
//$pdf->Cell(30,10,'SEGURO',1,0,'C');
//$pdf->Cell(30,10,'LOCACAO',1,0,'C');
//$pdf->Cell(20,10,'COR',1,0,'C');
//$pdf->Cell(30,10,'MARCA',1,0,'C');
//$pdf->Cell(50,10,'DATA CADASTRO',1,0,'C');
//// Line break
//$pdf->Ln(10);
//
////foreach ($dados[0] as $key => $value) {
//for ($i = 0 ; $i< sizeof($dados); $i++){
////  $carro = $dados[$i];
//    $data = date_create($dados[$i]["dataCad"]);
//
//    $pdf->SetFont('Arial','', 12);
//    $pdf->Cell('15','10', $dados[$i]["id"], 1,'0','C');
//    $pdf->Cell('30','10', $dados[$i]["nome"], 1,'0','C');
//    $pdf->Cell('30','10', $dados[$i]["modelo"], 1,'0','C');
//    $pdf->Cell('30','10', $dados[$i]["placa"], 1,'0','C');
//    $pdf->Cell('30','10','R$: '.$dados[$i]["valorSeguro"], 1,'0','C');
//    $pdf->Cell('30','10', 'R$: '.$dados[$i]["valorLocacao"], 1,'0','C');
//    $pdf->Cell('20','10', $dados[$i]["cor"], 1,'0','C');
//    $pdf->Cell('30','10', $dados[$i]["marca"], 1,'0','C');
//    $pdf->Cell('50','10', date_format($data, 'd/m/Y'), 1,'0','C');
//    $pdf->Ln(10);
////  $pdf->Cell(190, 10, $dados[$i]["placa"], 1 ,1, 'C' );
//
}}


$tipo_pdf = "I";


//Fechando o arquivo
echo json_encode($pdf->Output($arquivo, $tipo_pdf));
?>
