<?php
//Buscar classe do fpdf
require_once '../dados/fpdf181/fpdf.php';
require_once '../TFuncao.php';
require_once '../vendor/autoload.php';


$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',
        'orientation' => 'L']);
ob_start();
$html = ob_clean();
$html = utf8_encode($html);

$dataini = $_POST['datai'];
$datafin = $_POST['dataf'] ;
$tipo = $_POST['tipo'] ;

//Nome do arquivo a ser gerado
$arquivo = "relatorio.pdf";
//$dados = TFuncoes::Select('carro');

$campo = ($tipo == 'funcionario')
    ? 'dataAdmissao'
    : 'dataCad';
//$dados = TFuncoes::ExecSql("select * from $tipo where $campo >= '$dataini' && $campo <= '$datafin'");
//die(var_dump($campo));

$dados = ($tipo == 'locacao')
    ? TFuncoes::ExecSql('select a.id, a.dataLocacao, a.dataDevolucao, a.quilometragem, b.nome, b.cnh, c.nome, c.placa from locacao as a inner join cliente b on a.idCliente = b.id inner join carro c on c.id = a.idCarro')
    : TFuncoes::Select("$tipo", '', "$campo >= '$dataini' && $campo <= '$datafin'");

$css = "<style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            
            td, th {
                border: 1px solid rgba(0,0,0,0.78);
                text-align: left;
                padding: 8px;
            }
            
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            </style>";

