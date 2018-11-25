<?php
    include '../TFuncao.php';
    var_dump($_POST);
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
        $deativado = 1;
    }else{
        $deativado = 0;
    }
    if (!isset($_POST['supervisor'])) {
        $supervisor = 1;
    }else{
        $supervisor = 0;
    }

    $marca = $_POST["marca"];
    $dataCad = date("Y-m-d H:i:s"); 
    $con = TFuncoes::AddConexao();

    if(isset($_POST['id'])){
        $sql = "UPDATE funcionario
                SET nome = '".$nome."', cpf='".$cpf."', rg='".$rg."', senha='".$senha."', endereco='".$endereco."', cargo='".$cargo."', deativado='".$deativado."', supervisor='".$supervisor."', dataAdmissao='".$dataAdmissao."'
                    , dataDemissao='".$dataDemissao."'
                WHERE id = ".$_POST['id'].";"; 

    }else{
        $sql = "INSERT INTO funcionario(nome, cpf, rg, senha, endereco, cargo, deativado, supervisor, dataAdmissao, dataDemissao) VALUES ('".$nome."','".$cpf."','".$rg."','".$senha."','".$endereco."','".$cargo."','".$deativado."','".$supervisor."','".$dataAdmissao."','".$dataDemissao"')"; 
    }

    echo '<br>';
    echo $sql;
    if(mysqli_query($con, $sql)){
        $msg = "Gravado com sucesso!";
    }else{
        $msg = "Erro ao gravar!";
    }
    mysqli_close($con);  
    

    header('Location: cad_funcionario.php');
    
    
