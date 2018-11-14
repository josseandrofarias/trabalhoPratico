<?php

    $html = "<style type='text/css'>
.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
.tg .tg-1wig{font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-buh4{background-color:#f9f9f9;text-align:left;vertical-align:top}
.tg .tg-mrzz{background-color:#f9f9f9;text-align:left}
.tg .tg-s268{text-align:left}
.tg .tg-5ua9{font-weight:bold;text-align:left}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<h2 align='center'>RELATÓRIO DE CARROS</h2>
<table class='tg' align='center'>
  <tr>
    <th class='tg-s268'><span style='font-weight:bold'>ID</span></th>
    <th class='tg-5ua9'>NOME</th>
    <th class='tg-5ua9'>MODELO</th>
    <th class='tg-5ua9'>PLACA</th>
    <th class='tg-5ua9'>SEGURO</th>
    <th class='tg-1wig'>LOCAÇÃO</th>
    <th class='tg-1wig'>COR</th>
    <th class='tg-1wig'>MARCA</th>
    <th class='tg-1wig'>DATA CADASTRO</th>
  </tr>";
    for ($i = 0 ; $i< sizeof($dados); $i++) {
        $data = date_create($dados[$i]["dataCad"]);
        $html = $html . "
  <tr>
    <td class='tg-mrzz'>{$dados[$i]["id"]}</td>
    <td class='tg-mrzz'>{$dados[$i]["nome"]}</td>
    <td class='tg-mrzz'>{$dados[$i]["modelo"]}</td>
    <td class='tg-mrzz'>{$dados[$i]["placa"]}</td>
    <td class='tg-mrzz'>{$dados[$i]["seguro"]}</td>
    <td class='tg-buh4'>{$dados[$i]["locação"]}</td>
    <td class='tg-buh4'>{$dados[$i]["cor"]}</td>
    <td class='tg-buh4'>{$dados[$i]["marca"]}</td>
    <td class='tg-buh4'>{$dados[$i][""]}</td>
  </tr>";
    }
//  <tr>
//    <td class='tg-s268'>2</td>
//    <td class='tg-s268'></td>
//    <td class='tg-s268'></td>
//    <td class='tg-s268'></td>
//    <td class='tg-s268'></td>
//    <td class='tg-0lax'></td>
//    <td class='tg-0lax'></td>
//    <td class='tg-0lax'></td>
//    <td class='tg-0lax'></td>
//  </tr>
//  <tr>
//    <td class='tg-mrzz'>1</td>
//    <td class='tg-mrzz'></td>
//    <td class='tg-mrzz'></td>
//    <td class='tg-mrzz'></td>
//    <td class='tg-mrzz'></td>
//    <td class='tg-buh4'></td>
//    <td class='tg-buh4'></td>
//    <td class='tg-buh4'></td>
//    <td class='tg-buh4'></td>
//  </tr>
//  <tr>
//    <td class='tg-s268'>2</td>
//    <td class='tg-s268'></td>
//    <td class='tg-s268'></td>
//    <td class='tg-s268'></td>
//    <td class='tg-s268'></td>
//    <td class='tg-0lax'></td>
//    <td class='tg-0lax'></td>
//    <td class='tg-0lax'></td>
//    <td class='tg-0lax'></td>
//  </tr>";
    $html = $html ."
</table>";

$html = "<table>
      <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>MODELO</th>
        <th>PLACA</th>
        <th>SEGURO</th>
        <th>LOCAÇÃO</th>
        <th>COR</th>
        <th>MARCA</th>
        <th>DATA CADASTRO</th>
      </tr>";
    for ($i = 0 ; $i< sizeof($dados); $i++) {
        $data = date_create($dados[$i]["dataCad"]);
        $html = $html . "
      <tr>
        <td>1</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>";
    }
    $html = $html . "
    </table>";