//die(var_dump($dados));
if($dados == false){
//
    $html = "
            $css
            <h2 align='center'>RESULTADO DE RELATÓRIO</h2>
            <h3 align='center'>Não há dados neste intervalo de tempo!</h3>";
//    exit();
}else{

    switch ($tipo) {
        case 'carro':
            //TOPO RELATÓRIO

            $html = "
$css
<h2 align='center'>RELATORIO DE CARROS</h2>
<table>
  <thead >
    <tr >
      <th >ID</th>
        <th>NOME</th>
        <th>MODELO</th>
        <th>PLACA</th>
        <th>SEGURO</th>
        <th>LOCAÇÃO</th>
        <th>COR</th>
        <th>MARCA</th>
        <th align='center'>DATA CADASTRO</th>
    </tr>
  </thead>";
            for ($i = 0; $i < sizeof($dados); $i++) {
                $date = date_format(date_create($dados[$i]["dataCad"]), 'd/m/Y');
//        var_dump(date_format($data, 'd/m/Y'));
                $html = $html . "
  <tbody>
    <tr>
        <td align='center'>{$dados[$i]["id"]}</td>
        <td align='center'>{$dados[$i]["nome"]}</td>
        <td align='center'>{$dados[$i]["modelo"]}</td>
        <td align='center'>{$dados[$i]["placa"]}</td>
        <td align='center'>{$dados[$i]["valorSeguro"]}</td>
        <td align='center'>{$dados[$i]["valorLocacao"]}</td>
        <td align='center'>{$dados[$i]["cor"]}</td>
        <td align='center'>{$dados[$i]["marca"]}</td>
        <td align='center'>{$date}</td>
      </tr>";
            }
            $html = $html . "
                </tbody >
    </table >";
            break;



        case 'locacao':

//            die(var_dump($dados));
            $html = "$css
        <h2 align='center'>RELATORIO DE LOCAÇÃO</h2>
        <table>
          <thead >
            <tr >
                 <th >ID</th>
                <th align='center'>DATA LOCAÇÃO</th>
                <th align='center'>DATA DEVOLUÇÃO</th>
                <th align='center'>QUILOMETRAGEM</th>
                <th align='center'>NOME</th>
                <th align='center'>CNH</th>
                <th align='center'>CARRO</th>
                <th align='center'>PLACA</th>
            </tr>
          </thead>";
            for ($i = 0; $i < sizeof($dados); $i++) {
                $dateLoc = date_format(date_create($dados[$i]["dataLocacao"]), 'd/m/Y');
                $dateDev = date_format(date_create($dados[$i]["dataDevolucao"]), 'd/m/Y');

                $html = $html . "
          <tbody>
            <tr>
                <td align='center'>{$dados[$i]["id"]}</td>
                <td align='center'>{$dateLoc}</td>
                <td align='center'>{$dateDev}</td>
                <td align='center'>{$dados[$i]["quilometragem"]}</td>
                <td align='center'>{$dados[$i]["nome"]}</td>
                <td align='center'>{$dados[$i]["cnh"]}</td>
                <td align='center'>{$dados[$i]["nome"]}</td>
                <td align='center'>{$dados[$i]["placa"]}</td>
              </tr>";
            }
            $html = $html . "
                        </tbody >
        </table >";

            break;
        case 'cliente':

            $html = "$css
        <h2 align='center'>RELATORIO DE CLIENTES</h2>
        <table>
          <thead >
            <tr >
              <th align='center'>ID</th>
                <th align='center'>NOME</th>
                <th align='center'>CPF</th>
                <th align='center'>RG</th>
                <th align='center'>CNH</th>
                <th align='center'>ENGEREÇO</th>
                <th align='center'>N. DEPENDENTES</th>
                <th align='center'>DATA CADASTRO</th>
            </tr>
          </thead>";
            for ($i = 0; $i < sizeof($dados); $i++) {
                $date = date_format(date_create($dados[$i]["dataCad"]), 'd/m/Y');
                //        var_dump(date_format($data, 'd/m/Y'));
                $html = $html . "
          <tbody>
            <tr>
                <td align='center'>{$dados[$i]["id"]}</td>
                <td align='center'>{$dados[$i]["nome"]}</td>
                <td align='center'>{$dados[$i]["cpf"]}</td>
                <td align='center'>{$dados[$i]["rg"]}</td>
                <td align='center'>{$dados[$i]["cnh"]}</td>
                <td align='center'>{$dados[$i]["endereco"]}</td>
                <td align='center'>{$dados[$i]["numeroDependentes"]}</td>
                <td align='center'>{$date}</td>
              </tr>";
            }
            $html = $html . "
        </tbody >
        </table >";

            break;

        case 'funcionario':

            $html = "$css
        <h2 align='center'>RELATORIO DE FUNCIONARIOS</h2>
        <table>
          <thead >
            <tr >
              <th align='center'>ID</th>
                <th align='center'>NOME</th>
                <th align='center'>CPF</th>
                <th align='center'>RG</th>
                <th align='center'>ENGEREÇO</th>
                <th align='center'>DATA ADMISSAO</th>
                <th align='center'>DATA DEMISSAO</th>
            </tr>
          </thead>";
            for ($i = 0; $i < sizeof($dados); $i++) {
                $date = date_format(date_create($dados[$i]["dataAdmissao"]), 'd/m/Y');

                $date2 = ($dados[$i]["dataDemissao"] == null)? '--/--/----' : date_format(date_create($dados[$i]["dataDemissao"]), 'd/m/Y');
                $html = $html . "
          <tbody>
            <tr>
                <td align='center'>{$dados[$i]["id"]}</td>
                <td align='center'>{$dados[$i]["nome"]}</td>
                <td align='center'>{$dados[$i]["cpf"]}</td>
                <td align='center'>{$dados[$i]["rg"]}</td>
                <td align='center'>{$dados[$i]["endereco"]}</td>
                <td align='center'>{$date}</td>
                <td align='center'>{$date2}</td>
              </tr>";
            }
            $html = $html . "
                        </tbody >
        </table >";

            break;
    }
}
$tipo_pdf = "I";

//Fechando o arquivo
$mpdf->allow_charset_conversion= true;
$mpdf->charset_in = 'UTF-8';
//$css  = file_get_contents("../dados/css/bootstrap.min.css");
//$mpdf-> WriteHTML($css,1);
$mpdf-> WriteHTML($html);
$mpdf-> Output($arquivo, $tipo_pdf);
exit;
?>