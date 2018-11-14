<?php
include './TFuncao.php';

$user = addslashes(trim($_POST['l']));
$senha = addslashes(trim($_POST["s"])) ;


$dados = TFuncoes::ExecSql("select id, senha, supervisor, cpf, nome, cargo from funcionario where cpf = '$user' and senha = '$senha'");
//var_dump($dados);

if ($dados != false){
    session_start();
    $_SESSION["logado"] = true;
    $_SESSION["user_id"] = $dados[0]['id'];
    $_SESSION["user_nome"] = $dados[0]['nome'];
    $_SESSION["user_permissao"]= $dados[0]['supervisor'];
    $_SESSION["user_cpf"]= $dados[0]['cpf'];
    $_SESSION["user_cargo"]= $dados[0]['cargo'];
    header("Location: index.php");
    exit();

    $dados = true;
}else{
    session_start();
    unset ($_SESSION["logado"]);
    unset ($_SESSION["user_id"]);
    unset ($_SESSION["user_nome"]);
    unset ($_SESSION["user_permissao"]);
    unset ($_SESSION["user_cargo"]);
    unset ($_SESSION["user_cpf"]);
    $dados =  false;
}
echo json_encode( $dados);
?>
