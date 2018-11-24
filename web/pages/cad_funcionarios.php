<?php 

include '../TFuncao.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $acao = $_POST['acao'];
    if($acao == "inserir") {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $rg = $_POST["rg"];
        $senha = $_POST["senha"];
        $endereco = $_POST["endereco"];
        $cargo = $_POST["cargo"];
        $dataAdmissao = $_POST["dataAdmissao"];
        $dataDemissao = $_POST["dataDemissao"];

        //caso o checkbox esteja deesmarcado seu status sera 1, caso marcado 0
        if (!isset($_POST['deativado'])) {
            $ativo = 1;
        }else{
            $ativo = 0;
        }

        if (!isset($_POST['supervisor'])) {
            $ativo = 1;
        }else{
            $ativo = 0;
        }

        if(!empty($nome) && 
        !empty($cpf) && 
        !empty($rg) && 
        !empty($senha) && 
        !empty($endereco) && 
        !empty($cargo)&& 
        !empty($dataAdmissao)&& 
        !empty($dataDemissao)&& 
        !empty($deativado)&& 
        !empty($supervisor)) {
            TFuncoes::ExecSql("

            INSERT INTO
            (nome, cpf, rg, senha, endereco, cargo, dataAdmissao, dataDemissao, deativado, supervisor)
            VALUES(
                '" . $nome . "',
                '" . $cpf . "',
                '" . $rg . "',
                '" . $senha . "',
                '" . $endereco . "',
                '" . $cargo . "',
                '" . $dataAdmissao . "',
                '" . $dataDemissao . "',
                '" . $deativado . "',
                '" . $supervisor . "'
            )
            "); 
    
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_funcionario.php");
        } else {
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_funcionario.php");
        }
    }
    if($_POST['acao'] == "deletar") {
        if(TFuncoes::Select("id = " . $_POST['id']) == false) {
            TFuncoes::ExecSql("
            DELETE FROM funcionario WHERE id='" . $_POST['id'] .  "'
            ");
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_funcionario.php");
        } else {
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_funcionario.php");
        } 

    }

    
} else {
    header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_funcionario.php");
}

?>
