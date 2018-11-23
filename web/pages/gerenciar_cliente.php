<?php 

include '../TFuncao.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $acao = $_POST['acao'];
    if($acao == "inserir") {
        $nome = $_POST['nome'];
        $rg = $_POST['rg'];
        $cpf = $_POST['cpf'];
        $cnh = $_POST['cnh'];
        $endereco = $_POST['endereco'];
        $dep = $_POST['dep'];

        if(!empty($nome) && 
        !empty($rg) && 
        !empty($cpf) && 
        !empty($cnh) && 
        !empty($endereco) && 
        !empty($dep)) {
            TFuncoes::ExecSql("
            INSERT INTO
            cliente (nome, cpf, rg, cnh, endereco, numeroDependentes)
            VALUES(
                '" . $nome . "',
                '" . $cpf . "',
                '" . $rg . "',
                '" . $cnh . "',
                '" . $endereco . "',
                '" . $dep . "'
            )
            ");
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_cliente.php");
        } else {
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_cliente.php");
        }
    }
    if($_POST['acao'] == "deletar") {
        if(TFuncoes::Select("locacao", "idCliente", "idCliente = " . $_POST['id']) == false) {
            TFuncoes::ExecSql("
			DELETE FROM cliente WHERE id='" . $_POST['id'] .  "'
            ");
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_cliente.php");
        } else {
            header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_cliente.php");
        } 

    }

    
} else {
    header("Location: " . "http://" . "$_SERVER[HTTP_HOST]" . "/trabalhoPratico/web/pages/cad_cliente.php");
}

?>
